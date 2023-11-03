<?php

namespace App\Livewire\Shop\Cart;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Index extends Component
{
    public $cart = [''];
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

    // public function mount($cart) {
    //     $this->cart = $cart;
    // }

    public function applyCode() {

    }

    public function render()
    {
        return view('livewire.shop.cart.index');
    }
}
