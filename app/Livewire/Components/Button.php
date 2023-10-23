<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Button extends Component
{
    public $text;
    public $icon;
    public $color;
    public $wireAction;

    public function addToCart() {
        $this->dispatch('addToCart');
    }

    public function render()
    {
        return view('livewire.components.button');
    }
}
