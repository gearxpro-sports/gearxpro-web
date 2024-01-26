<?php

namespace App\Livewire\Shop\Cart;

use App\Models\Cart;
use App\Models\ProductVariant;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Index extends Component
{
    public $not_available = [];
    public $promoCode;
    public $productsRecommended = [
        0 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        1 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        2 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        3 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        4 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        5 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        6 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
    ];

    public function applyCode()
    {
        // TODO: Coupon Code
    }

    public function checkIfCartItemsAreAvailable()
    {
        $reseller = User::find(session('reseller_id'));

        if (auth()->check()) {
            $cart = auth()->user()->cart;
        } else {
            $cart = Cart::where('user_id', session('cart_user_token'))->first();
        }

        foreach ($cart->items as $item) {
            $stock = $reseller->stocks()->where('product_variant_id', $item->product_variant_id)->first();
            if ($stock->quantity < $item->quantity) {
                $this->not_available[$stock->product_variant_id] = $stock->quantity;
                $this->dispatch('open-notification',
                    title: __('notifications.titles.generic_error'),
                    subtitle: __('notifications.cart.product_not_available.error'),
                    type: 'error'
                );
                return false;
            }
        }

        return redirect()->route('shop.payment', ['country_code' => session('country_code')]);
    }

    #[On('item-updated')]
    #[On('item-removed')]
    public function render()
    {
        if (auth()->check()) {
            $cart = auth()->user()->cart;
        } else {
            $cart = Cart::where('user_id', session('cart_user_token'))->first();
        }

        return view('livewire.shop.cart.index', [
            'cart' => $cart
        ]);
    }
}
