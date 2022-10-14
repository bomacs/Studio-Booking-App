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
        @role('administrator'))
            @include('layouts.navigationAdmin')
        @endrole
        @role('photographer')
            @include('layouts.navigationPhotographer')
        @endrole
        @role('user')
            @include('layouts.navigationUser')
        @endrole
        <!-- Page Heading -->
        <div class="container mx-auto">
        @if (isset($header))
            <header class="bg-white">
                <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        </div>
    </body>
</html>