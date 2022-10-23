{{-- <x-adminPanel-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-adminPanel-layout> --}}
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
                    Photo Booth
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
                <div class="w-full">
                    <x-application-logo></x-application-logo>
                </div>
                <nav>
                    <ul class="relative">
                        <li class="relative">
                            <a href="{{route('home')}}" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"  data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <span>Home</span>
                            </a>
                        </li>
                        <li class="relative">
                            <a href="{{route('admin.dashboard')}}" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <span>DashBoard</span>
                            </a>
                        </li>
                        <li class="relative">
                            <a href="#" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <span>Help</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- content-->
            <div class="flex-1 text-2xl font-bold">
                <!-- Page Heading -->
                <header class="shadow text-2xl text-white">
                    <div class="bg-red-500 py-6 px-4 sm:px-6 lg:px-14">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Admin Dashboard') }}
                        </h2>
                    </div>
                </header>

                <!-- Page Content -->
                <main>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
                                    You're logged in!
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>      
        </div>
    </body>
</html>
