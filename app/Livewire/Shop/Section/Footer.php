<?php

namespace App\Livewire\Shop\Section;

use App\Models\Category;
use Livewire\Component;

class Footer extends Component
{
    public $account = [];

    public function mount() {
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
        $categories = Category::where('parent_id', null)->get();

        return view('livewire.shop.section.footer', [
            'categories' => $categories
        ]);
    }
}
