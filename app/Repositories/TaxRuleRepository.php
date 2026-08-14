<?php

namespace App\Repositories;

use App\TaxRule;
use Illuminate\Support\Collection;

class TaxRuleRepository
{
    /**
     * Fetch active, currently-effective rules that match the given request scope,
     * treating a null scope column on the rule as a wildcard match.
     */
    public function findMatching(array $criteria): Collection
    {
        $query = TaxRule::query()->active()->effective();

        $scopeColumns = [
            'province' => $criteria['province'] ?? null,
            'city' => $criteria['city'] ?? null,
            'society_id' => $criteria['society_id'] ?? null,
            'block_id' => $criteria['block_id'] ?? null,
            'property_type' => $criteria['property_type'] ?? null,
            'category' => $criteria['category'] ?? null,
            'plot_size' => $criteria['plot_size'] ?? null,
            'buyer_type' => $criteria['buyer_type'] ?? null,
            'tax_status' => $criteria['tax_status'] ?? null,
            'transfer_type' => $criteria['transfer_type'] ?? null,
            'stamp_duty_payment_method' => $criteria['stamp_duty_payment_method'] ?? null,
        ];

        foreach ($scopeColumns as $column => $value) {
            $query->where(function ($q) use ($column, $value) {
                $q->whereNull($column);
                if ($value !== null) {
                    $q->orWhere($column, $value);
                }
            });
        }

        // Boolean toggle scope columns match a wildcard (null on the rule) or an
        // exact true/false equal to the request's toggle state.
        foreach (['requires_verification', 'biana_included'] as $column) {
            if (array_key_exists($column, $criteria) && $criteria[$column] !== null) {
                $value = (bool) $criteria[$column];
                $query->where(function ($q) use ($column, $value) {
                    $q->whereNull($column)->orWhere($column, $value);
                });
            } else {
                $query->whereNull($column);
            }
        }

        // Value band: value_to is exclusive so a property valued at exactly a
        // slab boundary (e.g. 50,000,000) only matches one band, not both.
        $propertyValue = (float) ($criteria['property_value'] ?? 0);
        $query->where(function ($q) use ($propertyValue) {
            $q->whereNull('value_from')->orWhere('value_from', '<=', $propertyValue);
        })->where(function ($q) use ($propertyValue) {
            $q->whereNull('value_to')->orWhere('value_to', '>', $propertyValue);
        });

        // Size band (in Marla), same exclusive-upper-bound treatment.
        $size = $criteria['size_marla'] ?? null;
        $query->where(function ($q) use ($size) {
            $q->whereNull('size_from');
            if ($size !== null) {
                $q->orWhere('size_from', '<=', $size);
            }
        })->where(function ($q) use ($size) {
            $q->whereNull('size_to');
            if ($size !== null) {
                $q->orWhere('size_to', '>', $size);
            }
        });

        return $query->get();
    }
}
