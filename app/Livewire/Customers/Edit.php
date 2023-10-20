<?php

namespace App\Livewire\Customers;

use App\Models\Address;
use App\Models\Country;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public User $customer;
    public Address $billing_address;
    public Address $shipping_address;

    public function rules() {
        return [
            'customer.firstname' => 'required',
            'customer.lastname' => 'required',
            'customer.email' => 'required|email|unique:users,email,'.$this->customer->id,
            'billing_address.company' => 'required',
            'customer.phone' => 'required',
            // Billing
            'billing_address.address_1' => 'required',
            'billing_address.city' => 'required',
            'billing_address.postcode' => 'required',
            'billing_address.country_id' => 'required|exists:countries,id',
            'billing_address.phone' => 'required',
            'billing_address.vat_number' => 'required',
            'billing_address.tax_code' => 'required',
            'billing_address.sdi' => 'nullable',
            'billing_address.pec' => 'nullable',
            // Shipping
            'shipping_address.address_1' => 'required',
            'shipping_address.city' => 'required',
            'shipping_address.postcode' => 'required',
            'shipping_address.country_id' => 'required|exists:countries,id',
            'shipping_address.phone' => 'required',
            'shipping_address.vat_number' => 'required',
            'shipping_address.tax_code' => 'required',
            'shipping_address.sdi' => 'nullable',
            'shipping_address.pec' => 'nullable',
        ];
    }

    public function mount()
    {
        $this->billing_address = $this->customer->billing_address;
        $this->shipping_address = $this->customer->shipping_address;
    }

    public function copyFromBilling()
    {
        $this->shipping_address->address_1 = $this->billing_address->address_1;
        $this->shipping_address->city = $this->billing_address->city;
        $this->shipping_address->postcode = $this->billing_address->postcode;
        $this->shipping_address->country_id = $this->billing_address->country_id;
        $this->shipping_address->phone = $this->billing_address->phone;
        $this->shipping_address->vat_number = $this->billing_address->vat_number;
        $this->shipping_address->tax_code = $this->billing_address->tax_code;
        $this->shipping_address->sdi = $this->billing_address->sdi;
        $this->shipping_address->pec = $this->billing_address->pec;
    }

    public function save()
    {
        $this->validate();
        $this->customer->update([
            'firstname' => $this->customer->firstname,
            'lastname' => $this->customer->lastname,
            'email' => $this->customer->email,
            'phone' => $this->customer->phone,
        ]);

        $this->billing_address->update([
            'country_id' => $this->billing_address->country_id,
            'address_1' => $this->billing_address->address_1,
            'postcode' => $this->billing_address->postcode,
            'city' => $this->billing_address->city,
            'state' => Country::find($this->billing_address->country_id)->iso2_code,
            'phone' => $this->billing_address->phone,
            'company' => $this->billing_address->company,
            'vat_number' => $this->billing_address->vat_number,
            'tax_code' => $this->billing_address->tax_code,
            'sdi' => $this->billing_address->sdi,
            'pec' => $this->billing_address->pec,
            'default' => true
        ]);

        $this->shipping_address->update([
            'country_id' => $this->shipping_address->country_id,
            'address_1' => $this->shipping_address->address_1,
            'postcode' => $this->shipping_address->postcode,
            'city' => $this->shipping_address->city,
            'state' => Country::find($this->shipping_address->country_id)->iso2_code,
            'phone' => $this->shipping_address->phone,
            'company' => $this->billing_address->company,
            'vat_number' => $this->shipping_address->vat_number,
            'tax_code' => $this->shipping_address->tax_code,
            'sdi' => $this->shipping_address->sdi,
            'pec' => $this->shipping_address->pec,
            'default' => true
        ]);

        $this->dispatch('open-notification',
            title: __('notifications.updating'),
            subtitle: __('notifications.customers.updating.success'),
            type: 'success'
        );

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.customers.edit', [
            'countries' => Country::all()
        ]);
    }
}
