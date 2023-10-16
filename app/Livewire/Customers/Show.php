<?php

namespace App\Livewire\Customers;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    /**
     * @var User
     */
    public User $customer;

    /**
     * @return View
     */
    public function render()
    {
        return view('livewire.customers.show');
    }
}
