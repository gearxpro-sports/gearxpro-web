<?php

namespace App\Livewire\Resellers;

use App\Livewire\Forms\UserForm;
use App\Models\Country;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public UserForm $form;

    public function copyFromBilling()
    {
        $this->form->shipping_address = $this->form->billing_address;
        $this->form->shipping_city = $this->form->billing_city;
        $this->form->shipping_postcode = $this->form->billing_postcode;
        $this->form->shipping_country = $this->form->billing_country;
        $this->form->shipping_phone = $this->form->billing_phone;
        $this->form->shipping_vat_number = $this->form->billing_vat_number;
        $this->form->shipping_tax_code = $this->form->billing_tax_code;
        $this->form->shipping_sdi = $this->form->billing_sdi;
        $this->form->shipping_pec = $this->form->billing_pec;
    }

    public function save()
    {
        $this->validate();

        $this->form->saveReseller();
    }

    public function render()
    {
        return view('livewire.resellers.create', [
            'resellers' => User::role(User::RESELLER)->with('country')->get(),
            'countries' => Country::all()
        ]);
    }
}
