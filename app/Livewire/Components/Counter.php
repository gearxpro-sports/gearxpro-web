<?php

namespace App\Livewire\Components;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class Counter extends Component
{
    #[Modelable]
    public $value = 0;

    public function increment()
    {
        $this->value++;
    }

    public function decrement()
    {
        $this->value--;
    }

    public function render()
    {
        return view('livewire.components.counter');
    }
}
