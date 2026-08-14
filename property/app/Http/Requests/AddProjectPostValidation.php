<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProjectPostValidation extends FormRequest
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
        'title' => 'required',
        'city_id' => 'required',
        'town_id' => 'required',
        'address' => 'required',
        'description' => 'required',
        'min_area_residential' => 'required|numeric',
        'max_area_residential' => 'required|numeric',
        'min_area_type_residential' => 'required',
        'max_area_type_residential' => 'required',
        'min_area_type_commercial' => 'required',
        'max_area_type_commercial' => 'required',
        'min_area_commercial' => 'required|numeric',    
        'max_area_commercial' => 'required|numeric',
        'images' =>'image|mimes:jpg,png',
        'photo' =>'image|mimes:jpg,png',



        
        ];
    }
}
