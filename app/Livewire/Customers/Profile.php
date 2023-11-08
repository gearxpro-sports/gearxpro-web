<?php

namespace App\Livewire\Customers;

use Illuminate\Support\Facades\Hash;
use App\Models\Address;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Profile extends Component
{
    public User $customer;
    public Address $shipping_address;
    public Address $billing_address;

    public $modify = false;
    public $current_password = '';
    public $password = '';
    public $password_confirmation = '';
    public $keyFormat = [];
    public $formatPassword = [
        'Un carattere in MAIUSCOLO',
        'Un numero',
        '8 caratteri',
        'Un carattere in minuscolo',
        'Un carattere speciale (&*€%)'
    ];

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
        $this->shipping_address = $this->customer->shipping_address;
        $this->billing_address = $this->customer->billing_address;
    }

    public function selectEditData($data) {
        $this->modify = $data;
    }

    public function rules() {
        if ($this->modify == 'data') {
            return [
                'customer.firstname' => 'required',
                'customer.lastname' => 'required',
                'customer.phone' => 'required',
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
                'shipping_address.address_1' => 'required',
                'shipping_address.company' => 'nullable',
                'billing_address.address_1' => 'required',
                'billing_address.company' => 'nullable',
                'shipping_address.phone' => 'required',
            ];
        }
        return [];
    }

    public function messages() {
        if ($this->modify === 'data') {
            return [
                'customer.firstname.required' => __('shop.payment.required'),
                'customer.lastname.required' => __('shop.payment.required'),
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
                'shipping_address.address_1.required' => __('shop.payment.required'),
                'billing_address.address_1.required' => __('shop.payment.required'),
                'shipping_address.phone.required' => __('shop.payment.required'),
            ];
        }
        return [];
    }

    public function copyFromShipping()
    {
        $this->billing_address->address_1 = $this->shipping_address->address_1;
        $this->billing_address->company = $this->shipping_address->company;
    }

    public function edit() {
        $this->validate();

        if ($this->modify === 'data' OR $this->modify === 'email') {
            $this->customer->update($this->validate()['customer']);

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
            $this->shipping_address->update($this->validate()['shipping_address']);
            $this->billing_address->update($this->validate()['billing_address']);

            $this->dispatch('open-notification',
                title: __('notifications.titles.updating'),
                subtitle: __('notifications.profile.updating.success'),
                type: 'success'
            );
            $this->cancel();
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
