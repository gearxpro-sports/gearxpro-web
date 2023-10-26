<?php

namespace App\Livewire\Shop\Cart;

use App\Models\Address;
use App\Models\Country;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.checkout')]
class Payment extends Component
{
    public User $user;
    // Data order customer
    public $firstname;
    public $lastname;
    public $address;
    public $postcode;
    public $company;
    public $city;
    public $province;
    public $country;
    public $email;
    public $phone;
    public $dataUser = false;
    // Data payment customer
    public $creditCard;
    public $expiration;
    public $ccv;
    public $accountHolder;

    public $money = '€';
    public $currentTab = 0;
    public $countries;
    public $cart = [
        [
            'name' => 'SOXPro Trekking',
            'format' => 'short',
            'color' => 'green',
            'size' => 'M',
            'quantity' => 2,
            'price' => 70
        ]
    ];
    public $tabs = [
        [
            'text' => 'Recapiti e consegna',
            'icon-on' => 'delivery',
            'icon-off' => 'delivery-off'
        ],
        [
            'text' => 'info Pagamento',
            'icon-on' => 'payment',
            'icon-off' => 'payment-off',
        ]
    ];

    public function mount() {
        $this->countries = Country::all();
        if (auth()->user()) {
            $this->user = auth()->user();
        }
    }

    public function rules() {
        if ($this->currentTab == 0) {
            return [
                'firstname' => 'required',
                'lastname' => 'required',
                'address' => 'required',
                'postcode' => 'required',
                'company' => 'nullable',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ];
        } elseif ($this->currentTab == 1) {
            return [
                'creditCard' => 'required',
                'expiration' => 'required',
                'ccv' => 'required',
                'accountHolder' => 'required',
            ];
        }
    }

    public function messages() {
        if ($this->currentTab == 0) {
            return [
                'firstname.required' => __('shop.payment.required'),
                'lastname.required' => __('shop.payment.required'),
                'address.required' => __('shop.payment.required'),
                'postcode.required' => __('shop.payment.required'),
                'company.required' => __('shop.payment.required'),
                'city.required' => __('shop.payment.required'),
                'province.required' => __('shop.payment.required'),
                'country.required' => __('shop.payment.required'),
                'email.required' => __('shop.payment.required'),
                'phone.required' => __('shop.payment.required'),
            ];
        } elseif ($this->currentTab == 1) {
            return [
                'creditCard.required' => __('shop.payment.required'),
                'expiration.required' => __('shop.payment.required'),
                'ccv.required' => __('shop.payment.required'),
                'accountHolder.required' => __('shop.payment.required'),
            ];
        }
    }

    public function getDataUser() {
        // dd($this->validate());
        $this->validate();
        $this->dataUser = true;
        $this->currentTab = 1;

        $this->user->update([
            'phone' => $this->phone
        ]);

        $country_iso2 = Country::find($this->country);

        Address::create([
            'user_id' => $this->user->id,
            'country_id' => $this->country,
            'type' => 'shipping',
            'address_1' => $this->address,
            'postcode' => $this->postcode,
            'company' => $this->company,
            'city' => $this->city,
            'state' => $country_iso2->iso2_code,
            'phone' => $this->phone,
        ]);
    }

    public function getDataPayment() {
        $this->validate();
        $this->redirect('/confirm');
    }

    public function changeTab($tab) {
        $this->currentTab = $tab;
    }

    public function render()
    {
        return view('livewire.shop.cart.payment');
    }
}
