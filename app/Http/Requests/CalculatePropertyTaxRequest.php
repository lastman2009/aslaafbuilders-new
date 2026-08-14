<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalculatePropertyTaxRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'property_value' => 'required|numeric|min:1',
            'dc_value' => 'nullable|numeric|min:0',
            'city_filter' => 'required|string|max:100',
            'society' => 'required|integer|exists:societies,id',
            'block' => 'required|integer|exists:society_blocks,id',
            'property_type' => 'nullable|string|in:residential,commercial',
            'category' => 'nullable|string|in:plot,house,apartment',
            'plot_size' => 'nullable|string|max:50',
            'kanal' => 'nullable|numeric|min:0',
            'marla' => 'nullable|numeric|min:0',
            'sqft' => 'nullable|numeric|min:0',
            'owner_count' => 'nullable|integer|min:1|max:50',
            'buyer_type' => ['nullable', 'string', Rule::in(['buyer', 'seller'])],
            'tax_status' => ['nullable', 'string', Rule::in(['filer', 'late_filer', 'non_filer', 'overseas'])],
            'transfer_type' => ['nullable', 'string', Rule::in(['normal', 'gift', 'inheritance', 'biana_only'])],
            'requires_verification' => 'nullable|boolean',
            'biana_included' => 'nullable|boolean',
            'agreement_type' => ['nullable', 'string', Rule::in(['simple', 'dc_value'])],
            'stamp_duty_payment_method' => ['nullable', 'string', Rule::in(['bank', 'online'])],
        ];
    }

    public function messages()
    {
        return [
            'city_filter.required' => 'Please select a city.',
            'society.required' => 'Please select a society / phase.',
            'society.exists' => 'Please select a valid society / phase.',
            'block.required' => 'Please select a block.',
            'block.exists' => 'Please select a valid block.',
            'property_value.required' => 'Please enter the property value.',
        ];
    }
}
