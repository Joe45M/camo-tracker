<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
        <script src="https://kit.fontawesome.com/901ce00d8f.js" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet" />

        <meta property="og:image" content="{{ asset("images/meta.jpg") }}" />

        @if (config("app.env") == "production")
            <!-- Fathom - beautiful, simple website analytics -->
            <script src="https://cdn.usefathom.com/script.js" data-site="AFRPOWRV" defer></script>
            <!-- / Fathom -->
        @endif
    </head>
    <body class="font-sans text-white antialiased">
        <div class="min-h-screen bg-cover" style="background-image: url({{ asset("images/bg.jpg") }})">
            {{-- @include('layouts.navigation') --}}
            <div class="border-b border-white/20 py-5 z-[100] relative backdrop-blur-lg">
                <div class="container mx-auto">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-5">
                            <a href="/{{ auth()->check() ? "dashboard" : "" }}" class="font-bold">
                                <span class="block text-[26px] leading-none">CAMO</span>
                                <span class="leading-none">TRACKER</span>
                            </a>

                            @if (auth()->check())
                                <a wire:navigate href="{{ route("dashboard") }}" class="flex items-center gap-2">
                                    Dashboard
                                </a>
                            @endif

                            @if (request()->routeIs("category"))
                                <a
                                    wire:navigate
                                    href="{{ route("dashboard") }}"
                                    class="flex items-center gap-2 lg:hidden"
                                >
                                    <i class="fa-solid fa-chevron-left text-sm"></i>
                                    Back to guns
                                </a>
                            @endif
                        </div>
                        @if (auth()->check())
                            <div
                                x-cloak
                                @click.outside="open = false"
                                x-data="{ open: false, tab: 'friends' }"
                                class="relative flex items-center gap-3"
                            >
                                <button
                                    class="relative"
                                    id="friends-tab"
                                    @click="open = true; tab = 'friends';"
                                    href="{{ route("profile.edit") }}"
                                >
                                    <i class="fa-sharp fa-solid fa-user-group relative z-50 text-xl"></i>
                                </button>

                                <div class="z-50 h-[10px] w-[1px] bg-white"></div>

                                <button @click="open = true; tab = 'profile';" href="{{ route("profile.edit") }}">
                                    <i class="fa-sharp fa-solid fa-gear relative z-50 text-xl"></i>
                                </button>

                                <div
                                    x-show="open"
                                    class="absolute right-[-20px] top-[-20px] w-screen border border-white/20 bg-black bg-black/90 p-3 pt-[70px] lg:w-[500px]"
                                >
                                    <div class="absolute left-5 top-5 z-50">
                                        {{ auth()->user()->username }}#{{ auth()->user()->identifier }}
                                    </div>
                                    <livewire:friends-menu></livewire:friends-menu>

                                    <div x-show="tab === 'profile'" class="grid gap-3">
                                        <a
                                            href="{{ route("profile.edit") }}"
                                            class="flex h-[150px] w-full items-center justify-center gap-3 border border-white/20 p-2 px-5 transition duration-100 hover:bg-white/10"
                                        >
                                            <i class="fa-solid fa-user-pen"></i>
                                            Edit Profile
                                        </a>

                                        <hr class="border-t-white/20" />

                                        <form method="post" action="{{ route("logout") }}">
                                            @csrf
                                            <button
                                                class="flex w-full items-center justify-center gap-3 border border-white/20 p-2 px-5 transition duration-100 hover:bg-white/10"
                                            >
                                                <i class="fa-solid fa-left-to-bracket"></i>
                                                Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (! auth()->check())
                            <a wire:navigate href="{{ route("login") }}" class="flex items-center gap-2">Sign in</a>
                        @endif
                    </div>
                </div>
            </div>
            <div id="context-menu"></div>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gray-950 shadow">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <livewire:notice></livewire:notice>
            @if (config("app.show_notice"))
            @endif

            <!-- Page Content -->
            <main class="px-3 lg:px-0">
                {{ $slot }}

                @if (auth()?->user()?->unreadNotifications?->count())
                    <livewire:user-notifications></livewire:user-notifications>
                @endif
            </main>

            <livewire:footer></livewire:footer>
        </div>

        @livewireChartsScripts
    </body>
</html>
