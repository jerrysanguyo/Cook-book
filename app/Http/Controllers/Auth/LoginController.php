<?php

namespace App\Http\Controllers\Auth;

use App\{
    Http\Controllers\Controller,
    Http\Requests\Auth\LoginRequest,
    Models\User,
};

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    
    public function store(LoginRequest $request)
    {
        //
    }
}
