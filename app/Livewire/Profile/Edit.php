<?php

namespace App\Livewire\Profile;

use App\Models\Address;
use App\Models\Country;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Livewire\Component;

class Edit extends Component
{
    public User|Authenticatable $reseller;
    public ?Address $billing_address;
    public ?Address $shipping_address;

    public function rules()
    {
        return [
            'reseller.firstname' => 'required',
            'reseller.lastname' => 'required',
            'reseller.email' => 'required|email|unique:users,email,'.$this->reseller->id,
            'billing_address.company' => 'required',
            'reseller.phone' => 'required',
            'reseller.tax' => 'required',
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
        $this->reseller = auth()->user();
        $this->billing_address = $this->reseller->billing_address;
        $this->shipping_address = $this->reseller->shipping_address;
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
        // dd($this->validate());
        $this->validate();
        $this->reseller->update([
            'firstname' => $this->reseller->firstname,
            'lastname' => $this->reseller->lastname,
            'email' => $this->reseller->email,
            'phone' => $this->reseller->phone,
            'tax' => $this->reseller->tax,
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
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.profile.updating.success'),
            type: 'success'
        );
    }

    public function render()
    {
        if(auth()->user()->hasanyrole([User::RESELLER, User::SUPERADMIN])) {
            return view('livewire.profile.edit', [
                'resellers' => User::role(User::RESELLER)->with('country')->get(),
                'countries' => Country::all()
            ]);
        } else {
            return view('livewire.profile.edit', [
                'resellers' => User::role(User::RESELLER)->with('country')->get(),
                'countries' => Country::all()
            ])->layout('layouts.guest');
        }
    }
}
