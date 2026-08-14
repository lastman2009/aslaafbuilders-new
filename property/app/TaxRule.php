<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxRule extends Model
{
    protected $fillable = [
        'province', 'city', 'society_id', 'block_id', 'property_type', 'category',
        'plot_size', 'size_from', 'size_to',
        'buyer_type', 'tax_status', 'transfer_type',
        'requires_verification', 'biana_included', 'stamp_duty_payment_method',
        'value_from', 'value_to',
        'tax_name', 'tax_code', 'calculation_type', 'value_basis',
        'percentage', 'fixed_amount', 'minimum_amount', 'maximum_amount', 'per_owner',
        'priority', 'effective_from', 'effective_to',
        'status', 'source_url', 'notes',
    ];

    protected $casts = [
        'effective_from' => 'date',
        'effective_to' => 'date',
        'value_from' => 'float',
        'value_to' => 'float',
        'size_from' => 'float',
        'size_to' => 'float',
        'percentage' => 'float',
        'fixed_amount' => 'float',
        'minimum_amount' => 'float',
        'maximum_amount' => 'float',
        'per_owner' => 'boolean',
        'requires_verification' => 'boolean',
        'biana_included' => 'boolean',
    ];

    const CALC_PERCENTAGE = 'percentage';
    const CALC_FIXED = 'fixed';
    const CALC_PERCENTAGE_PLUS_FIXED = 'percentage_plus_fixed';

    const BASIS_DECLARED = 'declared';
    const BASIS_DC = 'dc';

    public function society()
    {
        return $this->belongsTo(Society::class);
    }

    public function block()
    {
        return $this->belongsTo(SocietyBlock::class, 'block_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeEffective($query, $date = null)
    {
        $date = $date ?: now()->toDateString();

        return $query->where('effective_from', '<=', $date)
            ->where(function ($q) use ($date) {
                $q->whereNull('effective_to')->orWhere('effective_to', '>=', $date);
            });
    }

    /**
     * Specificity score used to pick one winning rule per tax_code when several
     * wildcard/scoped rules match the same request. Powers of two by precedence
     * so no combination of the lower-weight columns can outrank a single
     * higher-precedence match (avoids arbitrary ties from additive scoring).
     */
    public function specificity(): int
    {
        $score = 0;
        $score += $this->block_id ? 1024 : 0;
        $score += $this->society_id ? 512 : 0;
        $score += $this->city ? 256 : 0;
        $score += $this->province ? 128 : 0;
        $score += ($this->size_from !== null || $this->size_to !== null) ? 64 : 0;
        $score += ($this->value_from !== null || $this->value_to !== null) ? 32 : 0;
        $score += $this->property_type ? 1 : 0;
        $score += $this->category ? 1 : 0;
        $score += $this->plot_size ? 1 : 0;
        $score += $this->buyer_type ? 1 : 0;
        $score += $this->tax_status ? 1 : 0;
        $score += $this->transfer_type ? 1 : 0;
        $score += $this->requires_verification !== null ? 1 : 0;
        $score += $this->biana_included !== null ? 1 : 0;
        $score += $this->stamp_duty_payment_method ? 1 : 0;

        return $score;
    }
}
