<x-app-layout>
    <div class="relative">
        <div class="container mx-auto mt-10 px-3">
            <div class="grid lg:grid-cols-2">
                <div data-aos="fade-up" data-aos-duration="1000">
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


                    <div class="mt-10 flex">
                        <a
                            href="{{ route("register") }}"
                            class="border border-brand bg-brand/20 p-3 px-10 text-[22px] hover:bg-brand"
                        >
                            Sign up
                        </a>
                    </div>
                </div>
                <div class="grid gap-5 grid-cols-2">
                    @foreach($guns->shuffle()->take(6) as $gun)
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="{{ 750 + (50 * $loop->iteration) }}">
                            <livewire:gun-card :$gun :key="$gun->id"></livewire:gun-card>
                        </div>
                    @endforeach
                </div>
            </div>

            <hr class="my-20 border-t-white/20" />


            <div class="grid mb-20 lg:grid-cols-3 ga-5 lg:gap-20">
                <div>
                    <i class="fa-sharp mb-5 text-[32px] text-brand fa-money-bill"></i>
                    <p class="text-[24px] font-bold mb-3">
                        It's totally free
                    </p>
                    <p class="text-[20px]">No catch. Track your camos for free, without paying a cent.</p>
                </div>

                <div>
                    <i class="fa-solid mb-5 text-[32px] text-brand fa-popcorn"></i>
                    <p class="text-[24px] font-bold mb-3">
                        Track with your friends
                    </p>
                    <p class="text-[20px]">Add your friends and compare your tracked camo progress against theirs.</p>
                </div>

                <div>
                    <i class="fa-sharp mb-5 text-[32px] text-brand fa-solid fa-badge-check"></i>
                    <p class="text-[24px] font-bold mb-3">
                        Every camo included
                    </p>
                    <p class="text-[20px]">Both Multiplayer and Zombies camos are included in the tracker.</p>
                </div>

            </div>

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
    </div>
</x-app-layout>
