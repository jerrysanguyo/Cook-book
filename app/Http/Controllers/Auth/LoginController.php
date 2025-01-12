<?php

namespace App\Http\Controllers\Auth;

use App\{
    Http\Controllers\Controller,
    Http\Requests\Auth\LoginRequest,
    Models\User,
    Services\Auth\LoginService,
};

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
            return redirect()->route('welcome')->with('Success', 'Welcome!');
        }

        return redirect()->route('login.index')->with('Failed', 'Invalid login credentials.');
    }
}
