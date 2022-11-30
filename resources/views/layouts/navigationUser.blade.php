<!--Navbar-->
<nav  x-data="{ open: false }" class="relative container mx-auto p-6 ">
    <!--flex container-->
    <div class="flex items-center justify-between">
        <!--logo-->
        <div class="mr-2">
            <a href="/" class="flex flex-row">
                <span class="text-xl md:text-2xl font-bold bg-brightRed text-white hover:bg-brightRedLight py-3 px-2 pr-0">
                    RAM
                </span>
                <span class="text-xl font-bold bg-veryDarkBlue text-white hover:bg-darkGrayishBlue py-3 pr-2 md:text-2xl">
                    Studio
                </span>
            </a>
        </div>
        <!--menu items-->
        <div class="hidden md:flex space-x-6">
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav-link>
            <x-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('user.profile')" :active="request()->routeIs('user.profile')">
                {{ __('Profile') }}
            </x-nav-link>
            <x-nav-link href="{{route('create.booking')}}" :active="request()->routeIs('create.booking')">
                {{ __('Book Now') }}
            </x-nav-link>
            <x-nav-link href="{{route('my_bookings')}}" :active="request()->routeIs('my_bookings')">
                {{ __('My Bookings') }}
            </x-nav-link>
        </div>
        <!-- side dropdown menu -->
        @if (Route::has('login'))
            <div class="hidden items-center space-x-4 sm:block md:flex">
                @auth
                    <x-dropdown align="right" width="48">  
                    <x-slot name="trigger">
                        <button class="flex justify-between items-center text-md font-medium p-2 px-8 text-white bg-brightRed rounded-md baseline hover:bg-brightRedLight focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            @auth
                            <div>{{ Auth::user()->username }}</div>
                        
                            <div class="ml-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            @endauth
                        </button>  
                    </x-slot>
                    <x-slot name="content">
                        <!-- Authentication -->
                        <x-dropdown-link href="{{ route('createUserProfile') }}">
                            {{ __('Edit Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
        @else
                    <a href="{{ route('login') }}" class="hidden font-bold text-veryDarkBlue p-3 hover:text-white hover:rounded-md baseline hover:bg-veryDarkBlue md:block ">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hidden md:block p-3 font-bold text-white bg-brightRed rounded-md baseline hover:bg-brightRedLight hover:text-veryDarkBlue ">Register</a> 
                    @endif
                @endauth
            </div>
        @endif
        <!-- Hamburger Menu-->
        <div class="-mr-2 flex items-center md:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="text-darkBlue h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <div x-show="open" class="md:hidden block">
        <div class="flex flex-col pt-2 pb-3 space-y-4">
            <x-responsive-nav-link href="{{route('home')}}">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{route('user.dashboard')}}">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{route('user.profile')}}">
                {{ __('Profile') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{route('create.booking')}}">
                {{ __('Book Now') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{route('my_bookings')}}">
                {{ __('My Bookings') }}
            </x-responsive-nav-link>
        </div>
        <!-- Responsive Settings Options -->
        @if (Route::has('login'))
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
            <div class="px-4">
                <x-responsive-nav-link>
                    {{ Auth::user()->username }}</div>
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('createUserProfile') }}">
                    {{ __('Edit Profile') }}</div>
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        @else
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Log in') }}
                </x-responsive-nav-link>
                @if (Route::has('register'))
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
                @endif
            </div>
            @endauth
        </div>
        @endif
    </div>
</nav>  