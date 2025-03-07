<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js" defer></script>

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
                    <a href="{{ route(Auth::user()->role . '.home') }}" class="text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <div class="relative">
                        <button id="ingredient-menu-button" class="inline-flex text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-sm font-medium focus:outline-none">
                            Ingredients
                            <svg class="-mr-1 size-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="ingredient-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden z-50">
                            <a href="{{ route(Auth::user()->role . '.ingredient.index') }}" class="rounded-md block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Ingredients list
                            </a>
                            <a href="{{ route(Auth::user()->role . '.ingredientType.index') }}" class="rounded-md block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Ingrdient type
                            </a>
                        </div>
                    </div>
                    <a href="{{ route(Auth::user()->role . '.category.index') }}" class="text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-sm font-medium">Category</a>
                    <div class="relative">
                        <button id="user-menu-button" class="inline-flex text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-sm font-medium focus:outline-none">
                            {{ Auth::user()->full_name }}
                            <svg class="-mr-1 size-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden z-50">
                            <a href="{{ route(Auth::user()->role . '.profile.index') }}" class="rounded-md block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="rounded-md block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
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
                <a href="{{ route(Auth::user()->role . '.home') }}" class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium">Home</a>
            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <div class="py-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @yield('content')
    </div>
    <script src="{{ asset('js/homeLayoutJs.js') }}"></script>
    @stack('scripts')
</body>
</html>
