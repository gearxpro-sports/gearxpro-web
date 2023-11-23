<?php

namespace App\Livewire\Shop;

use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\On;


class HeaderCheckout extends Component
{
    #[On('item-updated')]
    #[On('item-removed')]
    #[On('product-added-to-cart')]
    public function render()
    {
        return view('livewire.shop.header-checkout', [
            'cart' => Cart::where('user_id', auth()->user()?->id)->orWhere('user_id', session('cart_user_token'))->first()
        ]);

    }
}
