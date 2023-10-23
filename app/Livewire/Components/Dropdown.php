<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Livewire\Shop\Products\Index as ProductIndex;


class Dropdown extends Component
{
    public $name;
    public $open = false;
    public $options;

    public function dropOpen() {
        $this->open = !$this->open;
    }

    public function action($type, $element) {
        $this->dispatch('setFilter', $type, $element)->to(ProductIndex::class);
    }

    public function render()
    {
        return view('livewire.components.dropdown');
    }
}
