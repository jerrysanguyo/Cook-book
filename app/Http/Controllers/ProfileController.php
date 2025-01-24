<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ProfileService;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService  = $profileService;
    }

    public function index()
    {
        return view('Profile.index');
    }
    
    public function update(ProfileRequest $request, User $profile)
    {
        $this->profileService->updateProfile($profile, $request->validated());
    
        return redirect()
            ->route(Auth::user()->role . '.profile.index')
            ->with('Success', 'Profile updated successfully.');
    }

    public function destroy(User $user)
    {
        //
    }
}
