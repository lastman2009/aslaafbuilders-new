<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
              'photo' =>'required|image|mimes:jpg,png',
              'info_graphic' =>'image|mimes:jpg,png',
              'title' => 'min:10|required',
              'contant' => 'min:50|required',
        ];
    }
}
