<?php

namespace App\Livewire\Shop\Components\Cart;

use App\Models\Cart;
use App\Models\ProductVariant;
use App\Models\Stock;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CartItem extends Component
{
    public $item;
    public $cart;
    public $variantQuantity;

    public function mount()
    {
        $this->variantQuantity = Stock::where('user_id', session('reseller_id'))->where('product_variant_id', $this->item->variant->id)->first()->quantity;
        if (auth()->check()) {
            $this->cart = auth()->user()->cart;
        } else {
            $this->cart = Cart::where('user_id', session('cart_user_token'))->first();
        }
    }

    public function increment()
    {
        if (isset($this->item->variant) && $this->item->quantity < $this->variantQuantity) {
            $this->item->increment('quantity');
            // Update product quantity in Omnisend cart
            Http::withHeaders([
                'X-API-KEY' => env('OMNISEND_KEY'),
            ])
                ->patch("https://api.omnisend.com/v3/carts/{$this->cart->omnisend_cart_id}/products/{$this->item->omnisend_cart_product_id}", [
                    'currency' => 'EUR',
                    'quantity' => $this->item->quantity
                ]);
            // Update Omnisend cart total
            Http::withHeaders([
                'X-API-KEY' => env('OMNISEND_KEY'),
            ])
                ->patch("https://api.omnisend.com/v3/carts/{$this->cart->omnisend_cart_id}", [
                    'currency' => 'EUR',
                    'cartSum' => intval($this->cart->fresh()->subtotal * 100)
                ]);
        }
        $this->dispatch('item-updated');
    }

    public function decrement()
    {
        if ($this->item->quantity > 1) {
            $this->item->decrement('quantity');
            // Update product quantity in Omnisend cart
            Http::withHeaders([
                'X-API-KEY' => env('OMNISEND_KEY'),
            ])
                ->patch("https://api.omnisend.com/v3/carts/{$this->cart->omnisend_cart_id}/products/{$this->item->omnisend_cart_product_id}", [
                    'currency' => 'EUR',
                    'quantity' => $this->item->quantity
                ]);
            // Update Omnisend cart total
            Http::withHeaders([
                'X-API-KEY' => env('OMNISEND_KEY'),
            ])
                ->patch("https://api.omnisend.com/v3/carts/{$this->cart->omnisend_cart_id}", [
                    'currency' => 'EUR',
                    'cartSum' => intval($this->cart->fresh()->subtotal * 100)
                ]);
        }
        $this->dispatch('item-updated');
    }

    public function remove()
    {
        // Delete product in Omnisend cart
        Http::withHeaders([
            'X-API-KEY' => env('OMNISEND_KEY'),
        ])
            ->delete("https://api.omnisend.com/v3/carts/{$this->cart->omnisend_cart_id}/products/{$this->item->omnisend_cart_product_id}");

        $this->item->delete();

        if ($this->cart->fresh()->items->count() === 0) {
            // Delete Omnisend Cart if there is no items
            Http::withHeaders([
                'X-API-KEY' => env('OMNISEND_KEY'),
            ])
                ->delete("https://api.omnisend.com/v3/carts/{$this->cart->omnisend_cart_id}");

            $this->cart->delete();
            if (session()->get('cart_user_token')) {
                session()->remove('cart_user_token');
            }
        } else {
            // Update Omnisend cart total
            Http::withHeaders([
                'X-API-KEY' => env('OMNISEND_KEY'),
            ])
                ->patch("https://api.omnisend.com/v3/carts/{$this->cart->omnisend_cart_id}", [
                    'currency' => 'EUR',
                    'cartSum' => intval($this->cart->fresh()->subtotal * 100)
                ]);
        }
        $this->dispatch('item-removed');
    }

    public function render()
    {
        return view('livewire.shop.components.cart.cart-item');
    }
}
