<?php

namespace App\Livewire\Modals;

use App\Models\Cart;
use LivewireUI\Modal\ModalComponent;

class ExistingCart extends ModalComponent
{
    public function merge()
    {
        $oldCart = auth()->user()->cart;
        $newCart = Cart::where('user_id', session('cart_user_token'))->first();

        foreach ($newCart->items as $item) {
            $existing_item = $oldCart->items()->where('product_variant_id', $item->product_variant_id)->first();
            if ($existing_item) {
                $existing_item->increment('quantity', $item->quantity);
            } else {
                $oldCart->items()->create([
                    'product_variant_id' => $item->product_variant_id,
                    'price' => $item->price,
                    'quantity' => $item->quantity
                ]);
            }
        }
        $newCart->delete();
        return redirect()->route('shop.payment', ['country_code' => session('country_code')]);
    }

    public function override()
    {
        $oldCart = auth()->user()->cart;
        $newCart = Cart::where('user_id', session('cart_user_token'))->first();

        $oldCart->delete();
        $newCart->update([
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('shop.payment', ['country_code' => session('country_code')]);
    }

    public function render()
    {
        return view('livewire.modals.existing-cart');
    }
}
