<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatePropertyTaxRequest;
use App\Services\TaxCalculationService;
use App\Society;
use App\SocietyBlock;
use App\TaxRule;

class PropertyTransferCalculatorController extends Controller
{
    /**
     * Maps each known tax_code to the fixed breakdown slot the view renders.
     * Any winning rule whose code isn't listed here still gets added under "misc".
     */
    protected const SLOT_MAP = [
        'FBR_236K' => 'fbr_tax',
        'FBR_236C' => 'fbr_tax',
        'STAMP_DUTY' => 'stamp_duty',
        'REGISTRATION_FEE' => 'registration',
        'ESTAMP_FEE' => 'estamp',
        'CVT' => 'cvt',
        'DHA_TRANSFER_FEE' => 'dha_transfer',
        'DHA_MEMBERSHIP_FEE' => 'membership',
        'TIP_CANTONMENT' => 'tip_tax',
        'VERIFICATION_FEE' => 'verification_fee',
        'BIANA_FEE' => 'biana_fee',
        'ONLINE_PAYMENT_SURCHARGE' => 'online_surcharge',
    ];

    public function __construct(protected TaxCalculationService $taxCalculationService)
    {
    }

    public function index()
    {
        // Two distinct "old input" sources: Laravel's own old() flash (set when
        // FormRequest validation fails and redirects back here) takes priority
        // over our session stash (set only after a successful calculation, so
        // "Back to Calculator" from the result page still shows prior choices).
        $old = old() ?: session('property_transfer_old_input', []);

        $societies = Society::active()->orderBy('city')->orderBy('name')->get();
        $cities = $societies->pluck('city')->unique()->sort()->values();
        $selectedSociety = old('society', $old['society'] ?? null);
        $blocks = !empty($selectedSociety)
            ? SocietyBlock::where('society_id', $selectedSociety)->active()->orderBy('name')->get()
            : collect();

        $title = 'Advanced DHA Property Transfer Cost Calculator';
        $description = 'Estimate complete DHA property transfer expenses — FBR advance tax, stamp duty, registration, DHA fees and more — with a detailed breakdown.';
        $keyword = 'DHA transfer calculator, property tax calculator Pakistan, FBR advance tax calculator';

        return view('frontwebsite.calculator.advanced', compact('societies', 'cities', 'blocks', 'title', 'description', 'keyword', 'old'));
    }

    public function calculate(CalculatePropertyTaxRequest $request)
    {
        $criteria = $request->validated();

        // Province/city are never taken from client input — they're derived from
        // the selected society so a request can't mix a society with a mismatched
        // city and pull another city's fee rules.
        $society = Society::active()->find($criteria['society']);
        $block = SocietyBlock::active()->where('society_id', $society->id)->find($criteria['block']);

        $criteria['society_id'] = $society->id;
        $criteria['province'] = $society->province;
        $criteria['city'] = $society->city;
        $criteria['block_id'] = $block->id;
        $criteria['size_marla'] = $this->sizeInMarla($request);

        if (($criteria['agreement_type'] ?? null) === 'dc_value') {
            $criteria['value_basis'] = TaxRule::BASIS_DC;
        }

        $result = $this->taxCalculationService->calculate($criteria);
        $breakdown = $this->mapBreakdown($result);

        $summary = [
            'location_line' => strtoupper($society->city) . ' > ' . $society->name . ' > ' . $block->name . '.',
            'property_line' => ucfirst($criteria['property_type'] ?? 'residential') . ' > ' . ucfirst($criteria['category'] ?? 'plot')
                . ' > Measuring: ' . number_format($criteria['size_marla'], 2) . ' Marla.',
            'transfer_line' => $this->label($criteria['transfer_type'] ?? 'normal', [
                    'normal' => 'Regular Transfer', 'gift' => 'Gift', 'inheritance' => 'Inheritance', 'biana_only' => 'Biana Only',
                ])
                . ' > ' . ucfirst($criteria['buyer_type'] ?? 'buyer')
                . ' > ' . $this->label($criteria['tax_status'] ?? 'filer', [
                    'filer' => 'Filer', 'late_filer' => 'Late Filer', 'non_filer' => 'Non-Filer', 'overseas' => 'Overseas',
                ]),
            'fbr_value' => $criteria['property_value'],
            'dc_value' => $criteria['dc_value'] ?? null,
            'breakdown' => $breakdown,
            'generated_at' => now()->format('d/m/Y'),
        ];

        $request->session()->put('property_transfer_result', $summary);
        $request->session()->put('property_transfer_old_input', $request->all());

        return redirect()->route('property-transfer-calculator.result');
    }

    public function result()
    {
        $summary = session('property_transfer_result');

        if (!$summary) {
            return redirect()->route('property-transfer-calculator.index');
        }

        $title = 'Your DHA Property Transfer Cost Estimate';
        $description = 'Itemised DHA property transfer expense breakdown — FBR advance tax, stamp duty, registration, DHA fees and more.';

        return view('frontwebsite.calculator.result', compact('summary', 'title', 'description'));
    }

    protected function label(?string $value, array $map): string
    {
        return $map[$value] ?? ucfirst((string) $value);
    }

    protected function sizeInMarla(CalculatePropertyTaxRequest $request): float
    {
        $kanal = (float) $request->input('kanal', 0);
        $marla = (float) $request->input('marla', 0);
        $sqft = (float) $request->input('sqft', 0);

        return ($kanal * 20) + $marla + ($sqft / 272.25);
    }

    protected function mapBreakdown(array $result): array
    {
        $slots = array_fill_keys(array_unique(array_values(self::SLOT_MAP)), null);
        $misc = 0.0;

        foreach ($result['breakdown'] as $line) {
            $slot = self::SLOT_MAP[$line['code']] ?? null;

            if ($slot === null) {
                $misc += $line['amount'];
                continue;
            }

            $slots[$slot] = ($slots[$slot] ?? 0) + $line['amount'];
        }

        $slots['misc'] = $misc > 0 ? round($misc, 2) : null;
        $slots['total'] = $result['total'];
        $slots['property_value'] = $result['property_value'];

        return $slots;
    }
}
