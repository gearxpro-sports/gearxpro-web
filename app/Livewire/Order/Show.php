<?php

namespace App\Livewire\Order;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Show extends Component
{
    /**
     * @var Order
     */
    public Order $order;

    /**
     * @return View
     */
    public function render()
    {
        return view('livewire.orders.show');
    }

    /**
     * @param string $status
     * @return false|void
     */
    public function changeStatus(string $status)
    {

    }
}
