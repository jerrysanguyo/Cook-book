<?php

namespace App\Http\Controllers\Auth;

use App\{
    Http\Controllers\Controller,
    Http\Requests\Auth\LoginRequest,
    Models\User,
    Services\Auth\LoginService,
};

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $validated = $request->validated();

        if ($this->loginService->login($validated)) {
            $userRole = Auth::user()->role;
            return redirect()->route($userRole . '.home')->with('Success', 'Welcome!');
        }

        return redirect()->route('login.index')->with('Failed', 'Invalid login credentials.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index')->with('Success', 'You have logged out successfully!');
    }
}
