<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'unique:users', 'max:100'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'type' => ['required', 'string',  Rule::in(['TUTOR', 'VET'])],
            'tutor_cpf' => ['required_if:type,TUTOR', 'nullable', 'string'],
            'vet_crmv' => ['required_if:type,VET', 'nullable', 'string']
        ];
    }
}
