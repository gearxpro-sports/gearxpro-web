<?php

namespace App\Livewire\Resellers;

use Livewire\Component;

class Index extends Component
{
    public $counter = 0;

    public function render()
    {
        return view('livewire.resellers.index');
    }
}
