<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>RAM Studio Online Management System</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!--styles-->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans">
        <!--Navbar-->
        <nav  x-data="{ open: false }" class="max-w-7xl relative mx-auto">
            <!--flex container-->
            <div class="container mx-auto flex items-center justify-between p-2">
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
                    <a href="#aboutUs" class="hover:text-darkGrayishBlue" class="shrink-0">About Us</a>
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
                    <x-responsive-nav-link href="#aboutUs">
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
        <!-- alert messages -->
        @if (session('message'))
        <div x-data="{show : true}" x-show= "show" x-init="setTimeout(() => show = false, 3000)" class="container mx-auto max-w-4xl bg-teal-100 border-t border-b border-teal-500 text-teal-900 shadow-md rounded-md px-4 py-3" role="alert">
            <p>{{ session('message') }}</p>
        </div>
        @endif
        <!--Hero Section-->
        <section id="hero" class="max-w-7xl mx-auto">
            <div class="container mx-auto p-2 mb-8">
                @include('partials.hero')
            </div>
        </section>    
        <!--News Section-->
        <section id="news" class="max-w-6xl mx-auto md:pt-5">
            <div class="container flex flex-col px-4 mx-auto mb-20 space-y-10 md:space-y-0 md:flex-row md:mb-32">
                <!--headind or headline-->
                <div class="container flex flex-col space-y-10 md:w-1/2">
                    <h2 class="max-w-md text-xl font-bold text-center md:text-left md:text-4xl">
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
        <!-- Image Gallery -->
        <section id="gallery">
            <div class="max-w-6xl px-5 mx-auto mb-20 text-center md:mb-32">
                <!--heading-->
                <h2 class="text-xl font-bold text-center md:text-4xl">
                    Explore Beautiful Images In Our Gallery
                </h2>
                @include('partials.image_gallery')
            </div>
        </section>
        <!-- Video Gallery -->
        <section id="gallery">
            <div class="max-w-6xl px-5 mx-auto mb-20 text-center md:mb-32">
                <!--heading-->
                <h2 class="text-xl font-bold text-center md:text-4xl">
                    Watch Works Highlights In Our Gallery
                </h2>
                @include('partials.video_gallery')
            </div>
        </section>
        <!-- Phototgraphers Section -->
        <section id="team">
            <div class="max-w-6xl px-5 mx-auto mb-20 text-center md:mb-32">
                <!--heading-->
                <h2 class="text-xl font-bold text-center md:text-4xl">
                    Choose your best photographer from our team
                </h2>
                @include('partials.team')
            </div>
        </section>
        <!-- Packages -->
        <section id="packages">
            <div class="max-w-6xl px-5 mx-auto mb-20 text-center md:mb-32">
                <!--heading-->
                <h2 class="text-xl font-bold text-center md:text-4xl">
                    Select from our different packages
                </h2>
                @include('partials.package')
            </div>
        </section>
        <!-- About Us-->
        <section id="aboutUs">
            <div class="max-w-6xl px-5 mx-auto mb-20 text-center md:mb-32">
                <!--heading-->
                <h2 class="text-xl font-bold text-center md:text-4xl">
                    About RAM Studio
                </h2>
                @include('partials.about')
            </div>
        </section>
        <!--Testimonials-->
        <section id="testimonials">
            <!--Container to heading and testm blocks-->
            <div class="max-w-6xl px-5 mx-auto mt-32 text-center">
                <!--Heading-->
                <h2 class="text-xl font-bold text-center md:text-4xl">
                    What People Say About Us?
                </h2>
                @include('partials.testimonials')
            </div>
        </section>
        <!-- CTA section-->
        <section id="cta" class="bg-brightRed">
            <!-- Flex Container-->
            <div class="container max-w-6xl flex flex-col items-center justify-between mt-32 px-6 py-24 mx-auto space-y-12 md:py-12 md:flex-row md:space-y-0">
                <!-- Heading -->
                <h2 class="text-xl font-bold leading-tight text-center text-white md:text-4xl md:max-w-xl md:text-left md:text-4xl">
                    Make your occasions memorable as it is covered by talented photographers that we have. 
                </h2>
                <div class="flex justify-center md:justify-start">
                    <a href="{{route('create.booking')}}" class="font-bold p-3 px-6 pt-2 text-brightRed bg-white rounded-full baseline hover:bg-veryDarkBlue">Book Now</a>
                </div>   
            </div>
        </section>
        <!-- Footer -->
        <footer id="footer" class="bg-veryDarkBlue">
            <div class="container max-w-6xl flex flex-col-reverse justify-between px-6 py-10 mx-auto space-y-8 md:flex-row md:space-y-0">
                <!-- Logo and Social Links container-->
                <div class="flex flex-col-reverse items-center justify-between space-y-12 md:flex-col md:space-y-0 md:items-start">
                    <div class="mx-auto my-6 text-center text-white md:hidden">
                        <div>
                            @auth
                            <form action="{{ route('comment.store') }}" method="POST">
                                @csrf
                                <fieldset>
                                    <label for="comment" class="block text-white text-sm font-medium text-gray-700">Comments and Suggestions</label>
                                    <div class="mt-1">
                                    <textarea id="comment" name="comment" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 text-black focus:ring-indigo-500 sm:text-sm" placeholder="comments and suggestions  "></textarea>
                                    </div>
                                    <div class="px-4 py-3 text-right sm:px-2">
                                        <button type="submit" class="inline-flex justify-end rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Post</button>
                                    </div>
                                </fieldset>
                            </form> 
                            @endauth
                        </div>
                        <div class="text-xs mt-2 md:text-sm">
                            Copyright &copy; 2022, All Rights Reserved
                        </div>
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
                    <div class="lg:col-span-5 md:col-span-5 col-span-10 col-start-2">
                        <div class="flex flex-wrap">
                            <a href="https://www.facebook.com/RAMPHOTOANDFILM" class="hover:bg-gray-700 inline-flex items-center px-4 py-3 mb-2 mr-2 transition-colors duration-200 ease-in bg-gray-500 rounded-sm shadow">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <path d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 17.9895 4.3882 22.954 10.125 23.8542V15.4688H7.07812V12H10.125V9.35625C10.125 6.34875 11.9166 4.6875 14.6576 4.6875C15.9701 4.6875 17.3438 4.92188 17.3438 4.92188V7.875H15.8306C14.34 7.875 13.875 8.80008 13.875 9.75V12H17.2031L16.6711 15.4688H13.875V23.8542C19.6118 22.954 24 17.9895 24 12Z" fill="#1877F2"></path> <path d="M16.6711 15.4688L17.2031 12H13.875V9.75C13.875 8.80102 14.34 7.875 15.8306 7.875H17.3438V4.92188C17.3438 4.92188 15.9705 4.6875 14.6576 4.6875C11.9166 4.6875 10.125 6.34875 10.125 9.35625V12H7.07812V15.4688H10.125V23.8542C11.3674 24.0486 12.6326 24.0486 13.875 23.8542V15.4688H16.6711Z" fill="white"></path> </svg>
                            <p class="font-body ml-2 text-sm leading-none text-white capitalize">Facebook</p>
                            </a>
                            <a href="#" class="hover:bg-gray-700 inline-flex items-center px-4 py-3 mb-2 mr-2 transition-colors duration-200 ease-in bg-gray-500 rounded-sm shadow">
                            <svg class="h-6 w-6" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M27.0487 5.88631C26.0782 6.31336 25.0438 6.59637 23.9659 6.73353C25.0751 6.06962 25.9215 5.02597 26.3194 3.76837C25.2852 4.38667 24.1437 4.82346 22.9269 5.06704C21.9448 4.01846 20.5455 3.36926 19.0189 3.36926C16.0567 3.36926 13.6722 5.78016 13.6722 8.73553C13.6722 9.16078 13.7081 9.5694 13.7963 9.959C9.34819 9.74123 5.41244 7.60388 2.76846 4.34746C2.30674 5.15027 2.03603 6.06962 2.03603 7.05903C2.03603 8.91693 2.99017 10.564 4.41264 11.5172C3.55306 11.5011 2.70967 11.251 1.99529 10.857V10.9157C1.99529 13.5225 3.84996 15.6878 6.28164 16.1865C5.84611 16.3062 5.37164 16.3633 4.87896 16.3633C4.53673 16.3633 4.19067 16.3435 3.8661 16.2717C4.55953 18.3963 6.52648 19.9582 8.86541 20.0088C7.04508 21.4365 4.73382 22.2968 2.23187 22.2968C1.79322 22.2968 1.37235 22.2775 0.951416 22.2234C3.32135 23.7558 6.13016 24.6307 9.15919 24.6307C19.004 24.6307 24.3868 16.4533 24.3868 9.36526C24.3868 9.12802 24.3783 8.89894 24.3671 8.67176C25.429 7.91609 26.3212 6.97251 27.0487 5.88631Z" fill="#1DA1F2"></path> </svg>
                            <p class="font-body ml-2 text-sm leading-none text-white capitalize">Twitter</p>
                            </a>
                            <a href="#" class="hover:bg-gray-700 inline-flex items-center px-4 py-3 mb-2 mr-2 transition-colors duration-200 ease-in bg-gray-500 rounded-sm shadow">
                            <svg class="h-6 w-6" fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><g fill="#fff"><path d="m12 2.16094c3.2063 0 3.5859.01406 4.8469.07031 1.1719.05156 1.8047.24844 2.2265.4125.5579.21563.961.47813 1.3782.89531.4218.42188.6797.82032.8953 1.37813.164.42187.3609 1.05937.4125 2.22656.0562 1.26562.0703 1.64531.0703 4.84685 0 3.2063-.0141 3.586-.0703 4.8469-.0516 1.1719-.2485 1.8047-.4125 2.2266-.2156.5578-.4782.9609-.8953 1.3781-.4219.4219-.8203.6797-1.3782.8953-.4218.1641-1.0593.3609-2.2265.4125-1.2656.0562-1.6453.0703-4.8469.0703-3.20625 0-3.58594-.0141-4.84687-.0703-1.17188-.0516-1.80469-.2484-2.22657-.4125-.55781-.2156-.96093-.4781-1.37812-.8953-.42188-.4219-.67969-.8203-.89531-1.3781-.16407-.4219-.36094-1.0594-.4125-2.2266-.05625-1.2656-.07032-1.6453-.07032-4.8469 0-3.20622.01407-3.58591.07032-4.84685.05156-1.17188.24843-1.80469.4125-2.22656.21562-.55781.47812-.96094.89531-1.37813.42187-.42187.82031-.67968 1.37812-.89531.42188-.16406 1.05938-.36094 2.22657-.4125 1.26093-.05625 1.64062-.07031 4.84687-.07031zm0-2.16094c-3.25781 0-3.66562.0140625-4.94531.0703125-1.275.0562505-2.15156.2624995-2.91094.5578125-.79219.309375-1.4625.717185-2.12812 1.387495-.67032.66563-1.07813 1.33594-1.387505 2.12344-.295313.76407-.501562 1.63594-.5578125 2.91094-.05625 1.28437-.0703125 1.69219-.0703125 4.95 0 3.2578.0140625 3.6656.0703125 4.9453.0562505 1.275.2624995 2.1516.5578125 2.911.309375.7921.717185 1.4625 1.387505 2.1281.66562.6656 1.33593 1.0781 2.12343 1.3828.76407.2953 1.63594.5015 2.91094.5578 1.27969.0562 1.6875.0703 4.9453.0703s3.6656-.0141 4.9453-.0703c1.275-.0563 2.1516-.2625 2.911-.5578.7875-.3047 1.4578-.7172 2.1234-1.3828s1.0781-1.336 1.3828-2.1235c.2953-.764.5016-1.6359.5578-2.9109.0563-1.2797.0703-1.6875.0703-4.9453 0-3.25782-.014-3.66564-.0703-4.94532-.0562-1.275-.2625-2.15157-.5578-2.91094-.2953-.79688-.7031-1.46719-1.3734-2.13282-.6656-.66562-1.336-1.07812-2.1235-1.382808-.764-.295312-1.6359-.501562-2.9109-.557812-1.2844-.0609375-1.6922-.075-4.95-.075z"></path><path d="m12 5.83594c-3.40312 0-6.16406 2.76094-6.16406 6.16406 0 3.4031 2.76094 6.1641 6.16406 6.1641 3.4031 0 6.1641-2.761 6.1641-6.1641 0-3.40312-2.761-6.16406-6.1641-6.16406zm0 10.16246c-2.20781 0-3.99844-1.7906-3.99844-3.9984 0-2.20781 1.79063-3.99844 3.99844-3.99844 2.2078 0 3.9984 1.79063 3.9984 3.99844 0 2.2078-1.7906 3.9984-3.9984 3.9984z"></path><path d="m19.8469 5.59226c0 .79688-.6469 1.43907-1.4391 1.43907-.7969 0-1.439-.64688-1.439-1.43907 0-.79687.6468-1.43906 1.439-1.43906s1.4391.64687 1.4391 1.43906z"></path></g></svg>
                            <p class="font-body ml-2 text-sm leading-none text-white capitalize">Instagram</p>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- List Container -->
                <div class="flex justify-around space-x-18 md:space-x-24 md:pt-2 ">
                    <div class="hidden text-white text-sm md:block">
                        @auth
                        <form action="{{ route('comment.store')}}" method="POST">
                            @csrf
                            <fieldset>
                                <label for="comment" class="block text-white text-sm font-medium text-gray-700">Comments and Suggestions</label>
                                <div class="mt-1">
                                <textarea id="comment" name="comment" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 text-black focus:ring-indigo-500 sm:text-sm" placeholder="comments and suggestions  "></textarea>
                                </div>
                                <div class="px-4 py-3 text-right sm:px-2">
                                    <button type="submit" class="inline-flex justify-end rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Post</button>
                                </div>
                            </fieldset>
                        </form>
                        @endauth
                        <div class="text-xs mt-2 md:text-sm">
                            <p>Copyright &copy; 2022, All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-3 text-white text-sm">
                        <a href="/" class="hover:text-brightRed">Home</a>
                        <a href="#news" class="hover:text-brightRed">News</a>
                        <a href="#gallery" class="hover:text-brightRed">Gallery</a>
                        <a href="#packages" class="hover:text-brightRed">Packages</a>
                        <a href="#team" class="hover:text-brightRed">Our Team</a>
                    </div>
                    <div class="flex flex-col space-y-3 text-white text-sm">
                        <a href="#aboutUs" class="hover:text-brightRed">About Us</a>
                        <a href="#" class="hover:text-brightRed">Contact Us</a>
                        <a href="#" class="hover:text-brightRed">Help</a>
                        <a href="#" class="hover:text-brightRed">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
        var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
        });
        </script>
    </body>
</html>