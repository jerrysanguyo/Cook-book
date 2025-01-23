<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = [
            'full_name' => 'Jerry G. Sanguyo Jr.',
            'user_name' => 'jsanguyo',
            'email' => 'jsanguyo1624@gmail.com',
            'email_verified_at' => null, 
            'is_verified' => false,
            'password' => Hash::make('admin'), 
            'role' => 'superadmin',
            'remember_token' => Str::random(10),
        ];

        User::create($admin);
    }
}
