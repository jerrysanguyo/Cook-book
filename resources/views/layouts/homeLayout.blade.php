<!DOCTYPE html>
<html lang="en" x-data="{ mobileOpen: false }">

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

    <title>Laravel Tailwind Layout</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-auto bg-gray-100 lg:overflow-hidden">
    <nav class="bg-yellow-600 relative" x-data="{ mobileOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-white">Cooking Ina</a>
                </div>
                <div class="md:hidden flex items-center">
                    <button @click="mobileOpen = !mobileOpen" class="focus:outline-none">
                        <svg :class="{ 'rotate-90': mobileOpen }"
                            class="h-6 w-6 text-white transition-transform duration-300 ease-in-out"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
                <div class="absolute md:relative top-16 md:top-0 left-0 w-full md:w-auto bg-yellow-600 z-50
                 transition-all duration-300 ease-in-out overflow-hidden md:overflow-visible
                 md:flex md:items-center p-5"
                    :class="mobileOpen ? 'max-h-screen opacity-100' : 'max-h-0 opacity-0 md:opacity-100 md:max-h-full'">
                    <ul class="flex flex-col md:flex-row md:space-x-4">
                        <li>
                            <a href="{{ route(Auth::user()->role . '.home') }}"
                                class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base md:text-sm font-medium">
                                Home
                            </a>
                        </li>
                        <li x-data="{ open: false }" class="relative md:static">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base md:text-sm font-medium focus:outline-none">
                                Ingredients
                                <svg :class="{ 'rotate-180': open }"
                                    class="h-5 w-5 transition-transform duration-200 ease-in-out ml-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95"
                                class="mt-1 md:absolute md:bg-white md:rounded-md md:shadow-lg md:z-50 md:w-48 text-gray-700">
                                <a href="{{ route(Auth::user()->role . '.ingredient.index') }}"
                                    class="block px-4 py-2 text-sm hover:bg-gray-100">
                                    Ingredients list
                                </a>
                                <a href="{{ route(Auth::user()->role . '.ingredientType.index') }}"
                                    class="block px-4 py-2 text-sm hover:bg-gray-100">
                                    Ingredient type
                                </a>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route(Auth::user()->role . '.category.index') }}"
                                class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base md:text-sm font-medium">
                                Category
                            </a>
                        </li>
                        <li>
                            <a href="{{ route(Auth::user()->role . '.course.index') }}"
                                class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base md:text-sm font-medium">
                                Course
                            </a>
                        </li>
                        <li x-data="{ open: false }" class="relative md:static">
                            <button @click="open = !open"
                                class="flex items-center justify-between w-full text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base md:text-sm font-medium focus:outline-none">
                                {{ Auth::user()->full_name }}
                                <svg :class="{ 'rotate-180': open }"
                                    class="h-5 w-5 transition-transform duration-200 ease-in-out ml-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95"
                                class="mt-1 md:absolute md:bg-white md:rounded-md md:shadow-lg md:z-50 md:w-48 text-gray-700">
                                <a href="{{ route(Auth::user()->role . '.profile.index') }}"
                                    class="block px-4 py-2 text-sm hover:bg-gray-100">
                                    Profile
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left block px-4 py-2 text-sm hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="py-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @yield('content')
    </div>
    @stack('scripts')
</body>

</html>