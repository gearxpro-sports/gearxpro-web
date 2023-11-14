<?php

namespace App\Livewire\Shop;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\On;

class Navigation extends Component
{
    public $user;
    public $languages = ["it", "en", "fr", "de", "es"];
    public $about_us = [];

    public function mount() {
        $this->about_us = [
            [
                'route' => 'about_us.whoWeAre',
                'name' =>  __('shop.navigation.about_us'),
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
    #[On('product-added-to-cart')]
    public function render()
    {
        return view('livewire.shop.navigation');
    }
}
