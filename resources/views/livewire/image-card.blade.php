<a wire:navigate.hover
   href="{{ $href }}"
   class="image-card bg-slate-950 text-[24px] mb-3 border hover:border-brand/50 gun-card w-full p-3 h-[300px] md:h-[220px] flex items-end md:w-[420px]"
   style="background-image: url({{ asset('images/' . $category . '.jpg') }});"
>

    <p class="label">
        {{ $label }}
    </p>
    <p class="hover-label">
        {{ $label }}
    </p>
</a>
