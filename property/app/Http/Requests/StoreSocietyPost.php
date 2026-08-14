<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSocietyPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('society');

        return [
            'province' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'name' => 'required|string|max:150',
            'slug' => [
                'required', 'string', 'max:170',
                Rule::unique('societies', 'slug')
                    ->where(fn ($query) => $query->where('city', $this->input('city')))
                    ->ignore($id?->id),
            ],
            'status' => 'required|boolean',
        ];
    }
}
