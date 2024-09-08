<div wire:init="init" class="container mx-auto pt-10">


    @teleport('#context-menu')
    <div class="group">

        <div class="">
            <div class="hidden lg:flex">
                @foreach($labels as $slug => $label)
{{--                    <livewire:image-card--}}
{{--                        :href="route('category', $slug)"--}}
{{--                        label="{{ $label }}"--}}
{{--                        :category="$slug"--}}
{{--                        :key="$slug"--}}
{{--                        :height="'h-[90px] 2xl:h-[130px] text-center'"--}}
{{--                        :useRoute="true">--}}

{{--                    </livewire:image-card>--}}

                    <a wire:navigate.hover
                       href="{{ route('category', $slug) }}"
                       class="image-card bg-slate-950 text-[24px] mb-3 border hover:border-brand/50 gun-card !bg-cover w-full p-3  flex items-end md:w-[420px]
                       h-[120px] min-[2000px]:h-[150px] text-center
                       hover:opacity-100 {{ $slug === $category ? 'opacity-100' : 'opacity-50' }}
                       "
                       style="background-image: url({{ asset('images/' . $slug . '.jpg') }});"
                    >


                        <p class="label">
                            {{--        {{ $label }}--}}
                        </p>
                        <p class="hover-label">
                            {{ $label }}
                        </p>
                    </a>

                @endforeach
            </div>
        </div>
    </div>
    @endteleport


    <div class="flex gap-5 justify-between mb-3">
        <h1 class="text-2xl font-bold mb-5">
            {{ $name }} <span class="block lg:inline">| {{ $mode }}</span>
        </h1>

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
