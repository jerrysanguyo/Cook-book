<?php

namespace App\Http\Controllers\Auth;

use App\{
    Models\User,
    Http\Controllers\Controller,
    Http\Requests\Auth\RegisterRequest,
};
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //
    }
}
