<div wire:init="init" class="container mx-auto pt-10">
    <div class="flex gap-5 justify-between mb-3">
        <div class="flex gap-3 items-center mb-5">
            <h1 class="text-2xl font-bold">
                {{ $name }} <span class="hidden lg:inline">|</span>
            </h1>

            @foreach($labels as $slug => $label)
                <a wire:navigate.hover
                   href="{{ route('category', $slug) }}"
                   class="{{ $slug === $category ? 'opacity-100 font-bold' : 'opacity-50' }} hidden hover:scale-110 duration-100 lg:block hover:opacity-100
                       "
                >{{ $label }}</a>
                <span class="separator hidden lg:block opacity-50"></span>
            @endforeach
        </div>

        <div class="flex text-xl border self-end border-white/20">
            <button wire:click="setMode('multiplayer')" class="p-3 {{ $mode === 'multiplayer' ? 'bg-green-500' : 'bg-slate-950' }}">
                <i class="fa-solid fa-people-group"></i>
            </button>
            <button wire:click="setMode('zombies')" class="p-3 {{ $mode === 'zombies' ? 'bg-green-500' : 'bg-slate-950' }}">
                <i class="fa-solid fa-biohazard"></i>
            </button>
        </div>
    </div>

    <div class="grid lg:grid-cols-5 gap-5">
        @if($guns)
            @foreach($guns as $gun)
                <livewire:gun-card :$gun :key="$gun->id"></livewire:gun-card>
            @endforeach
        @else
            <div class="h-[150px] bg-[#0f0f0f] border p-3 border-white/20">
                <div class="w-10 h-5 rounded-md bg-slate-800"></div>
            </div>
            <div class="h-[150px] bg-[#0f0f0f] border p-3 border-white/20">
                <div class="w-10 h-5 rounded-md bg-slate-800"></div>
            </div>
            <div class="h-[150px] bg-[#0f0f0f] border p-3 border-white/20">
                <div class="w-10 h-5 rounded-md bg-slate-800"></div>
            </div>
            <div class="h-[150px] bg-[#0f0f0f] border p-3 border-white/20">
                <div class="w-10 h-5 rounded-md bg-slate-800"></div>
            </div>
            <div class="h-[150px] bg-[#0f0f0f] border p-3 border-white/20">
                <div class="w-10 h-5 rounded-md bg-slate-800"></div>
            </div>
        @endif
    </div>

    <hr class="mt-10 border-t-white/20">


    <div class="flex flex-wrap  space-between">
       <div class="h-64 pt-10">
           <livewire:livewire-pie-chart
               key="{{ $chart->reactiveKey() }}"
               :pie-chart-model="$chart"
           />
       </div>
        <div class="text-center h-64 border-l border-l-white/20 pl-5 lg:px-20 items-center flex">
            <div>
                <div class="text-center text-[48px]">
                    {{ $stats['completed'] }} /
                    {{ $stats['total'] }}
                </div>
                {{ strtoupper($category) }} camos completed.
            </div>
        </div>
        <livewire:compare-friends :mode="$mode" :category="$category"></livewire:compare-friends>
    </div>
</div>
