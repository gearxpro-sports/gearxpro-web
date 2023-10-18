<?php

namespace App\Livewire\Resellers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $firstname, $lastname, $email, $company, $country, $phone;
    public $billing_address, $billing_city, $billing_postcode, $billing_country, $billing_phone, $billing_vat_number, $billing_tax_code, $billing_sdi, $billing_pec;
    public $shipping_address, $shipping_city, $shipping_postcode, $shipping_country, $shipping_phone, $shipping_vat_number, $shipping_tax_code, $shipping_sdi, $shipping_pec;

    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email',
        'company' => 'required',
        'country' => 'required|exists:countries,id', // Validazione custom per nazione già utilizzata da altro reseller
        'phone' => 'required',
        // Billing
        'billing_address' => 'required',
        'billing_city' => 'required',
        'billing_postcode' => 'required',
        'billing_country' => 'required|exists:countries,id',
        'billing_phone' => 'required',
        'billing_vat_number' => 'required',
        'billing_tax_code' => 'required',
        'billing_sdi' => 'nullable',
        'billing_pec' => 'nullable',
        // Shipping
        'shipping_address' => 'required',
        'shipping_city' => 'required',
        'shipping_postcode' => 'required',
        'shipping_country' => 'required|exists:countries,id',
        'shipping_phone' => 'required',
        'shipping_vat_number' => 'required',
        'shipping_tax_code' => 'required',
        'shipping_sdi' => 'nullable',
        'shipping_pec' => 'nullable',
    ];

    public function copyFromBilling() {
        $this->shipping_address = $this->billing_address;
        $this->shipping_city = $this->billing_city;
        $this->shipping_postcode = $this->billing_postcode;
        $this->shipping_country = $this->billing_country;
        $this->shipping_phone = $this->billing_phone;
        $this->shipping_vat_number = $this->billing_vat_number;
        $this->shipping_tax_code = $this->billing_tax_code;
        $this->shipping_sdi = $this->billing_sdi;
        $this->shipping_pec = $this->billing_pec;
    }

    public function save() {
        $this->validate();
        $reseller = User::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Str::password(10),
            'country_id' => $this->country
        ]);
        $reseller->assignRole(User::RESELLER);

        $billing_address = $reseller->addresses()->create([
            'type' => 'billing',
            'country_id' => $this->country,
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

        $shipping_address = $reseller->addresses()->create([
            'type' => 'shipping',
            'country_id' => $this->country,
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

    public function render()
    {
        return view('livewire.resellers.create', [
            'resellers' => User::role(User::RESELLER)->with('country')->get(),
            'countries' => Country::all()
        ]);
    }
}
