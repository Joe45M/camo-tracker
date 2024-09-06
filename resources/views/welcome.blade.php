<x-app-layout>
    <div class="container mx-auto mt-10 px-3 lg:px-0">
        <div class="grid lg:grid-cols-2">
            <div>
                <div class="text-[56px] font-bold pt-10 lg:pt-24">Track the <span class="text-brand">
                        camo grind <br class="hidden lg:block">
                    </span> in Black Ops 6</div>

                <hr class="border-t-white/20 my-10 w-1/2">
                <p class="text-[22px]">Track your camo progression across <br> Multiplayer and Zombies in Black Ops 6.</p>
            </div>
            <div class="my-10 lg:my-0">
                <img src="{{ asset('images/mac.png') }}" class="objecr-cover" alt="Homepage of the website camo tracker">
            </div>

            <div class="flex">
                <a href="{{ route('register') }}" class="text-[22px] bg-brand/20 border border-brand p-3 px-10">Sign up</a>

            </div>

        </div>
    </div>
</x-app-layout>
