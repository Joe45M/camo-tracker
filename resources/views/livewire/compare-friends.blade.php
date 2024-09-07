<div wire:poll  x-data="{open: false}" class="text-center h-64 border-l border-l-white/20 pl-5 lg:pl-20 items-center flex">
    <div>
        @if($comparingWith)
            <div class="flex gap-10">
                <div class="text-center">
                    <div class="text-[48px]">
                        {{ $myStats['completed'] }}
                    </div>
                    <p>You</p>
                </div>
                <div class="text-center">
                    <div class="text-[48px]">
                        {{ $theirStats['completed'] }}
                    </div>
                    <p>{{ $comparingWith->username }}</p>
                </div>
            </div>
        @else
            <div class="text-center text-[32px]">
                <i class="fa-sharp-duotone fa-solid fa-user-group"></i>
            </div>
            <p class="text-[18px] mb-3">Compare with a friend</p>

            <button @click="open = true" class="hover:bg-brand/20 border border-brand py-3 px-10 hover:bg-brand">Set friend</button>
        @endif
    </div>

    <div x-show="open" class="fixed flex items-center justify-center left-0 w-full h-full top-0 z-[100] bg-black/80">
        <div class="w-full lg:w-1/2 border border-white/20 bg-black/90 text-left">
            <p class="text-[24px] leading-relaxed px-3 pt-3">Compare with a friend</p>
            <p class="text-white/50 px-3">
                Compare your progress against your friends to see who's ahead.
            </p>

            <hr class="border-t-white/20 mt-3">
            @if(auth()->user()->friends)
                @foreach(auth()->user()->friends as $friend)
                    <div class="">
                        <button @click="open = false" wire:click="compareWith({{ $friend->id }})" class="text-xl py-5 hover:bg-slate-900/50 block w-full text-left p-3 leading-none">{{ $friend->username}}</button>
                    </div>
                @endforeach
            @else
                <p class="text-white/50">
                    You don't have any friends yet.
                </p>
            @endif
        </div>
    </div>
</div>
