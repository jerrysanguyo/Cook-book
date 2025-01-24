@extends('layouts.welcomeLayout')

@section('content')
<div class="flex items-center justify-center px-4 sm:px-6 lg:px-8 lg:min-h-screen">
    <div class="w-full max-w-4xl bg-white/80 rounded-xl shadow-2xl flex flex-col md:flex-row overflow-hidden backdrop-blur-md">
        <!-- Left Section with Logo -->
        <div class="flex items-center justify-center w-full md:w-1/2 bg-yellow-100">
            <img src="{{ asset('image/update.webp') }}" alt="Cooking Ina Logo" 
                class="w-full h-full object-cover">
        </div>

        <!-- Right Section with Form -->
        <div class="w-full md:w-1/2 p-6 sm:p-8">
            <div class="container mx-auto mt-4">
                <div class="">
                    <div class="flex items-center">
                        <img class="w-16 h-16 rounded-full mr-4" src="{{ Auth::user()->profile_picture_url }}" alt="Profile Picture">
                        <div>
                            <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-600">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="username" class="block text-gray-700">Username</label>
                                <input type="text" name="username" id="username" value="{{ Auth::user()->user_name }}" class="w-full px-3 py-2 border-2 border-yellow-400 rounded-full focus:ring-yellow-500 focus:border-yellow-500">
                            </div>
                            <div class="mb-4">
                                <label for="profile_picture" class="block text-gray-700">Profile Picture</label>
                                <div class="flex items-center">
                                    <input type="file" name="profile_picture" id="profile_picture" class="hidden">
                                    <label for="profile_picture" class="cursor-pointer bg-yellow-500 text-white px-4 py-2 rounded-full">
                                        Choose File
                                    </label>
                                    <span id="file-chosen" class="ml-2 text-gray-600">No file chosen</span>
                                </div>
                            </div>
                            <script>
                                const fileInput = document.getElementById('profile_picture');
                                const fileChosen = document.getElementById('file-chosen');

                                fileInput.addEventListener('change', function() {
                                    fileChosen.textContent = this.files[0].name;
                                });
                            </script>
                            <div class="mb-4">
                                <label for="password" class="block text-gray-700">New Password</label>
                                <input type="password" name="password" id="password" class="w-full px-3 py-2 border-2 border-yellow-400 rounded-full focus:ring-yellow-500 focus:border-yellow-500">
                            </div>
                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-gray-700">Confirm New Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border-2 border-yellow-400 rounded-full focus:ring-yellow-500 focus:border-yellow-500">
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-yellow-600 text-white font-bold py-2 px-4 rounded-full hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
