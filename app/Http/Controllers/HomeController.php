<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\{
    Http\Request,
    Support\Facades\Auth,
};

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('home');
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(User $user)
    {
        //
    }
    
    public function edit(User $user)
    {
        //
    }
    
    public function update(Request $request, User $user)
    {
        //
    }
    
    public function destroy(User $user)
    {
        //
    }
}
