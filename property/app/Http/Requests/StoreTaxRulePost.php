<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaxRulePost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'province' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'society_id' => 'nullable|integer|exists:societies,id',
            'block_id' => 'nullable|integer|exists:society_blocks,id',
            'property_type' => ['nullable', 'string', Rule::in(['residential', 'commercial'])],
            'category' => ['nullable', 'string', Rule::in(['plot', 'house', 'apartment'])],
            'plot_size' => 'nullable|string|max:50',
            'size_from' => 'nullable|numeric|min:0',
            'size_to' => 'nullable|numeric|gte:size_from',
            'buyer_type' => ['nullable', 'string', Rule::in(['buyer', 'seller'])],
            'tax_status' => ['nullable', 'string', Rule::in(['filer', 'late_filer', 'non_filer', 'overseas'])],
            'transfer_type' => ['nullable', 'string', Rule::in(['normal', 'gift', 'inheritance', 'biana_only'])],
            'requires_verification' => 'nullable|boolean',
            'biana_included' => 'nullable|boolean',
            'stamp_duty_payment_method' => ['nullable', 'string', Rule::in(['bank', 'online'])],
            'value_from' => 'nullable|numeric|min:0',
            'value_to' => 'nullable|numeric|gte:value_from',
            'tax_name' => 'required|string|max:150',
            'tax_code' => 'required|string|max:50',
            'calculation_type' => ['required', Rule::in(['percentage', 'fixed', 'percentage_plus_fixed'])],
            'value_basis' => ['nullable', 'string', Rule::in(['declared', 'dc'])],
            'percentage' => 'nullable|numeric|min:0|max:100',
            'fixed_amount' => 'nullable|numeric|min:0',
            'minimum_amount' => 'nullable|numeric|min:0',
            'maximum_amount' => 'nullable|numeric|min:0',
            'per_owner' => 'nullable|boolean',
            'priority' => 'nullable|integer|min:0',
            'effective_from' => 'required|date',
            'effective_to' => 'nullable|date|after_or_equal:effective_from',
            'status' => 'required|boolean',
            'source_url' => 'nullable|url|max:255',
            'notes' => 'nullable|string',
        ];
    }
}
