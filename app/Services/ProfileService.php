<?php

namespace App\Services;

use App\Models\User;
use App\Models\Picture;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileService
{
    public function updateProfile(User $profile, array $data): void
    {
        $updateData = [
            'user_name' => $data['user_name'],
        ];
        
        if (!empty($data['password'])) {
            $updateData['password'] = Hash::make($data['password']);
        }
        
        if (isset($data['profile_picture'])) {
            $folderPath = public_path('profile/' . $profile->id . '_' . str_replace('@', '_', $profile->email));

            // Create the folder if it doesn't exist
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0755, true);
            }

            $fileExtension = $data['profile_picture']->getClientOriginalExtension();
            $fileName = 'profile_picture_' . str_replace('@', '_', $profile->email) . '.' . $fileExtension;
            
            // Full path for the file
            $filePath = 'profile/' . $profile->id . '_' . str_replace('@', '_', $profile->email) . '/' . $fileName;

            // Delete existing file if it exists
            $existingPicture = Picture::profilePicture($profile->id);
            if ($existingPicture && File::exists(public_path($existingPicture->path))) {
                File::delete(public_path($existingPicture->path));
            }

            // Move the new file to the public folder
            $data['profile_picture']->move($folderPath, $fileName);

            $updateData['profile_picture'] = $filePath;
            
            if ($existingPicture) {
                $existingPicture->update([
                    'name' => $fileName,
                    'path' => $filePath,
                    'updated_by' => $profile->id,
                ]);
            } else {
                Picture::create([
                    'name' => $fileName,
                    'path' => $filePath,
                    'remarks' => 'profile',
                    'added_by' => $profile->id,
                    'updated_by' => $profile->id,
                ]);
            }
        }
        
        $profile->update($updateData);
    }
}