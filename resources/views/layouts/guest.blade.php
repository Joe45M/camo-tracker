<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-cover" style="background-image: url({{ asset('images/bg.jpg') }})">
        <div class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
            <div>
                <a href="/" class="font-bold text-white">
                    <span class="block text-[26px] leading-none text-brand">CAMO</span>
                    <span class="leading-none">TRACKER</span>
                </a>
            </div>

            <div
                class="mt-6 w-full overflow-hidden border border-white/20 bg-black/10 px-6 py-4 text-white shadow-md sm:max-w-md sm:rounded-lg"
            >
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
