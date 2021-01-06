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
    public function __invoke(LoginRequest $request, Guard $auth)
    {
        $request = $request->validated();
//        $credentials = $request->only('email','password');
//
//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//            return redirect()->intended('dashboard');
//        }
        if (!$auth->validate($request)) {
            return new Response(['message' => 'Nieprawidłowe dane logowania.'], Response::HTTP_UNAUTHORIZED);
        }

        dump($request);
        return new Response([
            'wiadomosc' => 'dupa',
        ]);
    }
}
