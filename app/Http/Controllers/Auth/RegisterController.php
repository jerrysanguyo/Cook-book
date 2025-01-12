<?php

namespace App\Http\Controllers\Auth;

use App\
{
    Models\User,
    Services\Auth\RegisterService,
    Http\Controllers\Controller,
    Http\Requests\Auth\RegisterRequest,
    
};

class RegisterController extends Controller
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        $this->registerService->register($validated);

        return redirect()->route('welcome')->with('Success', 'You have registered successfully!');
    }
}
