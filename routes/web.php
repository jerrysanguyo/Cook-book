<?php

use Illuminate\Support\Facades\Route;
use App\{
    Http\Controllers\Auth\LoginController,
    Http\Controllers\Auth\RegisterController,
    Http\Controllers\Auth\EmailVerificationController,
    Http\Controllers\HomeController,
    Http\Controllers\ProfileController,
};

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::resource('login', LoginController::Class);
Route::resource('register', RegisterController::class);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'check.user.role'])->prefix('superadmin')->name('superadmin.')->group(function() 
{
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/email/send', [EmailVerificationController::class, 'sendVerificationEmail'])->name('verification.send');
    Route::get('/email/verify/{user}', [EmailVerificationController::class, 'verify'])->name('email.verify');});

Route::middleware(['auth', 'check.user.role'])->prefix('admin')->name('admin.')->group(function() 
{
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'check.user.role'])->prefix('user')->name('user.')->group(function() 
{
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});