<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request)
    {
        /** @var User $user */
        $user = User::query()->create($request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]));

        $user->sendEmailVerificationNotification();

        return redirect('/login')->with('status', 'Zarejestrowano pomyślnie! Zaloguj się.');
    }
}
