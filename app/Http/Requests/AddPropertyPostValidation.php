<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPropertyPostValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
        'property_type_id' => 'required',
        'title' => 'required',
        'price' => 'required',
        'city_id' => 'required',
        'town_id' => 'required',
        'block_id' => 'required',
        'phase_id' => 'required',
        'area' => 'required',
        'area_type' => 'required',
        'description' => 'required|min:20',
        'images' =>'image|mimes:jpg,png',
        ];
    }
}
