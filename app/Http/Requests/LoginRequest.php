<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string email
 * @property string password
 */
class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'email.required'    => 'Podaj adres e-mail',
            'password.required' => 'Podaj hasło',
        ];
    }

    public function rules()
    {
        return [
            'email'    => 'required',
            'password' => 'required',
        ];
    }
}
