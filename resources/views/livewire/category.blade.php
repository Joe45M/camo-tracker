<div wire:init="init" class="container mx-auto pt-10">
    <div class="mb-3 flex justify-between gap-5">
        <div class="mb-5 flex items-center gap-3">
            {{-- <h1 class="text-2xl font-bold"> --}}
            {{-- {{ $name }} <span class="hidden lg:inline">|</span> --}}
            {{-- </h1> --}}

            @foreach ($labels as $slug => $label)
                <a
                    wire:navigate.hover
                    href="{{ route("category", $slug) }}"
                    class="{{ $slug === $category ? "font-bold opacity-100" : "opacity-50" }} hidden duration-100 hover:scale-110 hover:opacity-100 lg:block"
                >
                    {{ $label }}
                </a>
                <span class="separator hidden opacity-50 lg:block"></span>
            @endforeach
        </div>

        <div class="flex self-end border border-white/20 text-xl">
            <button
                wire:click="setMode('multiplayer')"
                class="{{ $mode === "multiplayer" ? "bg-green-500" : "bg-slate-950" }} p-3"
            >
                <i class="fa-solid fa-people-group"></i>
            </button>
            <button
                wire:click="setMode('zombies')"
                class="{{ $mode === "zombies" ? "bg-green-500" : "bg-slate-950" }} p-3"
            >
                <i class="fa-solid fa-biohazard"></i>
            </button>
        </div>
    </div>

    <div class="grid gap-5 lg:grid-cols-5">
        @if($guns)
            @foreach($guns as $gun)
                <livewire:gun-card :$gun :key="$gun->id"></livewire:gun-card>
            @endforeach
        @else
            <div class="h-[150px] border border-white/20 bg-[#0f0f0f] p-3">
                <div class="h-5 w-10 rounded-md bg-slate-800"></div>
            </div>
            <div class="h-[150px] border border-white/20 bg-[#0f0f0f] p-3">
                <div class="h-5 w-10 rounded-md bg-slate-800"></div>
            </div>
            <div class="h-[150px] border border-white/20 bg-[#0f0f0f] p-3">
                <div class="h-5 w-10 rounded-md bg-slate-800"></div>
            </div>
            <div class="h-[150px] border border-white/20 bg-[#0f0f0f] p-3">
                <div class="h-5 w-10 rounded-md bg-slate-800"></div>
            </div>
            <div class="h-[150px] border border-white/20 bg-[#0f0f0f] p-3">
                <div class="h-5 w-10 rounded-md bg-slate-800"></div>
            </div>
        @endif
    </div>

    <hr class="mt-10 border-t-white/20" />

    <div class="space-between flex flex-wrap">
        <div class="h-64 pt-10">
            <livewire:livewire-pie-chart key="{{ $chart->reactiveKey() }}" :pie-chart-model="$chart" />
        </div>
        <div class="flex h-64 items-center border-l border-l-white/20 pl-5 text-center lg:px-20">
            <div>
                <div class="text-center text-[48px]">
                    {{ $stats["completed"] }} /
                    {{ $stats["total"] }}
                </div>
                {{ strtoupper($category) }} camos completed.
            </div>
        </div>
        <livewire:compare-friends :mode="$mode" :category="$category"></livewire:compare-friends>
    </div>
</div>
