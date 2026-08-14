<?php

namespace Database\Seeders;

use App\TaxRule;
use Illuminate\Database\Seeder;

class TaxRuleSeeder extends Seeder
{
    public function run(): void
    {
        $effectiveFrom = '2026-01-01';

        foreach ($this->rules($effectiveFrom) as $rule) {
            TaxRule::updateOrCreate(
                [
                    'tax_code' => $rule['tax_code'],
                    'province' => $rule['province'] ?? null,
                    'city' => $rule['city'] ?? null,
                    'society_id' => $rule['society_id'] ?? null,
                    'block_id' => $rule['block_id'] ?? null,
                    'transfer_type' => $rule['transfer_type'] ?? null,
                    'tax_status' => $rule['tax_status'] ?? null,
                    'buyer_type' => $rule['buyer_type'] ?? null,
                ],
                $rule
            );
        }
    }

    protected function rules(string $effectiveFrom): array
    {
        return [
            // ---- VERIFIED, ACTIVE ----

            // Punjab stamp duty cut to a flat 1% (urban + rural) — Governor-approved
            // ordinance, April 2026. Source: dailyausaf.com "Punjab cuts stamp duty to 1%".
            [
                'province' => 'Punjab',
                'tax_name' => 'Stamp Duty',
                'tax_code' => 'STAMP_DUTY',
                'calculation_type' => TaxRule::CALC_PERCENTAGE,
                'percentage' => 1.0,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 1,
                'source_url' => 'https://dailyausaf.com/en/business/punjab-cuts-stamp-duty-to-1-in-major-property-relief-move/',
                'notes' => 'Verified: flat 1% stamp duty announced April 2026 (previously 1% urban / 3% rural).',
            ],

            // Gift transfers to immediate family are exempt from FBR advance tax
            // (236C/236K) under Finance Act 2014 provisions, still in force.
            [
                'transfer_type' => 'gift',
                'tax_name' => 'FBR Advance Tax (Gift — immediate family exempt)',
                'tax_code' => 'FBR_236K',
                'calculation_type' => TaxRule::CALC_FIXED,
                'fixed_amount' => 0,
                'priority' => 5,
                'effective_from' => $effectiveFrom,
                'status' => 1,
                'source_url' => 'https://dawarsassociates.com/understanding-tax-exemption-on-gifts-in-pakistan-myths-vs-legal-reality/',
                'notes' => 'Verified concept: gifts to immediate family (spouse/parents/children/siblings) are exempt from 236C/236K. Assumes immediate-family gift; non-family gifts need a separate configured rule.',
            ],
            [
                'transfer_type' => 'inheritance',
                'tax_name' => 'FBR Advance Tax (Inheritance — exempt)',
                'tax_code' => 'FBR_236K',
                'calculation_type' => TaxRule::CALC_FIXED,
                'fixed_amount' => 0,
                'priority' => 5,
                'effective_from' => $effectiveFrom,
                'status' => 1,
                'source_url' => 'https://fp.brecorder.com/2014/07/201407191204095/',
                'notes' => 'Verified: inherited property is exempt from 236C/236K.',
            ],

            // ---- UNVERIFIED — seeded inactive, needs admin confirmation ----

            [
                'buyer_type' => 'buyer',
                'tax_status' => 'filer',
                'tax_name' => 'FBR Advance Tax — Purchaser (236K), Filer, up to 50M',
                'tax_code' => 'FBR_236K',
                'calculation_type' => TaxRule::CALC_PERCENTAGE,
                'percentage' => 1.5,
                'value_to' => 50000000,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => 'https://clearconcept.academy/property-tax-cut-83-percent-budget-2026-27-section-236c-236k/',
                'notes' => 'UNVERIFIED — conflicting secondary sources on 236K slabs. Confirm against FBR official Withholding Tax Card before activating.',
            ],
            [
                'buyer_type' => 'buyer',
                'tax_status' => 'non_filer',
                'tax_name' => 'FBR Advance Tax — Purchaser (236K), Non-filer, up to 50M',
                'tax_code' => 'FBR_236K',
                'calculation_type' => TaxRule::CALC_PERCENTAGE,
                'percentage' => 10.5,
                'value_to' => 50000000,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => 'https://clearconcept.academy/property-tax-cut-83-percent-budget-2026-27-section-236c-236k/',
                'notes' => 'UNVERIFIED — see FBR_236K filer note above.',
            ],
            [
                'buyer_type' => 'seller',
                'tax_status' => 'filer',
                'tax_name' => 'FBR Advance Tax — Seller (236C), Filer, up to 50M',
                'tax_code' => 'FBR_236C',
                'calculation_type' => TaxRule::CALC_PERCENTAGE,
                'percentage' => 4.5,
                'value_to' => 50000000,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => 'https://clearconcept.academy/property-tax-cut-83-percent-budget-2026-27-section-236c-236k/',
                'notes' => 'UNVERIFIED — confirm against FBR official Withholding Tax Card before activating.',
            ],
            [
                'buyer_type' => 'seller',
                'tax_status' => 'non_filer',
                'tax_name' => 'FBR Advance Tax — Seller (236C), Non-filer, up to 50M',
                'tax_code' => 'FBR_236C',
                'calculation_type' => TaxRule::CALC_PERCENTAGE,
                'percentage' => 11.5,
                'value_to' => 50000000,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => 'https://clearconcept.academy/property-tax-cut-83-percent-budget-2026-27-section-236c-236k/',
                'notes' => 'UNVERIFIED — see FBR_236C filer note above.',
            ],

            [
                'province' => 'Punjab',
                'tax_name' => 'Capital Value Tax (CVT)',
                'tax_code' => 'CVT',
                'calculation_type' => TaxRule::CALC_PERCENTAGE,
                'percentage' => 2.0,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => 'https://incometaxcalculatorpk.com/capital-value-tax-cvt/',
                'notes' => 'UNVERIFIED — secondary sources only, applicability to DHA transfers not confirmed against FBR primary text.',
            ],
            [
                'province' => 'Punjab',
                'tax_name' => 'Registration Fee',
                'tax_code' => 'REGISTRATION_FEE',
                'calculation_type' => TaxRule::CALC_FIXED,
                'fixed_amount' => 1000,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => 'https://4dewaari.com/blog/post/registry-chargesfee-in-punjab-20222023',
                'notes' => 'UNVERIFIED — real-estate blog, not Board of Revenue Punjab primary source. Flat Rs 500/1000 by value threshold per that source; confirm current amount before activating.',
            ],
            [
                'province' => 'Punjab',
                'tax_name' => 'e-Stamp / e-Registration Fee',
                'tax_code' => 'ESTAMP_FEE',
                'calculation_type' => TaxRule::CALC_FIXED,
                'fixed_amount' => 0,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => null,
                'notes' => 'UNVERIFIED — no reliable figure found. Needs admin configuration.',
            ],
            [
                'city' => 'Lahore',
                'tax_name' => 'DHA Transfer Fee',
                'tax_code' => 'DHA_TRANSFER_FEE',
                'calculation_type' => TaxRule::CALC_FIXED,
                'fixed_amount' => 0,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => 'https://dhalahore.org/procedures/transfer/',
                'notes' => 'UNVERIFIED — DHA fee schedule varies by phase/plot size and is published as image/PDF circulars, not machine-readable text. Needs manual entry per phase from official DHA circular.',
            ],
            [
                'city' => 'Lahore',
                'tax_name' => 'DHA Membership Fee',
                'tax_code' => 'DHA_MEMBERSHIP_FEE',
                'calculation_type' => TaxRule::CALC_FIXED,
                'fixed_amount' => 0,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => 'https://dhalahore.org/procedures/transfer/',
                'notes' => 'UNVERIFIED — needs manual entry per phase from official DHA circular.',
            ],
            [
                'city' => 'Lahore',
                'tax_name' => 'TIP / Cantonment Charges',
                'tax_code' => 'TIP_CANTONMENT',
                'calculation_type' => TaxRule::CALC_FIXED,
                'fixed_amount' => 0,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => null,
                'notes' => 'UNVERIFIED — needs admin configuration.',
            ],

            // ---- Toggle-driven line items (Verification / Biana / Online payment) ----
            // Each is its own tax_code so it only appears when its toggle is set,
            // rather than being a modifier bolted onto every other rule.
            [
                'requires_verification' => true,
                'tax_name' => 'Verification Fee',
                'tax_code' => 'VERIFICATION_FEE',
                'calculation_type' => TaxRule::CALC_FIXED,
                'fixed_amount' => 0,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => null,
                'notes' => 'UNVERIFIED — needs admin configuration. Charged only when "Verification Required" is Yes.',
            ],
            [
                'biana_included' => true,
                'tax_name' => 'Biana Fee',
                'tax_code' => 'BIANA_FEE',
                'calculation_type' => TaxRule::CALC_FIXED,
                'fixed_amount' => 0,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => null,
                'notes' => 'UNVERIFIED — needs admin configuration. Charged only when "Biana Included" is Yes.',
            ],
            [
                'stamp_duty_payment_method' => 'online',
                'tax_name' => 'Online Payment Surcharge',
                'tax_code' => 'ONLINE_PAYMENT_SURCHARGE',
                'calculation_type' => TaxRule::CALC_FIXED,
                'fixed_amount' => 0,
                'priority' => 0,
                'effective_from' => $effectiveFrom,
                'status' => 0,
                'source_url' => null,
                'notes' => 'UNVERIFIED — needs admin configuration. Charged only when Stamp Duty Payment Method is Online Paid.',
            ],
        ];
    }
}
