<?php

namespace App\Services;

use App\Repositories\TaxRuleRepository;
use App\TaxCalculationLog;
use App\TaxRule;

class TaxCalculationService
{
    public function __construct(protected TaxRuleRepository $rules)
    {
    }

    public function calculate(array $criteria): array
    {
        $propertyValue = (float) $criteria['property_value'];
        $dcValue = isset($criteria['dc_value']) ? (float) $criteria['dc_value'] : null;
        $ownerCount = max(1, (int) ($criteria['owner_count'] ?? 1));

        $matched = $this->rules->findMatching($criteria);

        // Several rules can match the same tax_code at different specificity levels
        // (e.g. a global stamp-duty rule and a city-specific one). Only the single
        // most specific rule per tax_code should be applied, otherwise the same
        // charge is added multiple times into the total. Sorting is done with a
        // single comparator (not chained sortByDesc calls, which each re-sort the
        // whole collection and make the LAST call win) so specificity is the
        // primary key, priority the tiebreak, and effective_from last.
        $winners = $matched
            ->groupBy('tax_code')
            ->map(function ($rulesForCode) {
                return $rulesForCode
                    ->sort(function (TaxRule $a, TaxRule $b) {
                        return [$b->specificity(), $b->priority, $b->effective_from]
                            <=> [$a->specificity(), $a->priority, $a->effective_from];
                    })
                    ->first();
            });

        $breakdown = [];
        $total = 0.0;

        foreach ($winners as $code => $rule) {
            $amount = $this->applyRule($rule, $propertyValue, $dcValue, $ownerCount);

            $breakdown[] = [
                'code' => $code,
                'label' => $rule->tax_name,
                'amount' => round($amount, 2),
                'configured' => true,
            ];

            $total += $amount;
        }

        $result = [
            'breakdown' => $breakdown,
            'total' => round($total, 2),
            'property_value' => $propertyValue,
        ];

        $this->log($criteria, $result);

        return $result;
    }

    protected function applyRule(TaxRule $rule, float $propertyValue, ?float $dcValue, int $ownerCount): float
    {
        // "Agreement to Sell: Simple vs DC Value" picks which figure the
        // percentage is applied to — it does not change which rule wins.
        $basisValue = ($rule->value_basis === TaxRule::BASIS_DC && $dcValue !== null)
            ? $dcValue
            : $propertyValue;

        $amount = match ($rule->calculation_type) {
            TaxRule::CALC_PERCENTAGE => $basisValue * ($rule->percentage / 100),
            TaxRule::CALC_FIXED => (float) $rule->fixed_amount,
            TaxRule::CALC_PERCENTAGE_PLUS_FIXED => $basisValue * ($rule->percentage / 100) + (float) $rule->fixed_amount,
            default => 0.0,
        };

        if ($rule->per_owner) {
            $amount *= $ownerCount;
        }

        if ($rule->minimum_amount !== null) {
            $amount = max($amount, $rule->minimum_amount);
        }

        if ($rule->maximum_amount !== null) {
            $amount = min($amount, $rule->maximum_amount);
        }

        return $amount;
    }

    protected function log(array $criteria, array $result): void
    {
        TaxCalculationLog::create([
            'user_id' => auth()->id(),
            'property_value' => $result['property_value'],
            'province' => $criteria['province'] ?? null,
            'city' => $criteria['city'] ?? null,
            'society_id' => $criteria['society_id'] ?? null,
            'property_type' => $criteria['property_type'] ?? null,
            'category' => $criteria['category'] ?? null,
            'plot_size' => $criteria['plot_size'] ?? null,
            'buyer_type' => $criteria['buyer_type'] ?? null,
            'tax_status' => $criteria['tax_status'] ?? null,
            'transfer_type' => $criteria['transfer_type'] ?? null,
            'breakdown' => $result['breakdown'],
            'total' => $result['total'],
            'ip_address' => request()->ip(),
        ]);
    }
}
