<?php

namespace App\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;

class ResellerMissingDataRequest extends ModalComponent
{
    /**
     * @var int|null
     */
    public ?int $tax;

    /**
     * @var string|null
     */
    public ?string $stripePublicKey;

    /**
     * @var string|null
     */
    public ?string $stripePrivateKey;

    public function mount()
    {
        $this->tax = auth()->user()->tax;
        $this->stripePublicKey = auth()->user()->stripe_public_key;
        $this->stripePrivateKey = auth()->user()->stripe_private_key;
    }

    public function rules()
    {
        return [
            'tax'              => 'nullable|integer',
            'stripePublicKey'  => 'nullable|string|alpha_dash',
            'stripePrivateKey' => 'nullable|string|alpha_dash',
        ];
    }

    public function messages()
    {
        return [
            'tax.required' => __('shop.payment.required'),
            'stripePublicKey.required' => __('shop.payment.required'),
            'stripePrivateKey.required' => __('shop.payment.required'),
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

        auth()->user()->update([
            'tax' => trim($this->tax),
            'stripe_public_key' => trim($this->stripePublicKey),
            'stripe_private_key' => trim($this->stripePrivateKey),
        ]);

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
