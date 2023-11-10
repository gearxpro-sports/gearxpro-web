<?php

namespace App\Livewire\Shop\Components\Cart;

use App\Models\ProductVariant;
use Livewire\Component;

class CartItem extends Component
{
    public $item;
    public $variant;

    public function mount() {
        $this->variant = ProductVariant::find($this->item->product_variant_id);
    }

    public function increment()
    {
        if(isset($this->variant) && $this->item->quantity < $this->variant->quantity) {
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

    public function remove() {
        $this->item->delete();
        if(auth()->user()->cart->items->count() === 0) {
            auth()->user()->cart->delete();
        }
        $this->dispatch('item-removed');
    }

    public function render()
    {
        return view('livewire.shop.components.cart.cart-item');
    }
}
