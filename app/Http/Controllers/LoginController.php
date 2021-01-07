<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     */
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->only('email','password');

        $credentials['password'] = sha1($credentials['password']);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
//
        return back()->withErrors([
            'message' => 'Nieprawidłowe dane logowania',
        ]);
    }
}
