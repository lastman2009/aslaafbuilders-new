<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgencyStaffPost extends FormRequest
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
               'name' =>    array('required', 'regex:/^[a-zA-Z\s]+$/'),
              'designation' =>array('required', 'regex:/^[a-zA-Z\s]+$/' , 'min:2'),
              'year_of_service' =>'min:2|max:4|required',
              'contact_number' => 'min:2|max:4|required',
              'email' =>'email|required';
        ];
    }
}
