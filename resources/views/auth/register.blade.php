@extends('layouts.welcomeLayout')

@section('content')
<!-- <div class="flex items-center justify-center px-4 sm:px-6 lg:px-8 min-h-screen"> -->
    
<div class="flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-4xl bg-white/80 rounded-xl shadow-2xl flex flex-col md:flex-row overflow-hidden backdrop-blur-md">
        <!-- Left Section with Logo -->
        <div class="flex items-center justify-center w-full md:w-1/2 bg-yellow-100">
            <img src="{{ asset('image/register.webp') }}" alt="Cooking Ina Logo" 
                class="w-full h-full object-cover">
        </div>

        <!-- Right Section with Form -->
        <div class="w-full md:w-1/2 p-6 sm:p-8">
            <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-center text-yellow-700">Join Our Cookbook Community!</h1>
            <p class="text-gray-700 mb-2 text-center">Create an account to access exclusive recipes and culinary tips.</p>
            <a href="{{ route('login.index') }}" class="text-yellow-700 mb-4 block text-center underline">Already have an account? Sign in</a>

            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="full-name" class="block text-sm font-medium text-gray-800">Full Name</label>
                    <input type="text" id="full-name" name="full_name" value="{{ old('full_name') }}" placeholder="Enter your full name" class="mt-1 block w-full border-2 border-yellow-400 p-2 rounded-full focus:ring-yellow-500 focus:border-yellow-500">
                    @error('full_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Choose a username" class="mt-1 block w-full border-2 border-yellow-400 p-2 rounded-full focus:ring-yellow-500 focus:border-yellow-500">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="user-name" class="block text-sm font-medium text-gray-800">Username</label>
                    <input type="text" id="user-name" name="user_name" value="{{ old('user_name') }}" placeholder="Choose a username" class="mt-1 block w-full border-2 border-yellow-400 p-2 rounded-full focus:ring-yellow-500 focus:border-yellow-500">
                    @error('user_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-800">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" class="mt-1 block w-full border-2 border-yellow-400 p-2 rounded-full focus:ring-yellow-500 focus:border-yellow-500">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="confirm-password" class="block text-sm font-medium text-gray-800">Confirm Password</label>
                    <input type="password" id="confirm-password" name="password_confirmation" placeholder="Confirm your password" class="mt-1 block w-full border-2 border-yellow-400 p-2 rounded-full focus:ring-yellow-500 focus:border-yellow-500">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-start mb-4">
                    <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-yellow-600 border-gray-300 rounded focus:ring-yellow-500">
                    <label for="terms" class="ml-2 text-sm text-gray-600">By checking this box, you consent to our collection and processing of your personal data in accordance with our <a href="#" class="text-yellow-700 underline">Privacy Policy</a>.</label>
                    @error('terms')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-yellow-600 text-white font-bold py-2 px-4 rounded-full hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
