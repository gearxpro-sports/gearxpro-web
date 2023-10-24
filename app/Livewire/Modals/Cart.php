<?php

namespace App\Livewire\Modals;
use LivewireUI\Modal\ModalComponent;


class Cart extends ModalComponent
{
    public $cart;
    public $money;

    public function mount($cart, $money) {
        $this->cart = $cart;
        $this->money = $money;
    }

    public function render()
    {
        return view('livewire.modals.cart');
    }
}
