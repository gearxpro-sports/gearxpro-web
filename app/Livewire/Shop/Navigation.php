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
    public $products = 0;
    public $currentLanguage;
    public $languages = ["it","en", "fr", "de", "es"];

    public function mount() {
        $this->user = auth()->user();
        $this->currentLanguage = Session::get('language', Config::get('app.locale'));
        App::setLocale(session('language'));
    }

    #[On('addProducts')]
    public function addProducts($quantity) {
        $this->products += $quantity;
    }

    public function changeLanguage($language) {
        $this->currentLanguage = $language;

        Session::put('language',$language);
        App::setLocale($language);
    }

    public function render()
    {
        return view('livewire.shop.navigation');
    }
}
