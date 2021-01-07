<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, UserService $userService)
    {
        $credentials = $request->only('email','password');

        $credentials['password'] = sha1($credentials['password']);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $userService->saveLogin($request);
            return redirect()->intended('dashboard');
        }
//
        return back()->withErrors([
            'message' => 'Nieprawidłowe dane logowania',
        ]);
    }
}
