<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Livewire\Shop\Products\Index as ProductIndex;


class DropdownSize extends Component
{
    public $open = false;
    public $options;

    public function dropOpen() {
        $this->open = !$this->open;
    }

    public function selectSize($color) {
        $this->dispatch('setColor', $color)->to(ProductIndex::class);
    }

    public function render()
    {
        return view('livewire.components.dropdown-size');
    }
}
