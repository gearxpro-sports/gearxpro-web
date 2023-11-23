<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public User $reseller;
    public $tax;

    public function mount() {
        $this->reseller = auth()->user();
    }

    public function rules() {
        return [
            'tax' => 'required',
        ];
    }

    public function messages() {
        return [
            'tax.required' => __('shop.payment.required')
        ];
    }

    public function setTax() {
        $this->validate();
        $this->reseller->update([
            'tax' => $this->tax,
        ]);

        return redirect('dashboard');
    }


    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
