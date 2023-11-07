<?php

namespace App\Livewire\Resellers;

use App\Livewire\Forms\UserForm;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $billing_company;
    public $country_id;
    public $phone;
    public $payment_method;
    // Billing
    public $billing_address_1;
    public $billing_city;
    public $billing_postcode;
    public $billing_country_id;
    public $billing_phone;
    public $billing_vat_number;
    public $billing_tax_code;
    public $billing_sdi;
    public $billing_pec;
    // Shipping
    public $shipping_address_1;
    public $shipping_city;
    public $shipping_postcode;
    public $shipping_country_id;
    public $shipping_phone;
    public $shipping_vat_number;
    public $shipping_tax_code;
    public $shipping_sdi;
    public $shipping_pec;

    public function rules() {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'billing_company' => 'required',
            'country_id' => 'required|exists:countries,id',
            'phone' => 'required',
            'payment_method' => 'required',
            // Billing
            'billing_address_1' => 'required',
            'billing_city' => 'required',
            'billing_postcode' => 'required',
            'billing_country_id' => 'required|exists:countries,id',
            'billing_phone' => 'required',
            'billing_vat_number' => 'required',
            'billing_tax_code' => 'required',
            'billing_sdi' => 'nullable',
            'billing_pec' => 'nullable',
            // Shipping
            'shipping_address_1' => 'required',
            'shipping_city' => 'required',
            'shipping_postcode' => 'required',
            'shipping_country_id' => 'required|exists:countries,id',
            'shipping_phone' => 'required',
            'shipping_vat_number' => 'required',
            'shipping_tax_code' => 'required',
            'shipping_sdi' => 'nullable',
            'shipping_pec' => 'nullable',
        ];
    }

    public function copyFromBilling()
    {
        $this->shipping_address_1 = $this->billing_address_1;
        $this->shipping_city = $this->billing_city;
        $this->shipping_postcode = $this->billing_postcode;
        $this->shipping_country_id = $this->billing_country_id;
        $this->shipping_phone = $this->billing_phone;
        $this->shipping_vat_number = $this->billing_vat_number;
        $this->shipping_tax_code = $this->billing_tax_code;
        $this->shipping_sdi = $this->billing_sdi;
        $this->shipping_pec = $this->billing_pec;
    }

    public function save()
    {
        $this->validate();
        $reseller = User::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => bcrypt('password'), // TODO: Str::password(10)
            'country_id' => $this->country_id,
            'phone' => $this->phone,
            'payment_method' => $this->payment_method,
        ]);
        $reseller->assignRole(User::RESELLER);

        // TODO: Inviare email a reseller con i dati di login

        $reseller->addresses()->create([
            'type' => 'billing',
            'country_id' => $this->billing_country_id,
            'address_1' => $this->billing_address_1,
            'postcode' => $this->billing_postcode,
            'city' => $this->billing_city,
            'state' => Country::find($this->billing_country_id)->iso2_code,
            'phone' => $this->billing_phone,
            'company' => $this->billing_company,
            'vat_number' => $this->billing_vat_number,
            'tax_code' => $this->billing_tax_code,
            'sdi' => $this->billing_sdi,
            'pec' => $this->billing_pec,
            'default' => true
        ]);

        $reseller->addresses()->create([
            'type' => 'shipping',
            'country_id' => $this->shipping_country_id,
            'address_1' => $this->shipping_address_1,
            'postcode' => $this->shipping_postcode,
            'city' => $this->shipping_city,
            'state' => Country::find($this->shipping_country_id)->iso2_code,
            'phone' => $this->shipping_phone,
            'company' => $this->billing_company,
            'vat_number' => $this->shipping_vat_number,
            'tax_code' => $this->shipping_tax_code,
            'sdi' => $this->shipping_sdi,
            'pec' => $this->shipping_pec,
            'default' => true
        ]);

        $this->dispatch('open-notification',
            title: __('notifications.saving'),
            subtitle: __('notifications.resellers.saving.success'),
            type: 'success',
            actions: [
                'primary' => [
                    'label' => __('notifications.actions.show'),
                    'url'   => route('resellers.show', ['reseller' => $reseller]),
                    'target' => '_self',
                ]
            ]
        );
    }

    public function render()
    {
        return view('livewire.resellers.create', [
            'resellers' => User::role(User::RESELLER)->with('country')->get(),
            'countries' => Country::all()
        ]);
    }
}
