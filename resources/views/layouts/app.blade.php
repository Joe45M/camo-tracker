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
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <meta property="og:image" content="{{ asset("images/meta.jpg") }}" />

        @if (config("app.env") == "production")
            <!-- Fathom - beautiful, simple website analytics -->
            <script src="https://cdn.usefathom.com/script.js" data-site="AFRPOWRV" defer></script>
            <!-- / Fathom -->
        @endif
    </head>
    <body class="font-sans text-white antialiased">
        <div class="min-h-screen bg-cover" style="background-image: url({{ asset("images/header.jpg") }})">
            {{-- @include('layouts.navigation') --}}
            <div class="border-b border-white/20 py-5 z-[100] relative backdrop-blur-lg">
                <div class="container mx-auto">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-5">
                            <a href="/{{ auth()->check() ? "dashboard" : "" }}" class="font-bold">
                                <span class="block text-[26px] text-brand leading-none">CAMO</span>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                    </svg>

                                </button>

                                <div class="z-50 h-[10px] w-[1px] bg-white"></div>

                                <button @click="open = true; tab = 'profile';" href="{{ route("profile.edit") }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

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
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

    </body>
</html>
