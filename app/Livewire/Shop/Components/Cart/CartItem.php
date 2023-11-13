<?php

namespace App\Livewire\Shop\Components\Cart;

use App\Models\Cart;
use App\Models\ProductVariant;
use Livewire\Component;

class CartItem extends Component
{
    public $item;
    public $variant;

    public function mount()
    {
        $this->variant = ProductVariant::find($this->item->product_variant_id);
    }

    public function increment()
    {
        if (isset($this->variant) && $this->item->quantity < $this->variant->quantity) {
            $this->item->increment('quantity');
        }
        $this->dispatch('item-updated');
    }

    public function decrement()
    {
        if ($this->item->quantity > 1) {
            $this->item->decrement('quantity');
        }
        $this->dispatch('item-updated');
    }

    public function remove()
    {
        $this->item->delete();
        if (auth()->check()) {
            $cart = auth()->user()->cart;
        } else {
            $cart = Cart::where('user_id', session('cart_user_token'))->first();
        }
        if ($cart->items->count() === 0) {
            $cart->delete();
            if (session()->get('cart_user_token')) {
                session()->remove('cart_user_token');
            }
        }
        $this->dispatch('item-removed');
    }

    public function render()
    {
        return view('livewire.shop.components.cart.cart-item');
    }
}
