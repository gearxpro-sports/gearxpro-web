<?php

namespace App\Livewire\Customers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Profile extends Component
{
    public User $customer;
    public $customerPhone;
    public $customer_shipping_address;
    public $customer_billing_address;
    //Shipping Address
    public $full_shipping_address;
    public $shipping_address;
    public $shipping_civic = null;
    public $shipping_postcode;
    public $shipping_city;
    public $shipping_state;
    public $shipping_company;
    public $shipping_phone;
    //Shipping Address
    public $full_billing_address;
    public $billing_address;
    public $billing_civic = null;
    public $billing_postcode;
    public $billing_city;
    public $billing_state;
    public $billing_company;

    public $streetClicked = false;
    public $modify = false;
    public $current_password = '';
    public $password = '';
    public $password_confirmation = '';
    public $keyFormat = [];
    public $formatPassword = [];

    public function updated($property) {
        if ($property === 'password') {
            $this->keyFormat= [];

            $password = str_split($this->password);
            if (count($password) > 7) {
                $this->keyFormat[2] = 2;
            }
            foreach ($password as $letter) {
                if (ctype_upper($letter)) {
                    $this->keyFormat[0] = 0;
                }
                if (is_numeric($letter)) {
                    $this->keyFormat[1] = 1;
                }
                if (ctype_lower($letter)) {
                    $this->keyFormat[3] = 3;
                }
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $letter)) {
                    $this->keyFormat[4] = 4;
                }
            }
        }
    }

    public function mount() {
        $this->customer = auth()->user();
        $this->customerPhone = $this->customer->phone;
        $this->customer_shipping_address = $this->customer->shipping_address ?? '';
        $this->formatPassword = [
            __('customers.format_password.uppercase'),
            __('customers.format_password.number'),
            __('customers.format_password.length'),
            __('customers.format_password.lowercase'),
            __('customers.format_password.special_character')
        ];

        if ($this->customer_shipping_address) {
            $this->full_shipping_address = $this->customer_shipping_address->address_1.' '.$this->customer_shipping_address->city.' '.$this->customer_shipping_address->postcode;

            $this->shipping_address = $this->customer_shipping_address->address_1;
            $this->shipping_postcode = $this->customer_shipping_address->postcode;
            $this->shipping_city = $this->customer_shipping_address->city;
            $this->shipping_state = $this->customer_shipping_address->state;
            $this->shipping_company = $this->customer_shipping_address->company;
            $this->shipping_phone = $this->customer_shipping_address->phone;
        }

        $this->customer_billing_address = $this->customer->billing_address;
        if ($this->customer_billing_address) {
            $this->full_billing_address = $this->customer_billing_address->address_1.' '.$this->customer_billing_address->city.' '.$this->customer_billing_address->postcode;
            $this->billing_address = $this->customer_billing_address->address_1;
            $this->billing_postcode = $this->customer_billing_address->postcode;
            $this->billing_city = $this->customer_billing_address->city;
            $this->billing_state = $this->customer_billing_address->state;
            $this->billing_company = $this->customer_billing_address->company;
        }
    }

    public function selectEditData($data) {
        $this->modify = $data;
    }

    public function rules() {
        if ($this->modify == 'data') {
            return [
                'customer.firstname' => 'required',
                'customer.lastname' => 'required',
                'customerPhone' => 'required',
            ];
        }
        if ($this->modify == 'email') {
            return [
                'customer.email' => 'required|email|unique:users,email,'.$this->customer->id,
            ];
        }
        if ($this->modify == 'password') {
            return [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'confirmed'],
            ];
        }
        if ($this->modify == 'shipping') {
            return [
                //shipping
                'shipping_address' => 'required',
                'shipping_civic' => 'nullable',
                'shipping_postcode' => 'required',
                'shipping_city' => 'required',
                'shipping_state' => 'required',
                'shipping_company' => 'nullable',
                'shipping_phone' => 'required',
                //billing
                'billing_address' => 'required',
                'billing_civic' => 'nullable',
                'billing_postcode' => 'required',
                'billing_city' => 'required',
                'billing_state' => 'required',
                'billing_company' => 'nullable',
            ];
        }
        return [];
    }

    public function messages() {
        if ($this->modify === 'data') {
            return [
                'customer.firstname.required' => __('shop.payment.required'),
                'customer.lastname.required' => __('shop.payment.required'),
                'customerPhone.required' => __('shop.payment.required'),
            ];
        }
        if ($this->modify === 'email') {
            return [
                'customer.email.required' => __('shop.payment.required'),
            ];
        }
        if ($this->modify === 'password') {
            return [
                'current_password.required' =>  __('shop.payment.required'),
                'current_password.current_password' =>  __('shop.payment.password_confirmation'),
                'password.required' => __('shop.payment.required'),
                'password.confirmed' => __('shop.payment.password_confirmation'),
            ];
        }
        if ($this->modify === 'shipping') {
            return [
                // shipping
                'shipping_address.required' => __('shop.payment.required'),
                'shipping_civic.required' => __('shop.payment.required'),
                'shipping_phone.required' => __('shop.payment.required'),
                // billing
                'billing_address.required' => __('shop.payment.required'),
                'billing_civic.required' => __('shop.payment.required'),
            ];
        }
        return [];
    }

    public function copyFromShipping()
    {
        if ($this->shipping_civic != null) {
            $this->full_billing_address = $this->shipping_address.' '.$this->shipping_civic.' '.$this->shipping_city.' '.$this->shipping_state;
            $this->billing_address = $this->shipping_address;
            $this->billing_civic = $this->shipping_civic;
            $this->billing_postcode = $this->shipping_postcode;
            $this->billing_city = $this->shipping_city;
            $this->billing_state = $this->shipping_state;
            $this->billing_company = $this->shipping_company;
        } else {
            return  $this->dispatch('open-notification',
                title: __('notifications.customer.error.address.title'),
                subtitle: __('notifications.customer.error.address.description'),
                type: 'error'
            );
        }
    }

    public function edit() {
        $this->validate();

        if ($this->shipping_civic === null AND !$this->customer_shipping_address OR $this->billing_civic === null AND !$this->customer_billing_address) {
            return  $this->dispatch('open-notification',
                title: __('notifications.customer.error.address.title'),
                subtitle: __('notifications.customer.error.address.description'),
                type: 'error'
            );
        }

        if ($this->modify === 'data' OR $this->modify === 'email') {
            $this->customer->update($this->validate()['customer']);
            $this->customer->update([
                'phone' => $this->customerPhone
            ]);

            $this->dispatch('open-notification',
                title: __('notifications.titles.updating'),
                subtitle: __('notifications.profile.updating.success'),
                type: 'success'
            );
            $this->cancel();
        } elseif ($this->modify === 'password') {
            if (count($this->keyFormat) > 4 AND $this->password === $this->password_confirmation) {
                $this->customer->update([
                    'password' => Hash::make($this->validate()['password'])
                ]);
                $this->dispatch('open-notification',
                    title: __('notifications.customer.success.password.title'),
                    type: 'success'
                );
                $this->cancel();
            } else {
                $this->dispatch('open-notification',
                    title: __('notifications.customer.error.password.title'),
                    subtitle: __('notifications.customer.error.password.description'),
                    type: 'error'
                );
            }
        } elseif ($this->modify === 'shipping') {
            if (!$this->customer_shipping_address OR $this->shipping_address != $this->customer_shipping_address->address_1) {
                \App\Models\Address::updateOrCreate(['user_id'   => $this->customer->id, 'type' => 'shipping'],
                    [
                        'country_id' => $this->customer->country_id,
                        'address_1' => ($this->shipping_address . ' ' . $this->shipping_civic),
                        'postcode' => $this->shipping_postcode,
                        'city' => $this->shipping_city,
                        'state' => $this->shipping_state,
                        'phone' => $this->shipping_phone,
                        'company' => $this->shipping_company
                    ]
                );
            }
            if (!$this->customer_billing_address OR $this->billing_address != $this->customer_billing_address->address_1) {
                \App\Models\Address::updateOrCreate(['user_id'   => $this->customer->id, 'type' => 'billing'],
                    [
                        'country_id' => $this->customer->country_id,
                        'address_1' => ($this->billing_address . ' ' . $this->billing_civic),
                        'postcode' => $this->billing_postcode,
                        'city' => $this->billing_city,
                        'state' => $this->billing_state,
                        'company' => $this->billing_company
                    ]
                );
            }

            if (!$this->customer_shipping_address OR !$this->customer_billing_address OR ($this->shipping_address) != $this->customer_shipping_address->address_1 OR ($this->billing_address) != $this->customer_billing_address->address_1) {
                $this->dispatch('open-notification',
                    title: __('notifications.titles.updating'),
                    subtitle: __('notifications.profile.updating.success'),
                    type: 'success'
                );
            }
            $this->cancel();
            $this->mount();
        }
    }

    public function cancel() {
        $this->modify = false;
        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->keyFormat = [];
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.customers.profile');
    }
}
