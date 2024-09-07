<div class="container mx-auto pt-10">
    <div x-data="{tab: 'ar'}">
        <div class="md:flex flex-wrap lg:gap-3 justify-center">
            @foreach($categories as $category)
                <livewire:image-card
                    :href="route('category', $category)"

                    label="{{ $labels[$category] }}"
                    :category="$category">

                </livewire:image-card>
            @endforeach
        </div>
    </div>
</div>
