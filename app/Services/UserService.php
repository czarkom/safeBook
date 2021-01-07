<?php


namespace App\Services;


use App\Models\LastLogin;
use App\Models\User;

class UserService
{
    public function getLastLogins(User $user){
        return $user->lastLogins()->latest()->paginate(5);
    }

    public function saveLogin($request){
        LastLogin::query()->create([
            'ip_address' => strval($request->ip()),
            'user_id' => $request->user()->id
        ]);
    }

}
