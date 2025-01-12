<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(array $validated): bool
    {
        return Auth::attempt([
            'user_name' => $validated['user_name'],
            'password' => $validated['password'],
        ]);
    }
}