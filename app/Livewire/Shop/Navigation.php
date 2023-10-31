<?php

namespace App\Livewire\Shop;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\On;

class Navigation extends Component
{
    public $user;
    public $products = 0;

    #[On('addProducts')]
    public function addProducts($quantity) {
        $this->products += $quantity;
    }

    public function render()
    {
        return view('livewire.shop.navigation');
    }
}
