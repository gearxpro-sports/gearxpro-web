<?php

namespace App\Livewire\Shop;

use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class Navigation extends Component
{
    public $user;
    public $languages = [];
    public $about_us = [];

    public function mount() {
        $this->languages = config('gearxpro.languages');
        $this->about_us = [
            [
                'route' => 'about_us.whoWeAre',
                'name' =>  'Azienda',
            ],
            [
                'route' => 'about_us.values',
                'name' => 'Valori',
            ],
            [
                'route' => 'about_us.development',
                'name' => 'Sviluppo',
            ],
        ];
    }

    #[On('item-updated')]
    #[On('item-removed')]
    #[On('product-added-to-cart')]
    public function render()
    {
        return view('livewire.shop.navigation', [
            'cart' => Cart::where('user_id', auth()->user()?->id)->orWhere('user_id', session('cart_user_token'))->first()
        ]);
    }
}
