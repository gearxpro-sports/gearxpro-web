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
        $addresses = $this->customer->addresses;
        $orders = $this->customer->customerOrders();

        return view('livewire.customers.show', [
            'billing_address' => $addresses->firstWhere('type', 'billing'),
            'shipping_address' => $addresses->firstWhere('type', 'shipping'),
            'orders' => $orders->paginate()
        ]);
    }
}
