<div class="container mx-auto pt-10">
    <div x-data="{tab: 'ar'}">
        <div class="md:flex flex-wrap lg:gap-3 justify-center">
            <livewire:image-card
                :href="route('category', 'ar')"

                label="Camo Tracker"
                :category="'ar'">

            </livewire:image-card>
            <livewire:image-card
                :href="'https://discord.gg/nWrZTp8N'"

                :shouldNotNavigate="true"
                label="Join Discord"
                :category="'discord'">

            </livewire:image-card>
            <livewire:image-card
                :href="'/posts/1'"
                label="Changelog"
                :category="'change'">

            </livewire:image-card>
        </div>
    </div>
</div>
