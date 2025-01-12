<?php

namespace App\Services\Auth;

use App\Models\User;

class loginService
{
    public function login(array $validated): User
    {
        return Auth::attempt([
            'user_name' =>  $validated['user_name'],
            'password' =>  $validated['password']
        ]);
    }
}