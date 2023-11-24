<?php

namespace App\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;

class Tax extends ModalComponent
{
    public $tax;

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

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function setTax() {
        $this->validate();
        auth()->user()->update([
            'tax' => $this->tax,
        ]);

        return redirect('dashboard');
    }

    public function render()
    {
        return view('livewire.modals.tax');
    }
}
