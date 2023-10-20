<?php

namespace App\Livewire\Customers;

use App\Models\Country;
use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.customers.edit', [
            'countries' => Country::all()
        ]);
    }
}
