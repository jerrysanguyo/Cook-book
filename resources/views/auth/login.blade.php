@extends('layouts.welcomeLayout')

@section('content')
<div class="flex items-center justify-center px-4 sm:px-6 lg:px-8 lg:min-h-screen">
    <div class="w-full max-w-4xl bg-white/80 rounded-xl shadow-2xl flex flex-col md:flex-row overflow-hidden backdrop-blur-md">
        <!-- Left Section with Logo -->
        <div class="flex items-center justify-center w-full md:w-1/2 bg-yellow-100">
            <img src="{{ asset('image/login.webp') }}" alt="Cooking Ina Logo" 
                class="w-full h-full object-cover">
        </div>

        <!-- Right Section with Form -->
        <div class="w-full md:w-1/2 p-6 sm:p-8">
            <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-center text-yellow-700">Welcome Back!</h1>
            <p class="text-gray-700 mb-2 text-center">Sign in to access your account and discover new recipes.</p>
            <a href="{{ route('register.index') }}" class="text-yellow-700 mb-4 block text-center underline">Don't have an account? Register here</a>

            <form>
                <div class="mb-4">
                    <label for="user-name" class="block text-sm font-medium text-gray-800">Username</label>
                    <input type="text" id="user-name" name="user-name" placeholder="Enter your username" class="mt-1 block w-full border-2 border-yellow-400 p-2 rounded-full focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-800">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" class="mt-1 block w-full border-2 border-yellow-400 p-2 rounded-full focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-yellow-600 border-gray-300 rounded focus:ring-yellow-500">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                    </div>
                    <a href="#" class="text-sm text-yellow-700 underline">Forgot password?</a>
                </div>

                <button type="submit" class="w-full bg-yellow-600 text-white font-bold py-2 px-4 rounded-full hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection
