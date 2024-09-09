<?php

namespace App\Livewire;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserNotifications extends Component
{

    public $notifications;

    public function render()
    {
        $this->notifications = Auth::user()->notifications()->whereNull('read_at')->get();


        return view('livewire.user-notifications');
    }

    public function dismiss($notification)
    {
        $notification = Auth::user()->notifications()->where('id', $notification)->first();

        $notification->read_at = now();
        $notification->save();

        $this->render();
    }
}
