<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <title>Laravel Tailwind Layout</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 overflow-hidden">
    <nav>
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <!-- <a href="/" class="text-2xl font-bold text-indigo-600">Cooking Ina</a> -->
                    </div>
                </div>
                <!-- Navigation Links -->
                <div class="flex items-center">
                    <div class="relative">
                        @if(!Request::is('/'))
                            <a href="/" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        @endif
                        
                        @if(!Request::is('login'))
                            <a href="{{ route('login.index') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        @endif

                        @if(!Request::is('register'))
                            <a href="{{ route('register.index') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <div class="py-1">
        @yield('content')
    </div>

</body>
</html>
