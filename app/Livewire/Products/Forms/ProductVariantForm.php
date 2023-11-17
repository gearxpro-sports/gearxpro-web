<?php

namespace App\Livewire\Products\Forms;

use App\Models\ProductVariant;
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
     * @var int|null
     */
    public ?int $quantity = 0;

    /**
     * @var array|null
     */
    public ?array $images = [];

    /**
     * @var array
     */
    protected $rules = [
        'barcode'  => 'nullable',
        'sku'      => 'nullable',
        'quantity' => 'required|numeric|gte:0',
        //'images'   => 'required',
    ];

    /**
     * @param ProductVariant $productVariant
     * @param array $images
     */
    public function setProductVariant(ProductVariant $productVariant, array $images)
    {
        $this->productVariant = $productVariant;

        foreach (array_keys($this->rules) as $field) {
            $this->{$field} = $productVariant->{$field};
        }

        $this->images = $images;
    }

    public function update()
    {
        $this->validate();

        $this->productVariant->update($this->only(['barcode', 'sku', 'quantity']));

        $count = 1;
        foreach($this->images as &$image) {
            $image['file_name'] = $this->productVariant->product->slug.'_'.$this->productVariant->sku.'_'.$count.'.'.$image['extension'];
            $count++;
        }

        $this->productVariant
            ->syncFromMediaLibraryRequest($this->images)
            //->usingFileName($this->productVariant->product->slug.'-'.$this->productVariant->sku)
            ->toMediaCollection('products')
        ;

        return true;
    }
}
