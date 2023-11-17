<?php

namespace App\Livewire\AboutUs;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Development extends Component
{
    public function render()
    {
        return view('livewire.about-us.development');
    }
}
