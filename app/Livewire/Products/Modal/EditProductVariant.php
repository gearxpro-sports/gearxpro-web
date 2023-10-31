<?php

namespace App\Livewire\Products\Modal;

use App\Livewire\Products\Forms\ProductVariantForm;
use App\Models\ProductVariant;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class EditProductVariant extends ModalComponent
{
    /**
     * @var ProductVariant
     */
    public ProductVariant $productVariant;

    /**
     * @var ProductVariantForm
     */
    public ProductVariantForm $productVariantForm;

    /**
     * @var array
     */
    public array $images = [];

    public function mount()
    {
        $this->productVariantForm->setProductVariant($this->productVariant, $this->images);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.products.modal.edit-product-variant');
    }

    public function update()
    {
        if ($this->productVariantForm->update()) {

            $this->closeModal();

            $this->dispatch('open-notification',
                title: __('notifications.titles.updating'),
                subtitle: __('notifications.products.updating.success'),
                type: 'success'
            );

            $this->dispatch('refresh-variant');

        } else {
            session()->flash('variantFormError', __('products.edit.section.options.errors.variant_form'));
        }
    }

    /**
     * @return bool
     */
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    /**
     * @return string
     */
    public static function modalMaxWidth(): string
    {
        return '4xl';
    }
}
