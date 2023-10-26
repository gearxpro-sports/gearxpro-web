<?php

namespace App\Livewire\Shop\Cart;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.checkout')]
class Payment extends Component
{
    // Data order customer
    public $name;
    public $lastName;
    public $address;
    public $cap;
    public $specific;
    public $city;
    public $province;
    public $nation;
    public $email;
    public $telephone;
    public $dataUser = false;
    // Data payment customer
    public $creditCard;
    public $expiration;
    public $ccv;
    public $accountHolder;

    public $money = '€';
    public $currentTab = 0;
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

    public function rules() {
        if ($this->currentTab == 0) {
            return [
                'name' => 'required',
                'lastName' => 'required',
                'address' => 'required',
                'cap' => 'required',
                'specific' => 'nullable',
                'city' => 'required',
                'province' => 'required',
                'nation' => 'required',
                'email' => 'required',
                'telephone' => 'required',
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
                'name.required' => __('shop.payment.required'),
                'lastName.required' => __('shop.payment.required'),
                'address.required' => __('shop.payment.required'),
                'cap.required' => __('shop.payment.required'),
                'specific.required' => __('shop.payment.required'),
                'city.required' => __('shop.payment.required'),
                'province.required' => __('shop.payment.required'),
                'nation.required' => __('shop.payment.required'),
                'email.required' => __('shop.payment.required'),
                'telephone.required' => __('shop.payment.required'),
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
        $this->validate();
        $this->dataUser = true;
        $this->currentTab = 1;

        // User::create(
        //     $this->customer->all()
        // );
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
