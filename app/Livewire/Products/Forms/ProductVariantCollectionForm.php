<?php

namespace App\Livewire\Products\Forms;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProductVariantCollectionForm extends Form
{
    /**
     * @var Collection
     */
    public ?Collection $productVariantCollection;

    /**
     * @param Collection $productVariantCollection
     */
    public function setProductVariantCollection(Collection $productVariantCollection)
    {
        $this->productVariantCollection = $productVariantCollection;

        // foreach ($productVariantCollection as $productVariantItem) {
        //     $productVariantForm = new ProductVariantForm($this->getComponent(), $this->getPropertyName());
        //     $productVariantForm->setProductVariant($productVariantItem);
        //     $this->productVariantCollection->push($productVariantForm);
        // }
    }
}
