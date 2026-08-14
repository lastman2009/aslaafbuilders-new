<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteSettingPostValidation extends FormRequest
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
        'agency_name' => 'required',
        'email' => 'required|email|',
        'address' => 'required',
        'about_us' => 'required|min:100',
        'ceo_message' => 'required|50',
        'contact_number' => 'min:10|numeric',
        'logo' =>'image|mimes:jpg,png',   
        'ceo_image' =>'image|mimes:jpg,png',
        'new_banners' =>'image|mimes:jpg,png',
        ];

        
    }
}
