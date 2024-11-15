@extends('layouts.welcomeLayout')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg flex overflow-hidden">
        <!-- Left Section with Logo -->
        <div class="flex items-center justify-center w-1/2 p-8 bg-gray-50">
            <img src="{{ asset('path/to/your/logo.png') }}" alt="Cooking ina logo" class="w-3/4 h-auto">
        </div>

        <!-- Right Section with Form -->
        <div class="w-1/2 p-8">
            <h1 class="text-3xl font-bold mb-4 text-center">Registration</h1>
            <p class="text-gray-600 mb-1 text-center">Don't have an account? Create your account, it takes less than a minute.</p>
            <a href="{{ route('login.index') }}" class="text-indigo-600 mb-4 block text-center">Already have an account</a>

            <form>
                <div class="mb-4">
                    <label for="full-name" class="block text-sm font-medium text-gray-700">Full name</label>
                    <input type="text" id="full-name" name="full-name" placeholder="Full name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="user-name" class="block text-sm font-medium text-gray-700">User name</label>
                    <input type="text" id="user-name" name="user-name" placeholder="User name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="flex items-start mb-4">
                    <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <label for="terms" class="ml-2 text-sm text-gray-600">By checking this box, you consent to our collection and processing of your personal data in accordance with our <a href="#" class="text-indigo-600 underline">Privacy Policy</a>.</label>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
