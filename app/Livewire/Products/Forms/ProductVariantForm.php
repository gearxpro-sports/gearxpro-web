<?php

namespace App\Livewire\Products\Forms;

use App\Models\ProductVariant;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProductVariantForm extends Form
{
    /**
     * @var ProductVariant|null
     */
    public ?ProductVariant $productVariant;

    /**
     * @var string|null
     */
    public ?string $barcode = '';
    
    /**
     * @var string|null
     */
    public ?string $sku = '';

    /**
     * @var integer
     */
    public int $quantity = 0;

    /**
     * @var array
     */
    protected $rules = [
        'barcode'  => 'nullable',
        'sku'      => 'nullable',
        'quantity' => 'required|numeric|gte:0',
    ];

    /**
     * @param Product $product
     */
    public function setProductVariant(ProductVariant $productVariant)
    {
        $this->productVariant = $productVariant;

        foreach (array_keys($this->rules) as $field) {
            $this->{$field} = $productVariant->{$field};
        }
    }

    public function update()
    {
        $this->validate();
        
        return $this->productVariant->update(
            $this->all()
        );
    }
}
