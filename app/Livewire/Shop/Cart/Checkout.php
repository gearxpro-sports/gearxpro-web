<?php

namespace App\Livewire\Shop\Cart;

use App\Models\Cart;
use App\Models\Country;
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
                'emailGuest' => 'required|unique:users,email',
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

    public function mount() {
        $cart = Cart::where('user_id', auth()->user()?->id)->orWhere('user_id', session('cart_user_token'))->first();
        if(!$cart) {
            return redirect()->route('shop.index');
        }
    }

    public function next()
    {
        $this->optionAccess = 'guest';

        $this->validate();

        if ($this->emailGuest && $this->privacy) {
            $password = 'password'; // TODO: Str::password(10)
            $user = User::create([
                'email' => $this->emailGuest,
                'password' => bcrypt($password),
                'country_id' => Country::where('iso2_code', session('country_code'))->first()->id
            ]);
            $user->assignRole(User::CUSTOMER);
            // TODO: Inviare email a reseller con i dati di login
            if(Auth::attempt(['email' => $user->email, 'password' => $password])) {
                $cart = Cart::where('user_id', session('cart_user_token'))->first();
                $cart->update([
                    'user_id' => $user->id
                ]);

                return redirect()->intended(route('shop.payment', ['country_code' => session('country_code')]));
            }

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
                    return redirect()->intended(route('shop.payment', ['country_code' => session('country_code')]));
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
