<div wire:poll x-show="tab === 'friends'">
    <form wire:submit="addFriend" class="flex gap-3 mb-3">
        <input wire:model="username" type="text" class="border w-full bg-transparent border-white/20 px-3 py-2 placeholder:text-white/20" placeholder="add a friend - jm45x#2215">
        <button href="{{ route('register') }}" class="hover:bg-brand/20 border border-brand p-3 px-10 hover:bg-brand">Add</button>
    </form>


    <div class="grid gap-3">
        <div class="uppercase font-bold">My friends</div>
        <hr class="border-t-white/20">
        @foreach(auth()->user()->friends as $friend)
            <div class="py-5 flex gap-3 items-center">
                <div>
                    <div class="text-xl leading-none">{{ $friend->username}}</div>
                    <div class="flex text-white/50 gap-3">
                        Friends for {{ $friend->pivot->updated_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        @endforeach
        <div>

            @if(count(auth()->user()->pendingFriendsFrom) || count(auth()->user()->pendingFriendsTo))

                @teleport('#friends-tab')
                    <div class="absolute -left-3 -top-3 z-[70] text-sm font-bold rounded-full">
                        1
                    </div>
                @endteleport

                <div class="uppercase font-bold">Pending Friend Requests</div>
                <hr class="border-t-white/20 mb-3">
            @endif

            @if(auth()->user()->pendingFriendsTo)
                @foreach(auth()->user()->pendingFriendsTo as $friend)
                    <div class="py-5 flex gap-3 items-center">
                        <i class="fa-solid fa-clock"></i>
                        <div>
                            <div class="text-xl leading-none">{{ $friend->username}}</div>
                            <div class="text-white/50">You sent this request.</div>
                        </div>
                    </div>
                @endforeach
            @endif


            @if(auth()->user()->pendingFriendsFrom())
                @foreach(auth()->user()->pendingFriendsFrom as $friend)
                    <div class="py-5 flex gap-3 items-center">
                        <i class="fa-solid fa-clock"></i>
                        <div>
                            <div class="text-xl leading-none">{{ $friend->username}}</div>
                            <div class="flex gap-3">
                                <button wire:click="acceptRequest({{ $friend->pivot->id }})" class="text-brand underline">Accept</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
</div>
