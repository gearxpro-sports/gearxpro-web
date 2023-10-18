<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;

class CardProduct extends Component
{
    public $cardSmall = false;
    public $image;
    public $name;
    public $description;
    public $availableColor;
    public $price;

    #[On('filterOn')]
    public function filterOn() {
        $this->cardSmall = !$this->cardSmall;
    }

    public function render()
    {
        return view('livewire.components.card-product');
    }
}
