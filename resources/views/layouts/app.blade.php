<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/901ce00d8f.js" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">

        <meta property="og:image" content="{{ asset('images/meta.jpg') }}" />

        @if(config('app.env') == 'production')
            <!-- Fathom - beautiful, simple website analytics -->
            <script src="https://cdn.usefathom.com/script.js" data-site="AFRPOWRV" defer></script>
            <!-- / Fathom -->
        @endif


    </head>
    <body class="font-sans antialiased text-white">
        <div class="min-h-screen bg-cover" style="background-image: url({{ asset('images/bg.jpg') }});">
{{--            @include('layouts.navigation')--}}
            <div class="border-b border-white/20 py-5">
                <div class="container mx-auto">
                    <div class="flex items-center justify-between">
                        <div class="flex gap-5 items-center">
                            <a href="/" class="font-bold">
                                <span class="block leading-none text-[26px]">CAMO</span>
                                <span class="leading-none">TRACKER</span>
                            </a>

                            @if(!auth()->check())

                                <a wire:navigate href="{{ route('login') }}" class="gap-2 items-center flex">
                                    Sign in
                                </a>

                            @endif

                            @if(auth()->check())

                                <a wire:navigate href="{{ route('dashboard') }}" class="gap-2 items-center flex">
                                    Dashboard
                                </a>

                            @endif

                            @if(request()->routeIs('category'))

                                <a wire:navigate href="{{ route('dashboard') }}" class="gap-2 items-center flex">
                                    <i class="fa-solid text-sm fa-chevron-left"></i>
                                    Back to guns
                                </a>

                            @endif

                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('profile.edit') }}">
                                <i class="fa-sharp text-xl fa-solid fa-user"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gray-950 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <livewire:notice></livewire:notice>
            @if(config('app.show_notice'))
            @endif

            <!-- Page Content -->
            <main class="px-3 lg:px-0">
                {{ $slot }}
            </main>

            <livewire:footer></livewire:footer>
        </div>


        @livewireChartsScripts
    </body>
</html>
