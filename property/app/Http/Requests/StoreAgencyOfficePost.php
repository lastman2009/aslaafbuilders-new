<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgencyOfficePost extends FormRequest
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
              'telephone' => 'min:10|numeric|required',
              'email' => 'email|required',
              'mobile_no' => 'min:10|max:14|required',
              'address' => 'min:10|required',
              'city_id' => 'required',
        ];
    }
}
