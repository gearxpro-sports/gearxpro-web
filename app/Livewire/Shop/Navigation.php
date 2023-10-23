<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use Livewire\Attributes\On;

class Navigation extends Component
{
    public $user;
    public $products = 0;

    public function mount() {
        $this->user = auth()->user();
    }

    #[On('addProducts')]
    public function addProducts($quantity) {
        $this->products += $quantity;
    }

    public function render()
    {
        return view('livewire.shop.navigation');
    }
}
