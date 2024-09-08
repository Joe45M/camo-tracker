<?php

namespace App\Livewire;

use Livewire\Component;

class ImageCard extends Component
{
    public $href;
    public $category;
    public $label;
    public $height;
    public $useRoute;

    public $shouldNotNavigate;

    public function render()
    {
        return view('livewire.image-card');
    }
}
