<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <a href="{{ route('home')}}" class="self-center text-4xl text-gray-800 dark:text-gray-200">Dev<span class="font-black">Jobs</span></a>
                <!-- Navigation Links -->
                @auth
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-links.nav-link :href="route('vacants.index')" :active="request()->routeIs('vacants.index')">
                        {{ __('Dashboard') }}
                    </x-links.nav-link>
                    <x-links.nav-link :href="route('vacants.create')" :active="request()->routeIs('vacants.create')">
                        {{ __('Nueva Vacante') }}
                    </x-links.nav-link>
                </div>
                @endauth
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                @if(auth()->user()->rol === 1)
                    <a class="mr-2 px-3 py-1 rounded-full text-white bg-indigo-600 dark:bg-gray-700 dark:hover:bg-gray-600"
                    href="{{ route('notifications.index') }}">
                        {{ auth()->user()->unreadNotifications->count()}}
                    </a>
                @endif
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-links.dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-links.dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-links.dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-links.dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endauth

                @guest
                <x-links.dropdown-link class="whitespace-nowrap" :href="route('login')">
                    {{ __('Iniciar Sesión') }}
                </x-links.dropdown-link>

                <x-links.dropdown-link :href="route('register')">
                    {{ __('Registrarse') }}
                </x-links.dropdown-link>
                @endguest
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <!-- Notifications -->
                @if(auth()->user()->rol === 1)
                    <a class="mr-2 px-3 py-1 rounded-full text-white bg-indigo-600 dark:bg-gray-700 dark:hover:bg-gray-600"
                    href="{{ route('notifications.index') }}">
                        {{ auth()->user()->unreadNotifications->count()}}
                    </a>
                @endif

                <!-- Hamburger -->
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
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
        @auth
        <div class="pt-2 pb-3 space-y-1">
            <x-links.responsive-nav-link :href="route('vacants.index')" :active="request()->routeIs('vacants.index')">
                {{ __('Dashboard') }}
            </x-links.responsive-nav-link>
            <x-links.responsive-nav-link :href="route('vacants.create')" :active="request()->routeIs('vacants.create')">
                {{ __('Nueva Vacante') }}
            </x-links.responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            
            <div class="mt-3 space-y-1">
                <x-links.responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-links.responsive-nav-link>
                
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    
                    <x-links.responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-links.responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth

        @guest
        <div class="my-3 space-y-1">
            <x-links.responsive-nav-link :href="route('login')">
                {{ __('Iniciar Sesión') }}
            </x-links.responsive-nav-link>
            <x-links.responsive-nav-link :href="route('register')">
                {{ __('Registrarse') }}
            </x-links.responsive-nav-link>
        </div>
        @endguest
    </div>
</nav>
