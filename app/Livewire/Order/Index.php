<?php

namespace App\Livewire\Order;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Index extends Component
{
    /**
     * @return View
     */
    public function render()
    {
        return view('livewire.orders.index');
    }
}
