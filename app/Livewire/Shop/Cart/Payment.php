<?php

namespace App\Livewire\Shop\Cart;

use App\Models\Address;
use App\Models\Country;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.checkout')]
class Payment extends Component
{
    public $customer;
    public $firstname;
    public $lastname;
    public $phone;
    public $email;
    public $customer_shipping_address;

    //Shipping Address
    public $full_shipping_address;
    public $shipping_address;
    public $shipping_civic = null;
    public $shipping_postcode;
    public $shipping_city;
    public $shipping_state;
    public $shipping_company;

    public $streetClicked = false;
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
            'text' => 'tab_delivery',
            'icon-on' => 'delivery',
            'icon-off' => 'delivery-off'
        ],
        [
            'text' => 'tab_payment',
            'icon-on' => 'payment',
            'icon-off' => 'payment-off',
        ]
    ];

    public function mount() {
        $this->customer = auth()->user();
        $this->firstname = $this->customer->firstname;
        $this->lastname = $this->customer->lastname;
        $this->email = $this->customer->email;
        $this->phone = $this->customer->phone;
        $this->customer_shipping_address = $this->customer->shipping_address ?? null;

        if ($this->customer_shipping_address) {
            $this->full_shipping_address = $this->customer_shipping_address->address_1.' '.$this->customer_shipping_address->city.' '.$this->customer_shipping_address->postcode;

            $this->shipping_address = $this->customer_shipping_address->address_1;
            // $this->shipping_civic = $this->customer_shipping_address->address_1;
            $this->shipping_postcode = $this->customer_shipping_address->postcode;
            $this->shipping_city = $this->customer_shipping_address->city;
            $this->shipping_state = $this->customer_shipping_address->state;
            $this->shipping_company = $this->customer_shipping_address->company;
        }
    }

    public function rules() {
        if ($this->currentTab == 0) {
            return [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'shipping_address' => 'required',
                'shipping_civic' => 'nullable',
                'shipping_postcode' => 'required',
                'shipping_city' => 'required',
                'shipping_state' => 'required',
                'shipping_company' => 'nullable',
            ];
        }
        if ($this->currentTab == 1) {
            return [
                'creditCard' => 'required',
                'expiration' => 'required',
                'ccv' => 'required',
                'accountHolder' => 'required',
            ];
        }
        return [];
    }

    public function messages() {
        if ($this->currentTab == 0) {
            return [
                'firstname.required' => __('shop.payment.required'),
                'lastname.required' => __('shop.payment.required'),
                'email.required' => __('shop.payment.required'),
                'phone.required' => __('shop.payment.required'),
                'shipping_address.required' => __('shop.payment.required'),
                'shipping_civic.required' => __('shop.payment.required'),
                'shipping_phone.required' => __('shop.payment.required'),
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

    public function changeTab($tab) {
        $this->currentTab = $tab;
    }

    public function getDataUser() {
        $this->validate();

        if ($this->streetClicked AND $this->shipping_civic === null AND !$this->customer_shipping_address) {
            return  $this->dispatch('open-notification',
                title: __('notifications.customer.error.address.title'),
                subtitle: __('notifications.customer.error.address.description'),
                type: 'error'
            );
        }

        if ($this->currentTab === 0) {
            $this->customer->update([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            if (!$this->customer_shipping_address OR $this->shipping_address != $this->customer_shipping_address->address_1) {
                \App\Models\Address::updateOrCreate(['user_id'   => $this->customer->id, 'type' => 'shipping'],
                    [
                        'country_id' => $this->customer->country_id,
                        'address_1' => ($this->shipping_address . ' ' . $this->shipping_civic),
                        'postcode' => $this->shipping_postcode,
                        'city' => $this->shipping_city,
                        'state' => $this->shipping_state,
                        'company' => $this->shipping_company
                    ]
                );
            }

            if (!$this->customer_shipping_address OR $this->shipping_address != $this->customer_shipping_address->address_1) {
                $this->dispatch('open-notification',
                    title: __('notifications.titles.updating'),
                    subtitle: __('notifications.profile.updating.success'),
                    type: 'success'
                );
            }

            $this->currentTab = 1;
            $this->dataUser = true;
            $this->mount();
        } elseif ($this->currentTab === 1) {
            $this->redirect('/confirm');
        }
    }

    public function render()
    {
        return view('livewire.shop.cart.payment');
    }
}
