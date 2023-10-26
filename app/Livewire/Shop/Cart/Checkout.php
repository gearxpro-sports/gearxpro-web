<?php

namespace App\Livewire\Shop\Cart;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.checkout')]
class Checkout extends Component
{
    public $email;
    public $privacy;

    public function next() {
        if ($this->email AND $this->privacy) {
            $this->redirect('/shop/payment');
        }
    }

    public function render()
    {
        return view('livewire.shop.cart.checkout');
    }
}
