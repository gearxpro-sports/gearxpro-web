<?php

namespace App\Livewire\Modals;

use App\Models\ProductVariant;
use Livewire\Component;
use Livewire\Attributes\On;

class Cart extends Component
{
    public ProductVariant $productVariant;
    public $money;
    public $cart = [];
    public $showModalCart = false;

    #[On('modalInfoCart')]
    public function modalInfoCart($money, $cart) {
        $this->money = $money;
        $this->cart = $cart;
        $this->showModalCart = true;
    }

    public function closeModal() {
        $this->showModalCart = false;
    }

    public function render()
    {
        return view('livewire.modals.cart');
    }
}
