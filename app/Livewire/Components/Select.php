<?php

namespace App\Livewire\Components;

use App\Livewire\Shop\Products\Index as ProductIndex;
use Livewire\Component;

class Select extends Component
{
    public $options;
    public $selected;
    public $label;
    public $open = false;

    public function toggle() {
        $this->open = !$this->open;
    }

    public function select($index) {
        $this->selected = $index;
        $this->dispatch('selectOrder', $index)->to(ProductIndex::class);
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.components.select');
    }
}
