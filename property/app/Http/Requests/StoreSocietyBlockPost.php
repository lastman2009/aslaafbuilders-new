<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocietyBlockPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'status' => 'nullable|boolean',
        ];
    }

    protected function passedValidation()
    {
        $this->replace(array_merge($this->validated(), [
            'status' => $this->input('status', 1),
        ]));
    }
}
