<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCitoyenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
           'prenoms' => 'required|string|max:255',
           'date_naissance' => 'required|string|max:255',
           'lieu_naissance' => 'required|string|max:255',
           'sexe' => 'required|string|max:255',
           'telephone' => 'required|string|max:255',
           'cnib' => 'required|string|max:255',
           'userId' => 'required|number',
        ];
    }
}
