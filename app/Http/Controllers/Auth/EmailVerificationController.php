<?php

namespace App\Http\Controllers\Auth;

use App\{
    Http\Controllers\Controller,
    Services\Auth\EmailVerificationService,
    Models\User,
};

use Illuminate\{
    Http\Request,
    Support\Facades\Auth,
    Support\Facades\Mail,
    Support\Facades\URL,
    Carbon\Carbon,
};

class EmailVerificationController extends Controller
{
    protected $emailVerificationSerice;

    public function __construct(EmailVerificationService $emailVerificationService)
    {
        $this->emailVerificationService = $emailVerificationService;
    }

    public function sendVerificationEmail()
    {
        $user = Auth::user();
        
        if ($user->is_verified) {
            return redirect()->back()->with('Success', 'Your email is already verified.');
        }

        $this->emailVerificationService->sendVerification($user);

        return redirect()->back()->with('Success', 'Verification email sent! Please check your inbox.');
    }

    public function verify(Request $request, $userId)
    {
        $this->emailVerificationService->verifyEmail($request, $userId);
    
        $user = Auth::user();
    
        return redirect()->route($user->role . '.home')->with('EmailSuccess', 'Email successfully verified!');
    }
}