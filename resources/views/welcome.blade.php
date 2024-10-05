<x-app-layout>
    <div class="container mx-auto mt-10 px-3">
        <div class="grid lg:grid-cols-2">
            <div>
                <div class="pt-10 text-[36px] lg:leading-[60px] font-bold lg:pt-24 lg:text-[56px]">
                    Track the
                    <span class="text-brand">
                        camo grind
                        <br class="hidden lg:block" />
                    </span>
                    in Black Ops 6
                </div>

                <p class="mt-10 text-[24px] text-white/50">
                    Track your camo progression across
                    <br />
                    Multiplayer and Zombies in Black Ops 6.
                </p>
            </div>
            <div class="my-10 lg:my-0">
                <img
                    src="{{ asset("images/mac.png") }}"
                    class="objecr-cover"
                    alt="Homepage of the website camo tracker"
                />
            </div>

            <div class="mt-5 flex">
                <a
                    href="{{ route("register") }}"
                    class="border border-brand bg-brand/20 p-3 px-10 text-[22px] hover:bg-brand"
                >
                    Sign up
                </a>
            </div>
        </div>

        <hr class="my-10 border-t-white/20" />

        <h3 class="mb-5 text-[32px] font-bold">Camo Tracker news</h3>

        <div class="grid gap-5 lg:grid-cols-3">
            @foreach ($posts as $post)
                <a
                    href="{{ route("post", $post->id) }}"
                    class="relative flex h-[210px] flex-col justify-end border border-white/20 bg-cover bg-center p-5 duration-100 hover:scale-105"
                    style="background-image: url({{ $post->getFirstMediaUrl("thumbnail") }})"
                >
                    <span class="relative z-10 text-[24px]">{{ $post->title }}</span>

                    <div class="absolute left-0 top-0 h-full w-full bg-black/50"></div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
