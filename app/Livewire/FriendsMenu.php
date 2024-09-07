<?php

namespace App\Livewire;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use function Symfony\Component\String\s;

class FriendsMenu extends Component
{
    public $username;
    public $user;

    public function render()
    {
        $this->user = Auth::user();

        return view('livewire.friends-menu');
    }

    public function addFriend()
    {
        $this->validate([
            'username' => 'required',
        ]);

        $username = explode('#', $this->username);

        if (count($username) !== 2) {
            return false;
        }

        $newFriend = User::where('username', $username[0])
            ->where('identifier', $username[1])
            ->first();

        if (!$newFriend) {
            return false;
        }

        $request = new Friend();
        $request->user_id = Auth::id();
        $request->friend_id = $newFriend->id;
        $request->save();

        $this->reset('username');
    }

    public function acceptRequest(Friend $friend)
    {
        $friend->accepted = 1;
        $friend->save();

        $this->render();
    }
}
