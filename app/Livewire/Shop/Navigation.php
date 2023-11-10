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
    public $languages = ["it", "en", "fr", "de", "es"];

    #[On('product-added-to-cart')]
    public function render()
    {
        return view('livewire.shop.navigation');
    }
}
