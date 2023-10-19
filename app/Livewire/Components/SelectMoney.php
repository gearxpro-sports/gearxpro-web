<?php

namespace App\Livewire\Components;

use App\Livewire\Shop\Products\Show as ProductShow;
use Livewire\Component;

class SelectMoney extends Component
{
    public $options;
    public $selected;
    public $open = false;

    public function toggle() {
        $this->open = !$this->open;
    }

    public function select($money) {
        $this->selected = $money;
        $this->dispatch('selectMoney', $money)->to(ProductShow::class);
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.components.select-money');
    }
}
