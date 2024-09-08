<a

    @if(!$shouldNotNavigate)
        wire:navigate.hover
    @endif

   href="{{ $href }}"
   class="image-card bg-slate-950 text-[24px] mb-3 border hover:border-brand/50 gun-card w-full p-3  flex items-end md:w-[420px]
   {{ $height ? $height : 'md:h-[220px] h-[300px]' }}
   {{ $useRoute ? (request()->routeIs('category') ? 'opacity-50 hover:opacity-100' : '') : ''  }}
   "
   style="background-image: url({{ asset('images/' . $category . '.jpg') }});"
>

    <p class="label">
{{--        {{ $label }}--}}
    </p>
    <p class="hover-label">
        {{ $label }}
    </p>
</a>
