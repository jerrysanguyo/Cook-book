<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title>Laravel Tailwind Layout</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-auto bg-gray-100 lg:overflow-hidden">
    <nav class="bg-yellow-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-2xl font-bold text-white">Cooking Ina</a>
                    </div>
                </div>
                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-4">
                    @if(!Request::is('/'))
                        <a href="/" class="text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    @endif
                    
                    @if(!Request::is('login'))
                        <a href="{{ route('login.index') }}" class="text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    @endif

                    @if(!Request::is('register'))
                        <a href="{{ route('register.index') }}" class="text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                    @endif
                </div>
                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-white hover:text-yellow-300 focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="top-0 left-0 w-full bg-yellow-600 overflow-hidden max-h-0 transition-all duration-500 ease-in-out z-50">
            <div class="space-y-1 px-4 pt-4 pb-3 sm:px-6">
                @if(!Request::is('/'))
                    <a href="/" class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium">Home</a>
                @endif

                @if(!Request::is('login'))
                    <a href="{{ route('login.index') }}" class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium">Login</a>
                @endif

                @if(!Request::is('register'))
                    <a href="{{ route('register.index') }}" class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium">Register</a>
                @endif
            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <div class="py-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @yield('content')
    </div>

    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            if (mobileMenu.classList.contains('max-h-0')) {
                // Open the menu
                mobileMenu.classList.remove('max-h-0');
                mobileMenu.classList.add('max-h-screen');
            } else {
                // Close the menu
                mobileMenu.classList.remove('max-h-screen');
                mobileMenu.classList.add('max-h-0');
            }
        });
    </script>
</body>
</html>
