<?php

namespace App\Livewire;

use App\Models\Gun;
use Livewire\Component;

class Dashboard extends Component
{
    public $guns;

    public $categories = ['ar', 'smg', 'shotgun',  'lmg', 'marksman', 'sniper', 'pistol', 'launcher'];


    public function render()
    {
        $this->guns = Gun::all();


        return view('livewire.dashboard',
            [
                'labels' => [
                    'ar' => 'Assault rifles',
                    'smg' => 'SMG',
                    'shotgun' => 'Shotguns',
                    'marksman' => 'Marksman Rifles',
                    'lmg' => 'LMGs',
                    'sniper' => 'Snipers',
                    'pistol' => 'Pistols',
                    'launcher' => 'Launchers',
                ]
            ])->layout('layouts.app');
    }
}
