<?php

use Illuminate\Support\Facades\Route;
use App\{
    Http\Controllers\Auth\LoginController,
    Http\Controllers\Auth\RegisterController,
};

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('login', LoginController::Class);
Route::resource('register', RegisterController::class);