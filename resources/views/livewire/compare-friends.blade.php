<div
    x-cloak
    wire:poll
    x-data="{ open: false }"
    class="flex h-64 items-center border-l border-l-white/20 pl-5 text-center lg:pl-20"
>
    <div>
        @if ($comparingWith)
            <div class="group relative">
                <div class="flex gap-10">
                    <div class="text-center">
                        <div class="text-[48px]">
                            {{ $myStats["completed"] }}
                        </div>
                        <p>You</p>
                    </div>
                    <div class="text-center">
                        <div class="text-[48px]">
                            {{ $theirStats["completed"] }}
                        </div>
                        <p>{{ $comparingWith->username }}</p>
                    </div>
                </div>

                <button
                    wire:click="resetCompare()"
                    class="absolute bottom-[-50px] left-1/2 hidden w-full translate-x-[-50%] text-center text-brand underline delay-100 group-hover:block"
                >
                    Compare with
                    <br />
                    Someone else
                </button>
            </div>
        @else
            <div class="text-center text-[32px]">
                <i class="fa-sharp-duotone fa-solid fa-user-group"></i>
            </div>
            <p class="mb-3 text-[18px]">Compare with a friend</p>

            <button @click="open = true" class="border border-brand px-10 py-3 hover:bg-brand hover:bg-brand/20">
                Set friend
            </button>
        @endif
    </div>

    <div x-show="open" class="fixed left-0 top-0 z-[100] flex h-full w-full items-center justify-center bg-black/80">
        <div class="w-full border border-white/20 bg-black/90 text-left lg:w-1/2">
            <p class="px-3 pt-3 text-[24px] leading-relaxed">Compare with a friend</p>
            <p class="px-3 text-white/50">Compare your progress against your friends to see who's ahead.</p>

            <hr class="mt-3 border-t-white/20" />
            @if (auth()->user()->friends)
                @foreach (auth()->user()->friends as $friend)
                    <div class="">
                        <button
                            @click="open = false"
                            wire:click="compareWith({{ $friend->id }})"
                            class="block w-full p-3 py-5 text-left text-xl leading-none hover:bg-slate-900/50"
                        >
                            {{ $friend->username }}
                        </button>
                    </div>
                @endforeach
            @else
                <p class="text-white/50">You don't have any friends yet.</p>
            @endif
        </div>
    </div>
</div>
