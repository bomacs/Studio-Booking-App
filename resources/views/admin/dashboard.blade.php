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
    <body class="font-sans antialiased">
        <div x-data="{ open: false }" class="relative min-h-screen md:flex">
            <!-- mobile menu -->
            <div class="bg-gray-800 text-gray-100 flex justify-between items-center md:hidden">
                <!-- logo -->
                <div class="p-4">
                    <x-application-logo />
                </div>
                <!-- mobile menu button -->
                <button @click="open = ! open" class="inline-flex items-center justify-center p-4 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- sidebar -->
            <div :class="{'block': open, '-translate-x-full': ! open}" class="w-60 shadow-md bg-red-100 space-y-6 py-7 px-2 absolute inset-y-0 left-0 -translate-x-full transition duration-200 ease-in-out md:relative md:translate-x-0">
                <div class="w-full px-8  ">
                    <x-application-logo></x-application-logo>
                </div>
                <nav>
                    <ul class="relative px-2">
                        <li class="relative">
                            <a href="{{route('home')}}" class="flex items-center text-sm py-4 px-8 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"  data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <span>Home</span>
                            </a>
                        </li>
                        <li class="relative">
                            <a href="{{route('admin.dashboard')}}" class="flex items-center text-sm py-4 px-8 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <span>DashBoard</span>
                            </a>
                        </li>
                        <li class="relative">
                            <a href="{{ route('tables') }}" class="flex items-center text-sm py-4 px-8 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <span>Tables</span>
                            </a>
                        </li>
                        <li class="relative">
                            <p class="uppercase font-bold text-eryDarkBlue flex items-center text-sm pt-4 px-8 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap" data-mdb-ripple="true" data-mdb-ripple-color="dark">Account</p>
                        </li>
                        <li class="relative">
                            <p class="flex items-center text-xs py-2 px-8 h-8 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            Username: {{ Auth::user()->username }}
                            </p>
                        </li>
                        <li class="relative">
                            <p class="flex items-center text-xs py-2 px-8 h-8 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            Email: {{ Auth::user()->email }}
                            </p>
                        </li>
                        <li class="relative">
                            <form method="POST" action="{{ route('logout') }}" class="flex items-center text-xs font-semibold py-2 px-4 h-8 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- content-->
            <div class="flex-1 text-2xl font-bold">
                <!-- Page Heading -->
                <header class="bg-red-500 shadow text-2xl text-white">
                    <div class="py-6 px-4 sm:px-6 lg:px-14">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Admin Dashboard') }}
                        </h2>
                    </div>
                </header>
                <!-- Page Content -->
                <main class="py-4">
                      <!-- alert messages -->
                      @if (session('message'))
                      <div x-data="{show : true}" x-show= "show" x-init="setTimeout(() => show = false, 3000)" class="container mx-auto max-w-4xl bg-teal-100 border-t border-b border-teal-500 text-teal-900 shadow-md rounded-md px-4 py-3" role="alert">
                          <p>{{ session('message') }}</p>
                      </div>
                      @endif
                    <div class="items-center justify-between  px-6 my-6 md:flex  md:space-x-8">
                        <div class="flex flex-col bg-gray-50 p-8 border border-2 border-slate-200 shadow-lg my-3 md:w-1/3 ">
                            <div class="w-full text-sm font-semibold text-center mb-2">
                               TOTAL CLIENTS
                            </div>
                            <div class="w-full text-md font-semibold text-center">
                                {{count($clients)}}
                            </div>
                        </div>
                        <div class="flex flex-col bg-gray-50 p-8 border border-2 border-slate-200 shadow-lg  my-3 md:w-1/3">
                            <div class="w-full text-sm font-semibold text-center mb-2">
                                PHOTOGRAPHERS
                            </div>
                            <div class="w-full text-md font-semibold text-center">
                                {{count($photographers)}}
                            </div>
                        </div>
                        <div class="flex flex-col bg-gray-50 p-8 border border-2 border-slate-200 shadow-lg my-3 md:w-1/3">
                            <div class="w-full text-sm font-semibold text-center mb-2">
                                PACKAGES
                            </div>
                            <div class="w-full text-md font-semibold text-center">
                                {{count($packages)}}
                            </div>
                        </div>
                    </div>
                    <div class="items-center justify-between px-6 my-6 md:flex md:space-x-8">
                        <div class="flex flex-col bg-gray-50 p-8 border border-2 border-slate-200 shadow-lg my-3 md:w-1/3">
                            <div class="w-full text-sm font-semibold text-center mb-2">
                               ONGOING BOOKINGS
                            </div>
                            <div class="w-full text-md font-semibold text-center">
                                {{count($ongoing_bookings)}}
                            </div>
                        </div>
                        <div class="flex flex-col bg-gray-50 p-8 border border-2 border-slate-200 shadow-lg my-3 md:w-1/3">
                            <div class="w-full text-sm font-semibold text-center mb-2">
                               PENDING BOOKINGS
                            </div>
                            <div class="w-full text-md font-semibold text-center">
                                {{count($pending_bookings)}}
                            </div>
                        </div>
                        <div class="flex flex-col bg-gray-50 p-8 border border-2 border-slate-200 shadow-lg my-3 md:w-1/3">
                            <div class="w-full text-sm font-semibold text-center mb-2">
                               CANCELLED BOOKINGS
                            </div>
                            <div class="w-full text-md font-semibold text-center">
                                {{count($cancelled_bookings)}}
                            </div>
                        </div>
                    </div>
                    <div class="block items-center justify-between px-6 my-6 md:flex md:space-x-8">
                        <div class="flex flex-col bg-gray-50 p-8 border border-2 border-slate-200 shadow-lg my-3 md:w-1/3">
                            <div class="w-full text-sm font-semibold text-center mb-2">
                               THIS MONTH BOOKINGS
                            </div>
                            <div class="w-full text-md font-semibold text-center">
                                {{count($new_bookings)}}
                            </div>
                        </div>
                        <div class="flex flex-col bg-gray-50 p-8 border border-2 border-slate-200 shadow-lg my-3 md:w-1/3">
                            <div class="w-full text-sm font-semibold text-center mb-2">
                                TOP PHOTOGRAPHER
                            </div>
                            <div class="w-full text-md font-semibold text-center text-ellipsis overflow-hidden">
                                {{ $top_photographer->userProfile->firstname . ' ' .  $top_photographer->userProfile->lastname }}
                            </div>
                        </div>
                        <div class="flex flex-col bg-gray-50 p-8 border border-2 border-slate-200 shadow-lg my-3 md:w-1/3">
                            <div class="w-full text-sm font-semibold text-center mb-2">
                                TOP PACKAGE
                            </div>
                            <div class="w-full text-md font-semibold text-center text-ellipsis overflow-hidden">
                                {{ $top_package->name}}
                            </div>
                        </div>
                    </div>    
                </main>
            </div>      
        </div>
    </body>
</html>
