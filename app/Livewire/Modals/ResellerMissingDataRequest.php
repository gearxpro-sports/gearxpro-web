<?php

namespace App\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;

class ResellerMissingDataRequest extends ModalComponent
{
    /**
     * @var array
     */
    public array $missingData = [];

    public function mount()
    {
        $dataToCheck = ['tax', 'stripe_public_key', 'stripe_private_key'];
        foreach($dataToCheck as $data) {
            if (!auth()->user()->{$data}) {
                $this->missingData[$data] = '';
            }
        }
    }

    public function rules()
    {
        return [
            'missingData.tax'                => 'sometimes|required|integer|max:99',
            'missingData.stripe_public_key'  => 'sometimes|required|string|alpha_dash',
            'missingData.stripe_private_key' => 'sometimes|required|string|alpha_dash',
        ];
    }

    public function messages()
    {
        return [
            'missingData.tax.required' => __('shop.payment.required'),
            'missingData.tax.max' => __('shop.payment.required'),
            'missingData.stripe_public_key.required' => __('shop.payment.required'),
            'missingData.stripe_private_key.required' => __('shop.payment.required'),
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

    public function save() {
        $this->validate();

        auth()->user()->update($this->missingData);

        $this->dispatch('open-notification',
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.resellers.updating_missing_data.success'),
            type: 'success'
        );

        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.modals.reseller-missing-data-request');
    }
}
