<?php

use Illuminate\Support\Facades\Route;
use App\{
    Http\Controllers\Auth\LoginController,
    Http\Controllers\Auth\RegisterController,
    Http\Controllers\Auth\EmailVerificationController,
    Http\Controllers\HomeController,
    Http\Controllers\ProfileController,
    Http\Controllers\IngredientTypeController,
    Http\Controllers\IngredientController,
    Http\Controllers\CategoryController,
    Http\Controllers\CourseController,
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
    Route::get('/email/verify/{user}', [EmailVerificationController::class, 'verify'])->name('email.verify');
    Route::resource('profile', ProfileController::class);
    Route::resource('ingredientType', IngredientTypeController::class);
    Route::resource('ingredient', IngredientController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('course', CourseController::class);
});

Route::middleware(['auth', 'check.user.role'])->prefix('admin')->name('admin.')->group(function() 
{
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'check.user.role'])->prefix('user')->name('user.')->group(function() 
{
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});