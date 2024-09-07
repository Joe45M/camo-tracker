<?php

namespace App\Livewire;

use App\Models\Friend;
use App\Models\GunChallenge;
use App\Models\User;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function Sodium\compare;

class CompareFriends extends Component
{
    protected $listeners = ['pageRefresh' => '$render'];

    public $comparingWith;
    public $category;
    public $mode;

    public $theirStats;
    public $myStats;

    public function render()
    {
        $comparingWith = session()->get('compare_with');

        if ($comparingWith) {
            $this->comparingWith = User::find($comparingWith);
        }

        if ($this->comparingWith) {
            $this->theirStats = $this->getStats($this->comparingWith);
            $this->myStats = $this->getStats(User::find(Auth::id()));
        }

        return view('livewire.compare-friends');
    }

    public function resetCompare()
    {
        session()->forget('compare_with');

        $this->comparingWith = false;
    }

    public function compareWith(User $user)
    {
        session()->put('compare_with', $user->id);
    }

    public function getStats(User $user): array
    {
        $challenges = GunChallenge::whereRelation('gun', 'category', $this->category)
            ->where('mode', $this->mode)
            ->get();


        $completed = 0;

        foreach ($challenges as $challenge) {
            if ($user->gunChallenges->contains($challenge->id)) {
                $completed++;
            }
        }

        $stats =  [
            'completed' => $completed,
            'incomplete' => $challenges->count() - $completed,
            'total' => $challenges->count(),
        ];

        return $stats;
    }
}
