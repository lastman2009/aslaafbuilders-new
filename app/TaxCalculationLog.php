<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxCalculationLog extends Model
{
    protected $fillable = [
        'user_id', 'property_value', 'province', 'city', 'society_id', 'property_type',
        'category', 'plot_size', 'buyer_type', 'tax_status', 'transfer_type',
        'breakdown', 'total', 'ip_address',
    ];

    protected $casts = [
        'breakdown' => 'array',
        'property_value' => 'float',
        'total' => 'float',
    ];
}
