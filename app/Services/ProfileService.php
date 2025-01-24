<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    public function updateProfile(User $profile, array $data): Void
    {
        $updateData = [
            'user_name' => $data['user_name'],
        ];

        if (!empty($data['password'])) {
            $updateData['password'] = Hash::make($data['password']);
        }

        $profile->update($updateData);
    }
}