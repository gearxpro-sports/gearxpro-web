<div
    wire:sortable.item="{{ $productVariant->id }}"
    wire:loading.class="opacity-50"
    wire:target="removeVariant"
    class="p-4 border border-color-eff0f0 hover:bg-color-f7f8fa shadow-shadow-1 rounded-md @if ($productVariant->position === 1) bg-color-f3f7f9 @endif"
>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <div class="flex items-center space-x-8">
                <button type="button" class="cursor-move" wire:sortable.handle>
                    <x-icons name="bars" class="w-4 h-4"/>
                </button>
                <div>
                    <h6 class="mb-4 text-xs font-semibold">{{ $product->name }}</h6>
                    <x-products.product-variant-attributes :productVariant="$productVariant"/>
                </div>
            </div>
        </div>
        <div class="flex items-center">
            @if ($productVariant->sku)
                <div class="mr-10">
                    <small class="block text-color-6c757d">{{ __('products.edit.section.options.sku.label') }}</small>
                    <span class="text-sm font-bold">{{ $productVariant->sku }}</span>
                </div>
            @endif
            @if ($productVariant->barcode)
                <div class="mr-10">
                    <small class="block text-color-6c757d">{{ __('products.edit.section.options.barcode.label') }}</small>
                    <span class="text-sm font-bold">{{ $productVariant->barcode }}</span>
                </div>
            @endif
            @if ($productVariant->quantity)
            <div class="mr-10 text-center">
                <small class="block text-color-6c757d">{{ __('products.edit.section.options.quantity.label') }}</small>
                <span class="text-sm font-bold">{{ $productVariant->quantity }}</span>
            </div>
            @endif
            <div class="flex items-center space-x-2 ml-auto">
                @if($productVariant->position === 1)
                <x-badge class="mr-10 uppercase" color="black">{{ __('common.default') }}</x-badge>
                @endif
                <button type="button"
                        class="flex items-center justify-center bg-color-eff0f0 w-8 h-8 ml-auto text-center rounded-sm"
                        wire:click="$dispatch('openModal', {component: 'products.modal.edit-product-variant', arguments: {productVariant: {{ $productVariant->id }}}})"
                >
                    <x-icons name="edit" class="w-4 h-4"/>
                </button>
                <button type="button"
                        class="flex items-center justify-center bg-color-e54f33 text-white w-8 h-8 ml-auto text-center rounded-sm"
                        wire:click="removeVariant"
                        wire:confirm="{{ __('products.edit.section.options.alert.confirm_variant_delete') }}">
                    <x-icons name="trash" class="w-4 h-4"/>
                </button>
            </div>
        </div>
    </div>
</div>
