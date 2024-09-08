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
            <div class="border-b backdrop-blur-lg border-white/20 py-5">
                <div class="container mx-auto">
                    <div class="flex items-center justify-between">
                        <div class="flex gap-5 items-center">
                            <a href="/{{ auth()->check() ? 'dashboard' : '' }}" class="font-bold">
                                <span class="block leading-none text-[26px]">CAMO</span>
                                <span class="leading-none">TRACKER</span>
                            </a>



                            @if(auth()->check())

                                <a wire:navigate href="{{ route('dashboard') }}" class="gap-2 items-center flex">
                                    Dashboard
                                </a>

                            @endif

                            @if(request()->routeIs('category'))

                                <a wire:navigate href="{{ route('dashboard') }}" class="gap-2 items-center flex lg:hidden">
                                    <i class="fa-solid text-sm fa-chevron-left"></i>
                                    Back to guns
                                </a>

                            @endif

                        </div>
                        @if(auth()->check())
                            <div x-cloak @click.outside="open = false" x-data="{open: false, tab: 'friends'}" class="flex relative items-center gap-3">
                                <button class="relative" id="friends-tab" @click="open = true; tab = 'friends';" href="{{ route('profile.edit') }}">
                                    <i class="fa-sharp text-xl fa-solid fa-user-group relative z-50"></i>
                                </button>

                                <div class="h-[10px] w-[1px] bg-white z-50"></div>

                                <button @click="open = true; tab = 'profile';" href="{{ route('profile.edit') }}">
                                    <i class="fa-sharp text-xl fa-solid fa-gear relative z-50"></i>
                                </button>



                                <div x-show="open" class="absolute bg-black/90 w-screen lg:w-[500px] border border-white/20 pt-[70px] top-[-20px] right-[-20px] z-10 bg-black p-3">
                                    <div class="absolute left-5 top-5 z-50">
                                        {{ auth()->user()->username }}#{{ auth()->user()->identifier }}
                                    </div>
                                    <livewire:friends-menu></livewire:friends-menu>

                                    <div x-show="tab === 'profile'" class="grid gap-3">

                                        <a href="{{ route('profile.edit') }}" class="h-[150px] hover:bg-white/10 transition duration-100 px-5 flex gap-3 items-center justify-center w-full p-2 border border-white/20">
                                            <i class="fa-solid fa-user-pen"></i>
                                            Edit Profile
                                        </a>

                                        <hr class="border-t-white/20">

                                        <form method="post" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="hover:bg-white/10 transition duration-100 px-5 flex gap-3 items-center justify-center w-full p-2 border border-white/20">
                                                <i class="fa-solid fa-left-to-bracket"></i>
                                                Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        @endif

                        @if(!auth()->check())

                            <a wire:navigate href="{{ route('login') }}" class="gap-2 items-center flex">
                                Sign in
                            </a>

                        @endif
                    </div>
                </div>
            </div>
            <div id="context-menu">

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
