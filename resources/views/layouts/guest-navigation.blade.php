<nav x-data="{ open: false }" class="bg-slate-500 text-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="hidden sm:flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="w-auto">
                        <x-application-logo class="inline h-10 w-auto fill-current text-gray-600" />
                        <div class="ml-2 inline text-lg">Laravel Blog</div>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                @auth
                    <x-nav-link :href="route('dashboard')">
                        Dashboard
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        Login
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        Register
                    </x-nav-link>
                @endauth
            </div>

            <div class="flex sm:hidden">
                <!-- Icon -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-icon class="w-10 h-10" />
                    </a>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                Login
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                Register
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
