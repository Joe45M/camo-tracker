<a wire:navigate.hover href="{{ $href }}" class="bg-slate-950 text-[24px] mb-3 border gun-card w-full bg-cover p-3 h-[300px] md:h-[220px] flex items-end md:w-[420px]"
   style="background-image: url({{ asset('images/' . $category . '.jpg') }});"
>
    {{ $label }}
</a>
