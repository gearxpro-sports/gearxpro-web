<?php

namespace App\Livewire\AboutUs;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class WhoWeAre extends Component
{
    public function render()
    {
        return view('livewire.about-us.who-we-are');
    }
}
