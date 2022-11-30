<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>RAM Studio |  Online Booking Site</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans">
        <!--Navbar-->
        <nav  x-data="{ open: false }" class="relative container mx-auto p-6 mb-20">
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
                    <a href="#news" class="hover:text-darkGrayishBlue">News</a>
                    <a href="#gallery" class="hover:text-darkGrayishBlue">Gallery</a>
                    <a href="#team" class="hover:text-darkGrayishBlue">Team</a>
                    <a href="#packages" class="hover:text-darkGrayishBlue">Packages</a>
                    <a href="#testimonials" class="hover:text-darkGrayishBlue" class="shrink-0">About Us</a>
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
                                @role('administrator')
                                <x-dropdown-link :href="route('admin.dashboard')">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>
                                @endrole
                                @role('photographer')
                                <x-dropdown-link :href="route('photographer.dashboard')">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>
                                @endrole
                                @role('user')
                                <x-dropdown-link :href="route('user.dashboard')">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>
                                @endrole
                                <!-- Logout -->
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
                    <x-responsive-nav-link href="#news">
                        {{ __('News') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#gallery">
                        {{ __('Gallery') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#packages">
                        {{ __('Packages') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#team">
                        {{ __('Team') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="#testimonials">
                        {{ __('About Us') }}
                    </x-responsive-nav-link>
                </div>
                <!-- Responsive Settings Options -->
                @if (Route::has('login'))
                <div class="pt-4 pb-1 border-t border-gray-200">
                    @auth
                    <div class="px-4">
                        <x-responsive-nav-link >
                            {{ Auth::user()->username }}
                        </x-responsive-nav-link>
                        @role('administrator')
                        <x-responsive-nav-link :href="route('admin.dashboard')">
                            {{ __('Dashboard')}}
                        </x-responsive-nav-link>
                        @endrole
                        @role('photographer')
                        <x-responsive-nav-link :href="route('photographer.dashboard')">
                            {{ __('Dashboard')}}
                        </x-responsive-nav-link>
                        @endrole
                        @role('user')
                        <x-responsive-nav-link :href="route('user.dashboard')">
                            {{ __('Dashboard')}}
                        </x-responsive-nav-link>
                        @endrole
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
        @if (session('message'))
        <p class="bg-green-400 text-veryDarkBlue text-md">{{ session('message') }}</p>
        @endif
        <!--Hero Section-->
        <section id="hero" class="max-w-6xl mx-auto md:pt-5">
            <div class="container flex flex-col-reverse mb-20 md:mb-32 md:flex-row md:items-center items-center px-6 mx-auto space-y-0 md:space-y-0">
                <!--Left Items-->
                <div class="flex flex-col mb-24 space-y-10 md:w-1/2">
                    <h1 class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left">
                        Making your special occasion memorably wonderful.
                    </h1>
                    <p class="max-w-sm text-center text-darkGrayishBlue md:text-left">
                        Hurry!, sign-up now and book the photographer you want for your special events.
                    </p>
                    <div class="flex justify-center md:justify-start">
                        <a href="{{route('create.booking')}}" class="font-bold p-3 px-6 pt-2 text-white bg-brightRed rounded-full baseline hover:bg-brightRedLight hover:text-veryDarkBlue">Book Now</a>
                    </div>  
                </div>
                <div class="flex justify-center md:w-1/2">
                    <img src="imgs/image001.png" alt="">
                </div>
            </div>
        </section>      
        <!--News Section-->
        <section id="news" class="max-w-6xl mx-auto md:pt-5">
            <div class="container flex flex-col px-4 mx-auto mb-20 space-y-10 md:space-y-0 md:flex-row md:mb-32">
                <!--headind or headline-->
                <div class="container flex flex-col space-y-10 md:w-1/2">
                    <h2 class="max-w-md text-4xl font-bold text-center md:text-left">
                        Hurray!, here our latest events and promos.
                    </h2>
                    <p class="max-w-sm text-center text-darkGrayishBlue md:text-left">
                        Want to save time and money. Try to check our promos and latest happenings for more exciting ideas.
                    </p>
                </div> 
                <!--List of Headlines-->
                <div class="flex flex-col space-y-8 md:w-1/2">
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <!--heading-->
                        <div class="rounded-l-full bg-brightRedSupLight md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <div class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed">
                                    01
                                </div>
                                <h3 class="text-base font-bold md:mb-4 md:hidden">
                                    Latest offers on selected packages
                                </h3>
                            </div>
                        </div>
                        <div >
                            <h3 class="hidden mb-4 text-lg font-bold md:block">
                                Latest offers on selected packages
                            </h3>
                            <p class="text-darkGrayishBlue">
                                See our latest offers in different packages that would help you decide easily to make us cover your special day.
                            </p>
                    </div>

                    </div>
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <!--heading-->
                        <div class="rounded-l-full bg-brightRedSupLight md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <div class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed">
                                    02
                                </div>
                                <h3 class="text-base font-bold md:mb-4 md:hidden">
                                    Latest offers on selected packages
                                </h3>
                            </div>
                        </div>
                        <div >
                            <h3 class="hidden mb-4 text-lg font-bold md:block">
                                Latest offers on selected packages
                            </h3>
                            <p class="text-darkGrayishBlue">
                                See our latest offers in different packages that would help you decide easily to make us cover your special day.
                            </p>
                    </div>
                    </div>
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <!--heading-->
                        <div class="rounded-l-full bg-brightRedSupLight md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                <div class="px-4 py-2 text-white rounded-full md:py-1 bg-brightRed">
                                    03
                                </div>
                                <h3 class="text-base font-bold md:mb-4 md:hidden">
                                    Latest offers on selected packages
                                </h3>
                            </div>
                        </div>
                        <div >
                            <h3 class="hidden mb-4 text-lg font-bold md:block">
                                Latest offers on selected packages
                            </h3>
                            <p class="text-darkGrayishBlue">
                                See our latest offers in different packages that would help you decide easily to make us cover your special day.
                            </p>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery -->
        <section id="gallery">
            <div class="max-w-6xl px-5 mx-auto mb-20 text-center md:mb-32">
                <!--heading-->
                <h2 class="text-4xl font-bold text-center">
                    Explore the beauty of our works 
                </h2>
                @include('partials.gallery')
            </div>
        </section>
        <!-- Phototgraphers Section -->
        <section id="team">
            <div class="max-w-6xl px-5 mx-auto mb-20 text-center md:mb-32">
                <!--heading-->
                <h2 class="text-4xl font-bold text-center">
                    Choose your best photographer from our team
                </h2>
                @include('partials.team')
            </div>
        </section>
        <!-- Packages -->
        <section id="packages">
            <div class="max-w-6xl px-5 mx-auto mb-20 text-center md:mb-32">
                <!--heading-->
                <h2 class="text-4xl font-bold text-center">
                    Select from our different packages
                </h2>
                @include('partials.package')
            </div>
        </section>
        <!--Testimonials-->
        <section id="testimonials">
            <!--Container to heading and testm blocks-->
            <div class="max-w-6xl px-5 mx-auto mt-32 text-center">
                <!--Heading-->
                <h2 class="text-4xl font-bold text-center">
                    What Customers Says About Us?
                </h2>
                <!--Testimonial Container-->
                <div class="flex flex-col mt-24 space-y-8 md:flex-row md:space-y-0 md:space-x-6">
                    <!--testimonial 1-->
                    <div class="flex flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:w-1/3">
                        <img src="imgs/avatars/avatarBoy01.png" class="w-16 -mt-14" alt="">
                        <h5 class="texgt-lg font-bold">Lorem Ipsum Lorem</h5>
                        <p class="text-sm text-darkGrayishBlue">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla molestiae facilis accusantium soluta nobis nihil exercitationem, explicabo ducimus quidem incidunt animi voluptatibus. Tenetur dolor dolorum quod quaerat dolorem nihil laboriosam.
                        </p>
                    </div>
                    <!--testimonial 2-->
                    <div class="flex flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:w-1/3">
                        <img src="imgs/avatars/avatarBoy02.png" class="w-16 -mt-14" alt="">
                        <h5 class="texgt-lg font-bold">Lorem Ipsum Lorem</h5>
                        <p class="text-sm text-darkGrayishBlue">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla molestiae facilis accusantium soluta nobis nihil exercitationem, explicabo ducimus quidem incidunt animi voluptatibus. Tenetur dolor dolorum quod quaerat dolorem nihil laboriosam.
                        </p>
                    </div>
                    <!--testimonial 3-->
                    <div class="flex flex-col items-center p-6 space-y-6 rounded-lg bg-veryLightGray md:w-1/3">
                        <img src="imgs/avatars/avatarGirl01.png" class="w-16 -mt-14" alt="">
                        <h5 class="texgt-lg font-bold">Lorem Ipsum Lorem</h5>
                        <p class="text-sm text-darkGrayishBlue">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla molestiae facilis accusantium soluta nobis nihil exercitationem, explicabo ducimus quidem incidunt animi voluptatibus. Tenetur dolor dolorum quod quaerat dolorem nihil laboriosam.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA section-->
        <section id="cta" class="bg-brightRed">
            <!-- Flex Container-->
            <div class="container flex flex-col items-center justify-between mt-32 px-6 py-24 mx-auto space-y-12 md:py-12 md:flex-row md:space-y-0">
                <!-- Heading -->
                <h2 class="text-4xl font-bold leading-tight text-center text-white md:text-4xl md:max-w-xl md:text-left">
                    Make your occasions memorable as it is covered by talented photographers that we have. 
                </h2>
                <div class="flex justify-center md:justify-start">
                    <a href="{{route('create.booking')}}" class="font-bold p-3 px-6 pt-2 text-brightRed bg-white rounded-full baseline hover:bg-veryDarkBlue">Book Now</a>
                </div>   
            </div>
        </section>
        <!-- Footer -->
        <footer id="footer" class="bg-veryDarkBlue">
            <div class="container flex flex-col-reverse justify-between px-6 py-10 mx-auto space-y-8 md:flex-row md:space-y-0">
                <!-- Logo and Social Links container-->
                <div class="flex flex-col-reverse items-center justify-between space-y-12 md:flex-col md:space-y-0 md:items-start">
                    <div class="mx-auto my-6 text-center text-white md:hidden">
                        Copyright &copy; 2022, All Rights Reserved
                    </div>
                    <!-- logo -->
                    <div class="mr-2 md:mt-0">
                        <a href="/" class="flex flex-row">
                            <span class="text-xl md:text-2xl font-bold bg-white text-brightRed hover:bg-brightRedLight py-3 pl-2 pr-0">
                                RAM
                            </span>
                            <span class="text-xl font-bold bg-brightRed text-white hover:bg-brightRedLight py-3 px-2 md:text-xl">
                                Studio
                            </span>
                        </a>
                    </div>
                    <!-- Social Links Container-->
                    <div class="flex justify-center space-x-4">
                        <!-- Link 1-->
                        <a href="#">
                            <img src="imgs/socmed/facebook_icon.svg" alt="facebook icon" class="h-8">
                        </a>
                        <!-- Link 2-->
                        <a href="#">
                            <img src="imgs/socmed/instagram_icon.svg" alt="facebook icon" class="h-8">
                        </a>
                        <!-- Link 3-->
                        <a href="#">
                            <img src="imgs/socmed/youtube_icon.svg" alt="facebook icon" class="h-8">
                        </a>
                        <!-- Link 4-->
                        <a href="#">
                            <img src="imgs/socmed/twitter_ icon.svg" alt="facebook icon" class="h-8">
                        </a>
                    </div>
                </div>
                <!-- List Container -->
                <div class="flex justify-around space-x-18 md:space-x-24 md:pt-2 ">
                    <div class="hidden text-white text-sm md:block">
                        Copyright &copy; 2022, All Rights Reserved
                    </div>
                    <div class="flex flex-col space-y-3 text-white text-sm">
                        <a href="/" class="hover:text-brightRed">Home</a>
                        <a href="#news" class="hover:text-brightRed">News</a>
                        <a href="#gallery" class="hover:text-brightRed">Gallery</a>
                        <a href="#packages" class="hover:text-brightRed">Packages</a>
                        <a href="#team" class="hover:text-brightRed">Our Team</a>
                    </div>
                    <div class="flex flex-col space-y-3 text-white text-sm">
                        <a href="#testimonials" class="hover:text-brightRed">About Us</a>
                        <a href="#" class="hover:text-brightRed">Contact Us</a>
                        <a href="#" class="hover:text-brightRed">Help</a>
                        <a href="#" class="hover:text-brightRed">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>