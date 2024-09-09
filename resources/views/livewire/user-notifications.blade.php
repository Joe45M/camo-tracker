<div class="">
    @if(auth()->user()->unreadNotifications->count())
        <div class="fixed right-5 bottom-5 bg-black/80 border border-white/20 w-[80%] lg:w-[500px]">
            <div class="border-b border-b-white/20 p-3">
                <div class="text-[24px]">Notifications</div>
            </div>
            @foreach($notifications as $noti)
                <div class="p-3">
                    @if($noti->type === 'App\Notifications\JoinDiscordNotification')
                        <p>Hi! Thanks for using Camo Tracker. If you find the website helpful, it would be awesome if you could join the Discord server!</p>
                    @endif
                </div>
                <div class="flex">
                    <a href="https://discord.gg/nWrZTp8N" class="border hover:bg-brand/20 border-green-400 text-center w-full bg-green-400/10 p-5">
                        <p class="text-[14px] self-center items-center lg:text-[18px]">JOIN SERVER</p>
                    </a>
                    <button wire:click="dismiss('{{ $noti->id }}')" class="border border-white/20 text-center w-full bg-white/10 hover:bg-white/20 p-5">
                        <p class="text-[14px] self-center items-center lg:text-[18px]">DISMISS</p>
                    </button>
                </div>
            @endforeach
        </div>

    @endif
</div>
