<!-- Mobile Menu -->
<div x-show="mobileOpen" @click.away="mobileOpen = false" x-cloak x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 transform -translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform -translate-y-2" class="bg-yellow-600 overflow-hidden">
    <div class="space-y-1 px-4 pt-4 pb-3 sm:px-6">
        <a href="{{ route(Auth::user()->role . '.home') }}"
            class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium">
            Home
        </a>
        <!-- Ingredients Dropdown -->
        <div x-data="{ open: false }" class="block">
            <button @click="open = !open"
                class="w-full text-left text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium flex justify-between items-center">
                Ingredients
                <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transition-transform duration-200 ease-in-out"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" class="mt-1 space-y-1 pl-4">
                <a href="{{ route(Auth::user()->role . '.ingredient.index') }}"
                    class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium">
                    Ingredients list
                </a>
                <a href="{{ route(Auth::user()->role . '.ingredientType.index') }}"
                    class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium">
                    Ingredient type
                </a>
            </div>
        </div>
        <a href="{{ route(Auth::user()->role . '.category.index') }}"
            class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium">
            Category
        </a>
        <a href="{{ route(Auth::user()->role . '.course.index') }}"
            class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium">
            Course
        </a>
        <!-- User Dropdown -->
        <div x-data="{ open: false }" class="block">
            <button @click="open = !open"
                class="w-full text-left text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium flex justify-between items-center">
                {{ Auth::user()->full_name }}
                <svg :class="{ 'rotate-180': open }" class="h-5 w-5 transition-transform duration-200 ease-in-out"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2" class="mt-1 space-y-1 pl-4">
                <a href="{{ route(Auth::user()->role . '.profile.index') }}"
                    class="block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium">
                    Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left block text-white hover:bg-yellow-700 px-3 py-2 rounded-md text-base font-medium">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>