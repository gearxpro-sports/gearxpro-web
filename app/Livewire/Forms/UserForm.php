<?php

namespace App\Livewire\Forms;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    #[Rule('required')]
    public $firstname;
    #[Rule('required')]
    public $lastname;
    // TODO: validazione "unique" all'update
    // #[Rule('required|email|unique:users,email')]
    #[Rule('required|email')]
    public $email;
    #[Rule('required')]
    public $company;
    #[Rule('required|exists:countries,id')]
    public $country;
    #[Rule('required')]
    public $phone;
    #[Rule('required')]
    public $payment_method;
    // Billing
    #[Rule('required')]
    public $billing_address;
    #[Rule('required')]
    public $billing_city;
    #[Rule('required')]
    public $billing_postcode;
    #[Rule('required|exists:countries,id')]
    public $billing_country;
    #[Rule('required')]
    public $billing_phone;
    #[Rule('required')]
    public $billing_vat_number;
    #[Rule('required')]
    public $billing_tax_code;
    #[Rule('nullable')]
    public $billing_sdi;
    #[Rule('nullable')]
    public $billing_pec;

    // Shipping
    #[Rule('required')]
    public $shipping_address;
    #[Rule('required')]
    public $shipping_city;
    #[Rule('required')]
    public $shipping_postcode;
    #[Rule('required|exists:countries,id')]
    public $shipping_country;
    #[Rule('required')]
    public $shipping_phone;
    #[Rule('required')]
    public $shipping_vat_number;
    #[Rule('required')]
    public $shipping_tax_code;
    #[Rule('nullable')]
    public $shipping_sdi;
    #[Rule('nullable')]
    public $shipping_pec;

    public function setPost(User $user)
    {
        $this->user = $user;
        $billing_address = $user->addresses()->where('type', 'billing')->first();
        $shipping_address = $user->addresses()->where('type', 'shipping')->first();

        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->company = $billing_address->company;
        $this->country = $user->country_id;
        $this->phone = $user->phone;
        $this->payment_method = $user->payment_method;
        $this->billing_address = $billing_address->address_1;
        $this->billing_city = $billing_address->city;
        $this->billing_postcode = $billing_address->postcode;
        $this->billing_country = Country::where('iso2_code', $billing_address->state)->first()->id ?? null;
        $this->billing_phone = $billing_address->phone;
        $this->billing_vat_number = $billing_address->vat_number;
        $this->billing_tax_code = $billing_address->tax_code;
        $this->billing_sdi = $billing_address->sdi;
        $this->billing_pec = $billing_address->pec;
        $this->shipping_address = $shipping_address->address_1;
        $this->shipping_city = $shipping_address->city;
        $this->shipping_postcode = $shipping_address->postcode;
        $this->shipping_country = Country::where('iso2_code', $shipping_address->state)->first()->id ?? null;
        $this->shipping_phone = $shipping_address->phone;
        $this->shipping_vat_number = $shipping_address->vat_number;
        $this->shipping_tax_code = $shipping_address->tax_code;
        $this->shipping_sdi = $shipping_address->sdi;
        $this->shipping_pec = $shipping_address->pec;
    }

    public function saveReseller()
    {
        $reseller = User::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Str::password(10),
            'country_id' => $this->country,
            'payment_method' => $this->payment_method
        ]);
        $reseller->assignRole(User::RESELLER);

        $this->saveBillingAddress($reseller);
        $this->saveShippingAddress($reseller);
    }

    public function saveBillingAddress(User $user)
    {
        $user->addresses()->updateOrCreate([
            'user_id' => $user->id,
            'type' => 'billing'
        ], [
            'country_id' => $this->billing_country,
            'address_1' => $this->billing_address,
            'postcode' => $this->billing_postcode,
            'city' => $this->billing_city,
            'state' => Country::find($this->billing_country)->iso2_code,
            'phone' => $this->billing_phone,
            'company' => $this->company,
            'vat_number' => $this->billing_vat_number,
            'tax_code' => $this->billing_tax_code,
            'sdi' => $this->billing_sdi,
            'pec' => $this->billing_pec,
            'default' => true
        ]);
    }

    public function saveShippingAddress(User $user)
    {
        $user->addresses()->updateOrCreate([
            'user_id' => $user->id,
            'type' => 'shipping'
        ], [
            'country_id' => $this->shipping_country,
            'address_1' => $this->shipping_address,
            'postcode' => $this->shipping_postcode,
            'city' => $this->shipping_city,
            'state' => Country::find($this->shipping_country)->iso2_code,
            'phone' => $this->shipping_phone,
            'company' => $this->company,
            'vat_number' => $this->shipping_vat_number,
            'tax_code' => $this->shipping_tax_code,
            'sdi' => $this->shipping_sdi,
            'pec' => $this->shipping_pec,
            'default' => true
        ]);
    }

    public function updateReseller()
    {
        $this->user->update([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'company' => $this->company,
            'country_id' => $this->country,
            'phone' => $this->phone,
            'payment_method' => $this->payment_method,
        ]);

        $this->saveBillingAddress($this->user);
        $this->saveShippingAddress($this->user);
    }
}
