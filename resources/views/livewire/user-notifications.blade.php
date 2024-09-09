<div class="">
    @if (auth()->user()->unreadNotifications->count())
        <div class="fixed bottom-5 right-5 w-[80%] border border-white/20 bg-black/80 lg:w-[500px]">
            <div class="border-b border-b-white/20 p-3">
                <div class="text-[24px]">Notifications</div>
            </div>
            @foreach ($notifications as $noti)
                <div class="p-3">
                    @if ($noti->type === "App\Notifications\JoinDiscordNotification")
                        <p>
                            Hi! Thanks for using Camo Tracker. If you find the website helpful, it would be awesome if
                            you could join the Discord server!
                        </p>
                    @endif
                </div>
                <div class="flex">
                    <a
                        href="https://discord.gg/nWrZTp8N"
                        class="w-full border border-green-400 bg-green-400/10 p-5 text-center hover:bg-brand/20"
                    >
                        <p class="items-center self-center text-[14px] lg:text-[18px]">JOIN SERVER</p>
                    </a>
                    <button
                        wire:click="dismiss('{{ $noti->id }}')"
                        class="w-full border border-white/20 bg-white/10 p-5 text-center hover:bg-white/20"
                    >
                        <p class="items-center self-center text-[14px] lg:text-[18px]">DISMISS</p>
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</div>
