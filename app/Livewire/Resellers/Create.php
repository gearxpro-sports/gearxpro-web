<?php

namespace App\Livewire\Resellers;

use Livewire\Component;

class Create extends Component
{
    public $firstname;

    public function render()
    {
        return view('livewire.resellers.create');
    }
}
