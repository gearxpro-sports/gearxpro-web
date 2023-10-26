<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use Livewire\Attributes\On;


class HeaderCheckout extends Component
{
    public $products = 0;

    #[On('addProducts')]
    public function addProducts($quantity) {
        $this->products += $quantity;
    }

    public function render()
    {
        return view('livewire.shop.header-checkout');
    }
}
