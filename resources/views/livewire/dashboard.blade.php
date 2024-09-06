<div class="container mx-auto pt-10">
    <div x-data="{tab: 'ar'}">
        <div class="md:flex lg:gap-3 flex-wrap justify-center">
            @foreach($categories as $category)
                <a wire:navigate.hover href="{{ route('category', $category) }}" class="bg-slate-950 text-[24px] mb-3 border gun-card w-full bg-cover p-3 h-[300px] md:h-[220px] flex items-end md:w-[420px]"
                style="background-image: url({{ asset('images/' . $category . '.jpg') }});"
                >
                    {{ $category === 'ar' ? 'Assault rifles' : '' }}
                    {{ $category === 'smg' ? 'SMG' : '' }}
                    {{ $category === 'shotgun' ? 'Shotguns' : '' }}
                    {{ $category === 'marksman' ? 'Marksman Rifles' : '' }}
                    {{ $category === 'lmg' ? 'LMGs' : '' }}
                    {{ $category === 'sniper' ? 'Snipers' : '' }}
                    {{ $category === 'pistol' ? 'Pistols' : '' }}
                    {{ $category === 'launcher' ? 'Launchers' : '' }}
                </a>
            @endforeach
        </div>
    </div>
</div>
