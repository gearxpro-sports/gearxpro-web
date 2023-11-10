<?php

namespace App\Livewire\Components;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;


class DropdownFilter extends Component
{
    /**
     * @var string
     */
    public string $label;

    /**
     * @var bool
     */
    public bool $open = false;

    /**
     * @var Collection
     */
    public Collection $options;

    public function render()
    {
        return view('livewire.components.dropdown-filter');
    }

    public function dropOpen() {
        $this->open = !$this->open;
    }
}
