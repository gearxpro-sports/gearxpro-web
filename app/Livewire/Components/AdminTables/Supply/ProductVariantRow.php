<?php

namespace App\Livewire\Components\AdminTables\Supply;

use App\Models\ProductVariant;
use Livewire\Component;

class ProductVariantRow extends Component
{
    public ProductVariant $variant;
    public $quantity = 0;

    public function addItem($id)
    {
        if($this->variant->inStock()) {
            $this->dispatch('item-added', id: $id, quantity: $this->quantity, price: $this->variant->product->wholesale_price);
        }
    }

    public function render()
    {
        return view('livewire.components.admin-tables.supply.product-variant-row');
    }
}
