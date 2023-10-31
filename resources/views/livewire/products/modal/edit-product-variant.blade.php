<div>
    <h3 class="py-5 px-10 bg-color-18181a text-white text-center font-bold">{{ __('products.edit.section.options.edit_variant_modal_title') }}</h3>
    <div class="p-10 pb-0">
        <x-products.product-variant-attributes class="justify-center" :productVariant="$productVariant" />
    </div>
    <div class="p-10">
        <div class="flex flex-col space-y-4">
            <div>
                <x-input wire:model="productVariantForm.sku" type="text" name="sku" label="{{ __('products.edit.section.options.sku.label') }}"></x-input>
            </div>
            <div>
                <x-input wire:model="productVariantForm.barcode" type="text" name="barcode" label="{{ __('products.edit.section.options.barcode.label') }}"></x-input>
            </div>
            <div>
                <x-input wire:model="productVariantForm.quantity" type="number" min="0" step="1" name="quantity" label="{{ __('products.edit.section.options.quantity.label') }}"></x-input>
            </div>
            <div class="col-span-3">
                <livewire:media-library
                    :model="$productVariant"
                    wire:model="productVariantForm.images"
                    collection="*"
                    multiple rules="mimes:jpeg"
                    :sortable="false"
                />
            </div>
            <x-primary-button wire:click.prevent="update" type="button">{{ __('common.update') }}</x-primary-button>
            <x-primary-button wire:click.prevent="closeModal" class="bg-color-b6b9bb" type="button">{{ __('common.close') }}</x-primary-button>
            @if(session('variantFormError'))
                <div class="flex items-center space-x-2 p-2 bg-color-fdce82 text-color-f55b3f text-xs">
                    <x-icon name="heroicon-o-exclamation-circle" class="w-5 h-5 text-color-f55b3f"></x-icon>
                    <span>{{ __('products.edit.section.options.errors.variant_form') }}</span>
                </div>
            @endif
        </div>
    </div>
</div>
