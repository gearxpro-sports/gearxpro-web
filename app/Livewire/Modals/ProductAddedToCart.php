<?php

namespace App\Livewire\Modals;

use App\Models\ProductVariant;
use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductAddedToCart extends Component
{
    public ProductVariant $productVariant;
    public $quantity = 0;
    public $showModalCart = false;

    #[On('product-added-to-cart')]
    public function showModal($variant_id, $quantity) {
        $this->productVariant = ProductVariant::find($variant_id);
        $this->quantity = $quantity;
        $this->showModalCart = true;
    }

    public function closeModal() {
        $this->showModalCart = false;
    }

    public function render()
    {
        return view('livewire.modals.product-added-to-cart', [
            'cart' => Cart::where('user_id', auth()->user()?->id)->orWhere('user_id', session('cart_user_token'))->first()
        ]);
    }
}
