<?php

namespace App\Livewire\Shop;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Splash extends Component
{
    #[Layout('layouts.blank')]

    public function setCountry($iso) {
        session()->put('country_code', strtolower($iso));

        return redirect()->route('home');
    }

    public function render()
    {
        $resellers = User::role(User::RESELLER)->with('country')->get();

        return view('livewire.shop.splash', [
            'resellers' => $resellers
        ]);
    }
}
