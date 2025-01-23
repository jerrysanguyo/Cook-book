<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class EmailVerificationService
{
    public function sendVerification(User $user): void
    {
        $verificationUrl = URL::temporarySignedRoute(
            $user->role . '.email.verify',
            Carbon::now()->addMinutes(60),
            ['user' => $user->id]
        );

        Mail::send('Email.verify', ['url' => $verificationUrl, 'user' => $user], function ($message) use ($user) {
            $message->to($user->email)->subject('Verify Your Email Address');
        });
    }

    public function verifyEmail(Request $request, $userId): User
    {
        if (!$request->hasValidSignature()) {
            abort(401, 'Invalid or expired link.');
        }
        $user = User::findOrFail($userId);

        $user->update([
            'email_verified_at' => Carbon::now(),
            'is_verified' => '1',
        ]);

        return $user;
    }
}