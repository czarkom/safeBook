<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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

    public function messages()
    {
        return [
            'first_name.required'    => 'Podaj imię',
            'last_name.required' => 'Podaj nazwisko',
            'email.required'    => 'Podaj adres e-mail',
            'email.unique' => 'Email jest już zajęty',
            'password.required' => 'Podaj hasło',
            'password_repeat.required' => 'Podaj hasło ponownie',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'password_repeat' => 'required',
        ];
    }
}
