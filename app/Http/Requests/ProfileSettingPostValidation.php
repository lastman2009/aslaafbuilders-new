<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileSettingPostValidation extends FormRequest
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
        'edit_profile_first_name' =>    array('required', 'regex:/^[a-zA-Z\s]+$/'),
        'edit_profile_last_name' =>    array('regex:/^[a-zA-Z\s]+$/'),
        'edit_profile_email' => 'email',
        'edit_profile_city' =>array('regex:/^[a-zA-Z\s]+$/'),
        'edit_profile_address' =>'min:5',
        'edit_profile_cnic' =>array('regex:/^[0-9\s-]+$/','min:15'),
        'edit_profile_phone' =>'numeric|min:9',     

         
        ];
    }
}
