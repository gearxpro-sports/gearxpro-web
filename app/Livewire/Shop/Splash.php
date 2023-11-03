<?php

namespace App\Livewire\Shop;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Splash extends Component
{
    #[Layout('layouts.blank')]

    public function mount() {
        if(session('country_code')){
            return redirect()->route('home', ['country_code' => session('country_code')]);
        }
    }

    public function setCountry($iso) {
        session()->put('country_code', strtolower($iso));

        return redirect()->route('home', ['country_code' => session('country_code')]);
    }

    public function render()
    {
        $resellers = User::role(User::RESELLER)->with('country')->get()->groupBy('country_id');

        return view('livewire.shop.splash', [
            'resellers' => $resellers
        ]);
    }
}
