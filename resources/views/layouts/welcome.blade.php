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
<body class="bg-gray-100">
    <nav>
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <!-- <a href="/" class="text-2xl font-bold text-indigo-600">Cooking Ina</a> -->
                    </div>
                    <!-- Menu Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                    </div>
                </div>
                <!-- Profile Dropdown -->
                <div class="flex items-center">
                    <div class="relative">
                        <a href="" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <a href="" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <div class="py-6">
        @yield('content')
    </div>

</body>
</html>