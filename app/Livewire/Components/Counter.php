<?php

namespace App\Livewire\Components;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class Counter extends Component
{
    #[Modelable]
    public $value = 0;

    public $disabled = false;

    public function increment()
    {
        if(!$this->disabled) {
            $this->value++;
        }
    }

    public function decrement()
    {
        if(!$this->disabled) {
            if($this->value > 0) {
                $this->value--;
            }
        }
    }

    public function render()
    {
        return view('livewire.components.counter');
    }
}
