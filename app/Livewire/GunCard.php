<?php

namespace App\Livewire;

use App\Models\Gun;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GunCard extends Component
{
    public $gun;

    public $user;

    public $listeners = ['pageRefresh' => '$render'];

    public function mount(Gun $gun)
    {
        $this->gun = $gun;
    }

    public function render()
    {

        $this->user = Auth::user();

        return view('livewire.gun-card');
    }

    public function toggle($id)
    {
        if ($this->user->gunChallenges->contains($id)) {
            Auth::user()->gunChallenges()->detach($id);
        } else {
            Auth::user()->gunChallenges()->attach($id);
        }


        $this->dispatch('pageRefresh');
    }
}
