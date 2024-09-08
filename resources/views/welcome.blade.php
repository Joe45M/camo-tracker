<x-app-layout>
    <div class="container mx-auto mt-10 px-3">
        <div class="grid lg:grid-cols-2">
            <div>
                <div class="text-[36px] lg:text-[56px] font-bold pt-10 lg:pt-24">Track the <span class="text-brand">
                        camo grind <br class="hidden lg:block">
                    </span> in Black Ops 6</div>

                <p class="text-[22px] text-white/50 mt-10">Track your camo progression across <br> Multiplayer and Zombies in Black Ops 6.</p>
            </div>
            <div class="my-10 lg:my-0">
                <img src="{{ asset('images/mac.png') }}" class="objecr-cover" alt="Homepage of the website camo tracker">
            </div>

            <div class="flex mt-5">
                <a href="{{ route('register') }}" class="text-[22px] bg-brand/20 border border-brand p-3 px-10 hover:bg-brand">Sign up</a>
            </div>
        </div>

        <hr class="my-10 border-t-white/20">

        <h3 class="text-[32px] font-bold mb-5">Camo Tracker news</h3>

        <div class="grid lg:grid-cols-3 gap-5">
            @foreach($posts as $post)

                <a href="{{ route('post', $post->id) }}" class="h-[210px] hover:scale-105 duration-100 border border-white/20 flex flex-col justify-end p-5 bg-cover bg-center relative"
                style="background-image: url({{ $post->getFirstMediaUrl('thumbnail') }});">
                    <span class="text-[24px] relative z-10">{{ $post->title }}</span>


                    <div class="absolute left-0 top-0 w-full h-full bg-black/50"></div>
                </a>

            @endforeach
        </div>

    </div>
</x-app-layout>
