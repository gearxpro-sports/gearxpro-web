<?php

namespace App\Livewire\Shop\Cart;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.guest')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.shop.cart.index');
    }
}
