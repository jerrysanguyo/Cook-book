<?php

namespace App\Services\Auth;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function register(array $validated): User
    {
        return User::create([
            'full_name' =>  $validated['full_name'], 
            'user_name' =>  $validated['user_name'],
            'email'     =>  $validated['email'],
            'password'  =>  bcrypt($validated['password']), 
            'is_verified' => false,
            'role'      =>  'user',
        ]);
    }
}