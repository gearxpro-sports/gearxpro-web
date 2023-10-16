<?php

namespace App\Livewire\Customers;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.customers.index');
    }

    public function placeholder()
    {
        return view('livewire.components.admin-tables.placeholder');
    }
}
