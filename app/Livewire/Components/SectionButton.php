<?php

namespace App\Livewire\Components;

use App\Livewire\Shop\Products\Index as ProductIndex;
use Livewire\Component;
use Livewire\Attributes\On;


class SectionButton extends Component
{
    public $name;
    public $index;
    public $selected;

    public function select($key) {
        $this->dispatch('selectCategory', $key)->to(ProductIndex::class);
    }

    #[On('setCategory')]
    public function setCategory($key) {
        $this->selected = $key;
    }

    public function render()
    {
        return view('livewire.components.section-button');
    }
}
