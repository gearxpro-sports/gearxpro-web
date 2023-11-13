<?php

namespace App\Livewire\Shop\Cart;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

    public function rules()
    {
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

    public function messages()
    {
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

    public function next()
    {
        $this->optionAccess = 'guest';

        $this->validate();

        if ($this->emailGuest and $this->privacy) {
            $this->redirect('/shop/payment');
        }
    }

    public function login()
    {
        $this->optionAccess = 'login';

        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            auth()->user()->update(['last_login' => now()]);
            if (!auth()->user()->cart) {
                if (session('cart_user_token')) {
                    Cart::where('user_id', session('cart_user_token'))->first()->update([
                        'user_id' => auth()->user()->id
                    ]);
                    session()->remove('cart_user_token');
                    return redirect()->route('shop.payment', ['country_code' => session('country_code')]);
                }
            } else {
                $this->dispatch('openModal', 'modals.existing-cart');
            }
        } else {
            $this->addError('password', 'Credenziali non valide');
        }

    }

    public function render()
    {
        return view('livewire.shop.cart.checkout');
    }
}
