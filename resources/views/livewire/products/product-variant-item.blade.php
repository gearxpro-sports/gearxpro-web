<div wire:key="variant_{{ $productVariant->id}}" x-on:close-variant="edit = false" x-data="{edit: false}" wire:sortable.item="{{ $productVariant->id }}" class="p-4 border border-color-eff0f0 hover:bg-color-f7f8fa shadow-shadow-1 rounded-md" :class="!edit || 'bg-color-f7f8fa'">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <div class="flex items-center space-x-8">
                <div x-show="!edit"><button type="button" class="cursor-move" wire:sortable.handle><x-icons name="bars" class="w-4 h-4" /></button></div>
                <div>
                    <h6 class="mb-4 text-xs font-semibold">{{ $product->name }}</h6>
                    <div class="flex items-center space-x-10 text-sm font-semibold">
                        @foreach ($productVariant->attributes as $attribute)
                        <div class="flex items-center space-x-2">
                            <span class="text-color-b6b9bb">{{ $attribute->group->name }}:</span>
                            @if ($attribute->color)
                                @if (in_array($attribute->color, ['#fff', '#ffffff']))
                                <span class="inline-block h-5 w-5 rounded-full border border-color-b6b9bb bg-white"></span>   
                                @else
                                <span class="inline-block h-5 w-5 rounded-full" style="background-color: {{ $attribute->color }}"></span>
                                @endif
                            @endif
                            <span @if ($attribute->color && !in_array($attribute->color, ['#fff', '#ffffff'])) style="color: {{ $attribute->color }}" @endif>{{ $attribute->value }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center">
                @if ($productVariant->sku)
            <div class="mr-10"><small class="block text-color-6c757d">{{ __('products.edit.section.options.sku.label') }}</small><span class="text-sm font-bold">{{ $productVariant->sku }}</span></div>
            @endif
            @if ($productVariant->barcode)
            <div class="mr-10"><small class="block text-color-6c757d">{{ __('products.edit.section.options.barcode.label') }}</small><span class="text-sm font-bold">{{ $productVariant->barcode }}</span></div>
            @endif
            <div class="mr-10 text-center"><small class="block text-color-6c757d">{{ __('products.edit.section.options.quantity.label') }}</small><span class="text-sm font-bold">{{ $productVariant->quantity }}</span></div>
            <div class="flex items-center space-x-2 ml-auto">
                <button x-show="!edit" type="button" class="flex items-center justify-center bg-color-eff0f0 w-8 h-8 ml-auto text-center rounded-sm" @click="edit = true">
                    <x-icons name="edit" class="w-4 h-4" />
                </button>
                <button type="button" class="flex items-center justify-center bg-color-eff0f0 w-8 h-8 ml-auto text-center rounded-sm" wire:click="removeVariant({{ $productVariant->id }})" wire:confirm="{{ __('products.edit.section.options.alert.confirm_variant_delete') }}">
                    <x-icons name="trash" class="w-4 h-4" />
                </button>
            </div>
        </div>
    </div>
    <div x-show="edit" class="mt-4 border-t border-color-6c757d">                                     
        <div class="grid grid-cols-4 my-4">
            <div class="mr-4">
                <x-input wire:model="productVariantForm.sku" type="text" name="sku" label="{{ __('products.edit.section.options.sku.label') }}"></x-input>
            </div>
            <div class="mr-4"><x-input wire:model="productVariantForm.barcode" type="text" name="barcode" label="{{ __('products.edit.section.options.barcode.label') }}"></x-input></div>
            <div class="mr-4 w-[120px]"><x-input wire:model="productVariantForm.quantity" type="number" min="0" step="1" name="quantity" label="{{ __('products.edit.section.options.quantity.label') }}"></x-input></div>
        </div>
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3">
                <livewire:media-library 
                    :model="$productVariant"
                    wire:model="productVariantForm.images.var_{{ $productVariant->id }}"
                    collection="*"
                    multiple rules="mimes:jpeg"
                />
            </div>
        </div>
        <div class="mt-4 flex items-center space-x-4">
            <x-primary-button wire:click.prevent="update()" type="button">{{ __('common.update') }}</x-primary-button>
            <x-primary-button class="bg-color-b6b9bb" wire:click="close" type="button">{{ __('common.cancel') }}</x-primary-button>
            @if(session('variantFormError'))
            <div class="flex items-center space-x-2 p-2 bg-color-fdce82 text-color-f55b3f text-xs">
                <x-icon name="heroicon-o-exclamation-circle" class="w-5 h-5 text-color-f55b3f"></x-icon> <span>{{ __('products.edit.section.options.errors.variant_form') }}</span>
            </div>
            @endif
        </div>
    </div>
</div>