<?php

namespace App\Livewire\Shop\Products\Modals;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class SizeGuide extends ModalComponent
{
    public $product;

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    public function mount($product_id) {
        $this->product = Product::find($product_id);
    }

    public function render()
    {
        return view('livewire.shop.products.modals.size-guide');
    }
}
