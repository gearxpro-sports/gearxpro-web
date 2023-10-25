<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductVariant;
use App\Livewire\Products\Forms\ProductVariantForm;

class ProductVariantItem extends Component
{   
    /**
     * @var ProductVariant
     */
    public ProductVariant $productVariant;

    /**
     * @var Product
     */
    public Product $product;

    /**
     * @var array
     */
    public array $images;

    /**
     * @var ProductVariantForm
     */
    public ProductVariantForm $productVariantForm;
    
    /**
     * @param ProductVariant $productVariant
     * @param Product $product
     * @param array $images
     */
    public function mount(ProductVariant $productVariant, Product $product, array $images)
    {
        $this->productVariant = $productVariant;
        $this->product = $product;
        $this->images = $images;
        $this->productVariantForm->setProductVariant($productVariant, $images);
    }

    public function render()
    {
        return view('livewire.products.product-variant-item');
    }

    public function update()
    {
        if ($this->productVariantForm->update()) { 
            $this->close();

            $this->dispatch('open-notification',
                title: __('notifications.titles.updating'),
                subtitle: __('notifications.products.updating.success'),
                type: 'success'
            );

        } else {
            session()->flash('variantFormError', __('products.edit.section.options.errors.variant_form'));
        }
    }

    public function close()
    {
        $this->productVariantForm->reset('barcode', 'sku', 'quantity');
    }
}
