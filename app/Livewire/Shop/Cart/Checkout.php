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
    public $password;
    public $emailGuest;
    public $privacy;
    public $optionAccess;

    public function rules() {
        if ($this->optionAccess == 'login') {
            return [
                'email' => 'required',
                'password' => 'required'
            ];
        }
        if ($this->optionAccess == 'guest') {
            return [
                'emailGuest' => 'required',
                'privacy' => 'required'
            ];
        }
    }

    public function messages() {
        if ($this->optionAccess == 'login') {
            return [
                'email.required' => __('shop.payment.required'),
                'password.required' => __('shop.payment.required'),
            ];
        }
        if ($this->optionAccess == 'guest') {
            return [
                'emailGuest.required' => __('shop.payment.required'),
                'privacy.required' => __('shop.payment.required'),
            ];
        }
    }

    public function next() {
        $this->optionAccess = 'guest';

        $this->validate();

        if ($this->emailGuest AND $this->privacy) {
            $this->redirect('/shop/payment');
        }
    }

    public function login() {
        $this->optionAccess = 'login';

        $this->validate();
        $user = User::where('email', $this->email)->first();

        Auth::login($user);

        $this->redirect('/shop/payment');
    }

    public function render()
    {
        return view('livewire.shop.cart.checkout');
    }
}
