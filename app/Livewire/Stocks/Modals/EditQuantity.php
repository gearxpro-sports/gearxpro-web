<?php

namespace App\Livewire\Stocks\Modals;

use App\Models\Stock;
use LivewireUI\Modal\ModalComponent;

class EditQuantity extends ModalComponent
{
    public Stock $stock;

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    protected $rules = [
        'stock.quantity' => 'required|numeric'
    ];

    public function update() {
        $this->validate();
        $this->stock->update();
        $this->dispatch('quantity-updated');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.stocks.modals.edit-quantity');
    }
}
