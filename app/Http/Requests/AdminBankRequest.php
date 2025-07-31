<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminBankRequest extends FormRequest
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
            'profile' => ['required', 'string'],
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'beneficiary' => ['required', 'string'],
            'account' => ['required', 'string'],
            'r_aba' => ['required', 'string'],
            'swift' => ['required', 'string']
        ];
    }
}
