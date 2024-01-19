<?php

namespace App\Livewire\Components;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class Counter extends Component
{
    #[Modelable]
    public $value = 0;

    public $min = 0;
    public $max = 0;

    public $disabled = false;

    public function increment()
    {
        if(!$this->disabled) {
            $this->value++;
        }
        $this->updatedValue();
    }

    public function decrement()
    {
        if(!$this->disabled) {
            if($this->value > $this->min) {
                $this->value--;
            }
        }
        $this->updatedValue();
    }

    public function updatedValue() {
        if($this->value >= $this->max) {
            $this->value = $this->max;
        }
    }

    public function render()
    {
        return view('livewire.components.counter');
    }
}
