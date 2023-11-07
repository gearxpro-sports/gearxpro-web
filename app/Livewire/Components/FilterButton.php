<?php

namespace App\Livewire\Components;

use Livewire\Component;

class FilterButton extends Component
{
    public $filter = false;

    public function toggle() {
        $this->filter = !$this->filter;
        $this->dispatch('filterOn');
    }

    public function render()
    {
        return view('livewire.components.filter-button');
    }
}
