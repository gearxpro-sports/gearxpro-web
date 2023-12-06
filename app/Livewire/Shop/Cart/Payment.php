<?php

namespace App\Livewire\Shop\Cart;

use App\Models\Address;
use App\Models\Country;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Stripe\StripeClient;

#[Layout('layouts.checkout')]
class Payment extends Component
{
    public $cart;
    public $customer;
    public $firstname;
    public $lastname;
    public $pec;
    public $phone;
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

    public $currentTab = 0;
    public $tabs = [
        [
            'text' => 'tab_delivery',
            'icon' => 'delivery'
        ],
        [
            'text' => 'tab_payment',
            'icon' => 'payment',
        ]
    ];

    public function rules()
    {
        if ($this->currentTab == 0) {
            return [
                'firstname' => 'required',
                'lastname' => 'required',
                'pec' => 'required',
                'phone' => 'required',
                'shipping_address' => 'required',
                'shipping_civic' => 'nullable',
                'shipping_postcode' => 'required',
                'shipping_city' => 'required',
                'shipping_state' => 'required',
                'shipping_company' => 'nullable',
            ];
        }

        return [];
    }

    public function messages()
    {
        if ($this->currentTab == 0) {
            return [
                'firstname.required' => __('shop.payment.required'),
                'lastname.required' => __('shop.payment.required'),
                'pec.required' => __('shop.payment.required'),
                'phone.required' => __('shop.payment.required'),
                'shipping_address.required' => __('shop.payment.required'),
                'shipping_civic.required' => __('shop.payment.required'),
                'shipping_phone.required' => __('shop.payment.required'),
            ];
        }

        return [];
    }

    #[On('shipping-data-updated')]
    public function mount()
    {
        $this->cart = auth()->user()?->cart;
        if (!auth()->check() || !$this->cart) {
            return redirect()->route('shop.index');
        }
        if (auth()->user()) {
            $this->customer = auth()->user();
            $this->firstname = $this->customer->firstname;
            $this->lastname = $this->customer->lastname;
            $this->customer_shipping_address = $this->customer->shipping_address ?? null;
        }

        if ($this->customer_shipping_address) {
            $this->full_shipping_address = trim($this->customer_shipping_address->address_1) . ' ' . trim($this->customer_shipping_address->city) . ' ' . trim($this->customer_shipping_address->postcode);

            $this->pec = $this->customer->shipping_address->pec ?? $this->customer->email;
            $this->phone = $this->customer->shipping_address->phone;
            $this->shipping_address = $this->customer_shipping_address->address_1;
            // $this->shipping_civic = $this->customer_shipping_address->address_1;
            $this->shipping_postcode = $this->customer_shipping_address->postcode;
            $this->shipping_city = $this->customer_shipping_address->city;
            $this->shipping_state = $this->customer_shipping_address->state;
            $this->shipping_company = $this->customer_shipping_address->company;
        }
    }

    public function changeTab($tab)
    {
        $this->currentTab = $tab;
    }

    public function next()
    {
        if ($this->streetClicked && $this->shipping_civic === null) {
            return $this->dispatch('open-notification',
                title: __('notifications.customer.error.address.title'),
                subtitle: __('notifications.customer.error.address.description'),
                type: 'error'
            );
        }

        if ($this->currentTab === 0) {

            $this->validate();

            $this->customer->update([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
            ]);

            Address::updateOrCreate([
                'user_id' => $this->customer->id,
                'type' => 'shipping'
            ],
                [
                    'country_id' => $this->customer->country_id ?? Country::where('iso2_code', session('country_code'))->first()->id,
                    'address_1' => trim($this->shipping_address) . ' ' . trim($this->shipping_civic),
                    'postcode' => $this->shipping_postcode,
                    'city' => $this->shipping_city,
                    'state' => $this->shipping_state,
                    'company' => $this->shipping_company,
                    'pec' => $this->pec,
                    'phone' => $this->phone,
                ]
            );

            $this->dispatch('open-notification',
                title: __('notifications.titles.updating'),
                subtitle: __('notifications.profile.updating.success'),
                type: 'success'
            );
            $this->dispatch('shipping-data-updated');

            $this->currentTab = 1;
            $this->dataUser = true;

            /****** STRIPE PAYMENT INTENT CREATION - Start *****/

            $total = config('app.shipping_cost');
            foreach ($this->cart->items as $cartItem) {
                $total += ($cartItem->quantity * $cartItem->price);
            }
            $stripeKeys =  User::where('id', session('reseller_id'))->first(['stripe_public_key', 'stripe_private_key'])->toArray();
            $stripe = new StripeClient($stripeKeys['stripe_private_key']);

            if ($this->cart->stripe_payment_intent_id) {
                $paymentIntent = $stripe->paymentIntents->update($this->cart->stripe_payment_intent_id, [
                    'amount' => $total * 100,
                ]);
            } else {
                $paymentIntent = $stripe->paymentIntents->create([
                    'amount' => $total * 100,
                    'currency' => 'eur',
                    'payment_method_types' => ['card', 'link'],
                ]);
                $this->cart->update(['stripe_payment_intent_id' => $paymentIntent->id]);
            }

            $this->dispatch('pay-order',
                public_key: $stripeKeys['stripe_public_key'],
                client_secret:$paymentIntent->client_secret
            );

            /****** STRIPE PAYMENT INTENT CREATION - End *******/
        }
    }

    public function render()
    {
        return view('livewire.shop.cart.payment');
    }

    #[On('payment-error')]
    public function showPaymentError($msg = null)
    {
        $this->dispatch('open-notification',
            title: __('shop.notifications.errors.payment.title'),
            subtitle: $msg ?? __('shop.notifications.errors.payment.description'),
            type: 'error'
        );
    }
}
