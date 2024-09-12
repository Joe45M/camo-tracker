<div x-data="{show: $persist(true)}" x-show="show" class="container mx-auto mt-5 px-3 lg:px-0">
    <div class="border border-green-400 bg-green-400/10 flex justify-between items-center p-5">
        <p class="text-[18px]">
            The website does not have all weapons yet. Once the developers release them, they will be added.
        </p>
        <button @click="show = false">
            <i class="fa-solid fa-x"></i>
        </button>
    </div>
</div>
