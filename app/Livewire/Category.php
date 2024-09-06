<?php

namespace App\Livewire;

use App\Models\Gun;
use App\Models\GunChallenge;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Category extends Component
{
    public $guns;
    public $category;
    public $mode;
    private $chart;

    protected $listeners = ['pageRefresh'];
    public array $stats;

    public function init()
    {
        $this->guns = Gun::where('category', $this->category)->get();
    }

    public function pageRefresh()
    {
        $this->render();
    }

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {

        if (!session()->has('mode')) {
            session()->put('mode', 'multiplayer');
        }

        $this->mode = session()->get('mode');

        $this->charts();

        return view('livewire.category', [
            'name' => $this->getCategory(),
            'chart' => $this->chart,
        ])->layout('layouts.app');
    }

    public function getCategory(): string
    {
        return match ($this->category) {
            'ar' => 'Assault Rifles',
            'smg' => 'SMGs',
            'shotgun' => 'Shotguns',
            'lmg' => 'LMGs',
            'sniper' => 'Snipers',
            'marksman' => 'Marksman Rifles',
            'launcher' => 'Launchers',
            'pistol' => 'Pistols',
        };
    }

    public function setMode(string $mode) {
        session()->put('mode', $mode);

        $this->dispatch('pageRefresh');

        $this->render();
    }

    public function charts() {
        $challenges = GunChallenge::whereRelation('gun', 'category', $this->category)
            ->where('mode', $this->mode)
            ->get();


        $model = new PieChartModel();


        $completed = 0;

        foreach ($challenges as $challenge) {
            if (Auth::user()->gunChallenges->contains($challenge->id)) {
                $completed++;
            }
        }

        $this->stats = [
            'completed' => $completed,
            'incomplete' => $challenges->count() - $completed,
            'total' => $challenges->count(),
        ];

        $model->asDonut();
        $model->addSlice('Completed', $completed, '#ceff8661');
        $model->addSlice('Incomplete', $challenges->count() - $completed, '#101c4d');

        $this->chart = $model;

    }
}
