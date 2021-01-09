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
            'email.email' => 'Nieprawidłowy format adresu email',
            'password.required' => 'Podaj hasło',
            'password.min' => 'Hasło musi mieć co najmniej 8 znaków',
            'password.regex' => 'Hasło musi zawierać co najmniej 1 dużą, 1 małą literę, 1 cyfrę oraz 1 znak specjalny (!$#%@&^)',
            'password_repeat.required' => 'Podaj hasło ponownie',
            'password_repeat.same' => 'Powtórzone hasło nieprawidłowe',
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
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8|regex:/^.*(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!$#%@&^]).*$/',
            'password_repeat' => 'required|same:password',
        ];
    }
}
