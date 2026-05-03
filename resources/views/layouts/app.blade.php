<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col min-h-screen bg-[#fffaed]">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="shadow">
                     <div class="max-w-7xl mx-auto py-6 px-4">
                    {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-1">
                {{ $slot }}
            </main>

            <!-- FOOTER GLOBAL -->
            <footer class="bg-[#fe914d] text-white py-6 mt-10">
                <div class="max-w-7xl mx-auto px-4 text-center space-y-1">
                    <h2 class="font-semibold text-lg">Kontak</h2>
                    <a href="https://wa.me/628986391413" target="_blank"
                        class="block hover:underline hover:text-[#fff2cc]">
                        Admin 1: (+62) 898-6391-413
                    </a>

                    <a href="https://wa.me/6289686642481" target="_blank"
                        class="block hover:underline hover:text-[#fff2cc]">
                        Admin 2: (+62) 896-8664-2481
                    </a>
                    <p>Pontianak, Kalimantan Barat</p>
                </div>
            </footer>
        </div>
    </body>
</html>
