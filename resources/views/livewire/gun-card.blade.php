<div x-data="{open: false}" class="block border border-white/20 bg-slate-950">


{{--    {{ dump(Auth::user()->gunChallenges) }}--}}

    <div class=" bg-cover p-3 h-[150px]" style="background-image: url({{ $gun->getFirstMediaUrl('gun') }});">
        <span class="text-xl uppercase">{{ $gun->name }}</span>

        <div class="flex gap-3 justify-end pt-[60px]">

            @if($gun->gun_challenges)
                @foreach($gun->gun_challenges()->where('mode', session()->get('mode'))->get() as $challenge)
                    <button x-show="!open" :class="open ? 'flex' : '' " @click="open = true" class="h-10 w-10 border border-gray-400 bg-contain" style="background-image: url({{ $challenge->getFirstMediaUrl('camo') }});">

                        @if($user->gunChallenges->contains($challenge->id))
                            <i class="fa-solid fa-check"></i>
                        @endif
                    </button>
                @endforeach
            @endif
        </div>
    </div>


    <div x-show="open" class="bg-slate-950 p-3 gap-3 items-center">
        @foreach($gun->gun_challenges()->where('mode', session()->get('mode'))->get() as $challenge)
            <button wire:click="toggle({{ $challenge->id }})" class="flex relative gap-3 mb-2 items-center">
                <img :class="open ? 'flex' : ''" @click="open = true" class="h-10 w-10 border border-gray-400 bg-contain" style="background-image: url({{ $challenge->getFirstMediaUrl('camo') }});">
                {{ $challenge->challenge }}
                @if($user->gunChallenges->contains($challenge->id))
                    <i class="fa-solid fa-check absolute left-3 top-3"></i>
                @endif
            </button>
        @endforeach
    </div>
</div>
