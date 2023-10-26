<?php

namespace App\Livewire\Shop\Cart;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.checkout')]
class Checkout extends Component
{
    public $email;
    public $privacy;

    public function next() {
        if ($this->email AND $this->privacy) {
            $this->redirect('/shop/payment');
        }
    }

    public function login() {
        $user = User::where('email', $this->email)->first();

        Auth::login($user);

        $this->redirect('/shop/payment');
    }

    public function render()
    {
        return view('livewire.shop.cart.checkout');
    }
}
