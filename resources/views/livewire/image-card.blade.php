<a
    @if (! $shouldNotNavigate)
        wire:navigate.hover
    @endif
    href="{{ $href }}"
    class="image-card gun-card {{ $height ? $height : "h-[300px] md:h-[220px]" }} {{ $useRoute ? (request()->routeIs("category") ? "opacity-50 hover:opacity-100" : "") : "" }} mb-3 flex w-full items-end border bg-slate-950 p-3 text-[24px] hover:border-brand/50 md:w-[420px]"
    style="background-image: url({{ asset("images/" . $category . ".jpg") }})"
>
    <p class="label">
        {{-- {{ $label }} --}}
    </p>
    <p class="hover-label">
        {{ $label }}
    </p>
</a>
