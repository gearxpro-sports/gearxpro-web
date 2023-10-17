<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CardProduct extends Component
{
    public $name;
    public $description;
    public $availableColor;
    public $price;

    public function render()
    {
        return view('livewire.components.card-product');
    }
}
