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

    #[On('item-updated')]
    #[On('item-removed')]
    #[On('product-added-to-cart')]
    public function render()
    {
        return view('livewire.shop.navigation', [
            'cart' => \App\Models\Cart::where('user_id', auth()->user()?->id)->orWhere('user_id', session('cart_user_token'))->first()
        ]);
    }
}
