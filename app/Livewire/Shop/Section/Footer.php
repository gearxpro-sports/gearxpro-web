<?php

namespace App\Livewire\Shop\Section;

use Livewire\Component;

class Footer extends Component
{
    public $brands = [];
    public $account = [];

    public function mount() {
        $this->brands = [
            [
                'route' => 'shop.index',
                'name' =>  'SOXPro',
            ],
            [
                'route' => 'shop.index',
                'name' => 'FLEXGXPro',
            ],
            [
                'route' => 'shop.index',
                'name' => 'LACEXPro',
            ],
            [
                'route' => 'shop.index',
                'name' => 'TUBEXPro',
            ],
            [
                'route' => 'shop.index',
                'name' => 'Recovery',
            ],
        ];
        $this->account = [
            [
                'route' => 'shop.cart',
                'name' => __('shop.footer.my_account.cart'),
            ],
            [
                'route' => 'shop.checkout',
                'name' => __('shop.footer.my_account.checkout'),
            ],
            [
                'route' => 'customer.profile',
                'name' => __('shop.footer.my_account.orders'),
            ],
            [
                'route' => 'customer.profile',
                'name' => __('shop.footer.my_account.shipment'),
            ],
        ];

    }

    public function render()
    {
        return view('livewire.shop.section.footer');
    }
}
