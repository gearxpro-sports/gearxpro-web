@php
    $tabs = ['main', 'options', 'images', 'locale'];
    $descFields = ['main', 'features', 'pros', 'technical', 'washing'];
@endphp

<x-slot name="title">
    {{ __('products.edit.title') }}
</x-slot>
<x-slot name="actions">
    <x-primary-button>{{ __('common.save') }}</x-primary-button>
</x-slot>

<div x-data="{openedTab: '{{ $tabs[0] }}'}" x-on:list-updated="window.scrollTo(0, document.body.scrollHeight)">
    <form wire:submit="save" class="bg-white space-y-10 p-4">
        <div class="grid grid-cols-3 gap-4">
            <div class="p-8 col-span-2">
                <ul class="grid grid-cols-5 gap">
                @foreach($tabs as $tab)
                    <li><button @click="openedTab = '{{ $tab }}'" type="button" class="block w-full py-3.5 px-7 text-center text-sm font-bold" :class="openedTab === '{{ $tab }}' && 'bg-color-eff0f0 text-color-18181a'" wire:key="{{ $tab }}">{{ __('products.edit.tabs.'.$tab) }}</button></li>
                @endforeach
                </ul>
                <div class="p-8 border border-color-eff0f0">

                    <!-- Main Tab -->
                    <div x-show="openedTab === 'main'">
                        <div class="flex flex-col space-y-4">
                            <x-input type="text" wire:model.change="productForm.name" name="name" label="{{ __('products.edit.section.main.name.label') }}" required></x-input>
                            <x-input type="text" wire:model.change="productForm.slug" name="slug" label="{{ __('products.edit.section.main.slug.label') }}" class="text-color-6c757d" required>
                                <x-slot:action>
                                    <button type="button" wire:click="updateSlug()" class="ml-auto text-color-18181a underline hover:no-underline" tabindex="-1">{{ __('products.edit.section.main.slug.action') }}</a>
                                </x-slot:action>
                            </x-input>
                            <div x-data="{openedDescTab: '{{ $descFields[0] }}'}">
                                <div class="mb-2 text-xs">{{ __('products.edit.section.main.descriptons_label') }}</div>
                                <ul class="flex flex-row space-x-4 border border-color-eff0f0">
                                    @foreach($descFields as $descField)
                                        <li class="border-color-eff0f0">
                                            <button @click="openedDescTab = '{{ $descField }}'" :class="openedDescTab === '{{ $descField }}' && 'bg-color-18181a text-color-eff0f0'" type="button" class="block w-full py-2.5 px-5 text-center text-xs font-bold">
                                                {{ __('products.edit.tabs.'. $descField .'_desc') }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                                @foreach($descFields as $descField)
                                <div class="p-8 border border-color-eff0f0 border-t-0" x-show="openedDescTab === '{{ $descField }}'">
                                    <x-rich-textarea wire:model="productForm.{{ $descField }}_desc" name="product.{{ $descField }}_desc" placeholder="{{ __('products.edit.section.main.'. $descField .'_desc.placeholder') }}"></x-rich-textarea>
                                </div>
                                @endforeach
                            </div>
                            <x-input type="text" wire:model.change="productForm.meta_title" name="meta_title" label="{{ __('products.edit.section.main.meta_title.label') }}"></x-input>
                            <x-input type="text" wire:model.change="productForm.meta_description" name="meta_description" label="{{ __('products.edit.section.main.meta_description.label') }}"></x-input>
                        </div>
                    </div>

                    <!-- Options Tab -->
                    <div x-show="openedTab === 'options'">

                        <div>
                            <div class="my-4">
                                <div class="flex items-center justify-end space-x-4">
                                    <h4 class="text-sm font-medium">Prodotto semplice</h4>
                                    <label class="inline-flex text-xs font-bold uppercase cursor-pointer"><input wire:model.change="simple_product" type="radio" name="simple_product" value="0" class="mr-2">{{ __('common.no') }}</label>
                                    <label class="inline-flex text-xs font-bold uppercase cursor-pointer"><input wire:model.change="simple_product" type="radio" name="simple_product" value="1" class="mr-2">{{ __('common.yes') }}</label>
                                </div>
                            </div>
                            @if ($simple_product)
                            <div class="grid grid-cols-4 gap-4">
                                <x-input type="text" name="sku" label="{{ __('products.edit.section.options.sku.label') }}"></x-input>
                                <x-input type="number" min="0" step="1" name="quantity" label="{{ __('products.edit.section.options.quantity.label') }}"></x-input>
                            </div>
                            @else
                            <div class="flex flex-col space-y-4">
                                <div>
                                    <div 
                                        x-data="{ 
                                            selectedAttributes: {},
                                            updateAttributes(groupId, attributes) {
                                                if (attributes.length > 0) {
                                                    this.selectedAttributes[groupId] = attributes;
                                                } else {
                                                    delete this.selectedAttributes[groupId];
                                                }
                                            }}"
                                        @call-update-attributes="updateAttributes($event.detail[0], $event.detail[1])"
                                    >
                                        <h4 class="mb-5 font-bold">Attributi</h4>
                                        <div class="grid grid-cols-3 gap-4 mb-5 pb-5 border-b border-color-eff0f0">
                                            @foreach($productGroupAttributesList as $groupId => $group)
                                            <div x-data="{
                                                selectedValues: [],
                                                addSelected() {
                                                    $dispatch('call-update-attributes', [{{ $groupId }}, this.selectedValues])
                                                },
                                                selectAll() {
                                                    this.selectedValues = {{ json_encode(array_keys($group['attributes'])) }};
                                                    $nextTick(this.addSelected());
                                                },
                                            }">
                                                <x-select x-model="selectedValues" @change="addSelected" class="h-40 mb-5 min-height-full" multiple name="group_{{ $groupId }}" label="{{ $group['name'] }}">  
                                                @foreach($group['attributes'] as $attrId => $attrData)
                                                    <option :key="{{ $attrId }}" value="{{ $attrId }}">{{ $attrData['value'] }}</option>
                                                @endforeach
                                                </x-select>
                                                <x-primary-button type="button" @click="selectAll">{{ __('common.select_all') }}</x-primary-button>
                                            </div>
                                            @endforeach
                                        </div>
                                        <x-primary-button x-bind:disabled="!Object.keys(selectedAttributes).length" wire:click="generateVariants(selectedAttributes)" class="h-12 !text-base bg-color-0c9d87" type="button">{{ __('products.edit.section.options.generate_variants') }}</x-primary-button>
                                    </div>
                                    @if ($productVariants->count())
                                    <div wire:sortable="updateProductVariantOrder" wire:sortable.options="{ animation: 100 }" class="flex flex-col space-y-4 mt-5">
                                        @foreach($productVariants as $productVariant)
                                            <div wire:sortable.item="{{ $productVariant->id }}" wire:key="{{ $productVariant->id }}" class="p-4 border border-color-eff0f0 hover:bg-color-f7f8fa shadow-shadow-1 rounded-md @if($editProductVariant === $productVariant->id) bg-color-f7f8fa @endif">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <div>
                                                        <div class="flex items-center space-x-8">
                                                            @if (!$editProductVariant)
                                                                <div><button type="button" class="cursor-move" wire:sortable.handle><x-icons name="bars" class="w-4 h-4" /></button></div>
                                                            @endif
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
                                                            @if ($editProductVariant !== $productVariant->id)
                                                            <button type="button" class="flex items-center justify-center bg-color-eff0f0 w-8 h-8 ml-auto text-center rounded-sm" wire:click="editVariant({{ $productVariant->id }})">
                                                                <x-icons name="edit" class="w-4 h-4" />
                                                            </button>
                                                            @endif
                                                            <button type="button" class="flex items-center justify-center bg-color-eff0f0 w-8 h-8 ml-auto text-center rounded-sm" wire:click="removeVariant({{ $productVariant->id }})" wire:confirm="{{ __('products.edit.section.options.alert.confirm_variant_delete') }}">
                                                                <x-icons name="trash" class="w-4 h-4" />
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($editProductVariant === $productVariant->id)
                                                    <div class="mt-4 border-t border-color-6c757d">                                     
                                                        <div class="grid grid-cols-4 my-4">
                                                            <div class="mr-4">
                                                                <x-input wire:model="productVariantForm.sku" type="text" name="sku" label="{{ __('products.edit.section.options.sku.label') }}"></x-input>
                                                            </div>
                                                            <div class="mr-4"><x-input wire:model="productVariantForm.barcode" type="text" name="barcode" label="{{ __('products.edit.section.options.barcode.label') }}"></x-input></div>
                                                            <div class="mr-4 w-[120px]"><x-input wire:model="productVariantForm.quantity" type="number" min="0" step="1" name="quantity" label="{{ __('products.edit.section.options.quantity.label') }}"></x-input></div>
                                                        </div>
                                                        <div class="flex items-center space-x-4">
                                                            <x-primary-button wire:click.prevent="updateVariant()" type="button">{{ __('common.update') }}</x-primary-button>
                                                            <x-primary-button class="bg-color-b6b9bb" wire:click="closeProductVariantForm" type="button">{{ __('common.cancel') }}</x-primary-button>
                                                            @if(session('variantFormError'))
                                                            <div class="flex items-center space-x-2 p-2 bg-color-fdce82 text-color-f55b3f text-xs">
                                                                <x-icon name="heroicon-o-exclamation-circle" class="w-5 h-5 text-color-f55b3f"></x-icon> <span>{{ __('products.edit.section.options.errors.variant_form') }}</span>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Images Tab -->
                    <div x-show="openedTab === 'images'">
                        {{--
                        <div class="grid grid-cols-3 gap-8">
                            <div>
                                <livewire:media-library wire:model="images" multiple rules="mimes:jpeg,png" />
                                <x-primary-button wire:click.prevent="saveImages()" type="button">{{ __('common.save') }}</x-primary-button>
                            </div>
                            <div class="col-span-2">
                                @if (count($medias))
                                <div class="grid grid-cols-4 gap-4">
                                @foreach($medias as $media)
                                    <div class="p-2 shadow-shadow-2 border border-color-dee2e6">
                                        <img src="{{ $media->preview_url }}" alt="">
                                        <ul class="mt-2 text-xs text-color-6c757d">
                                            <li>{{ $media->file_name }}</li>
                                            <li>{{ $media->extension }}</li>
                                        </ul>
                                        <a href="#" wire:click.prevent="removeImage('{{ $media->uuid }}')">Rimuovi</a>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        --}}
                    </div>

                    <!-- Locale Tab -->
                    <div x-show="openedTab === 'locale'">
                        <div class="flex flex-col space-y-4">
                        @foreach($countriesAvailable as $country)
                            <div>
                                <h4 class="mb-4 font-bold"><img class="inline-block w-5 mr-2" src="https://flagcdn.com/w320/{{ $country['iso'] }}.png" alt="{{ $country['iso'] }}">{{ $country['name'] }}</h4>
                                <div class="grid grid-cols-4 gap-4">
                                    <x-input x-mask:dynamic="$money($input, ',', ' ')" type="text" name="wholesale_price[]" label="{{ __('products.edit.section.locale.wholesale_price.label') }}">
                                        <x-slot:append>
                                            <span class="search-btn absolute z-[1] inset-y-1 right-1 flex items-center justify-center w-9 bg-color-eff0f0 rounded-sm font-bold text-color-6c757d">€</span>
                                        </x-slot:append>
                                    </x-input>
                                    <x-input x-mask:dynamic="$money($input, ',', ' ')" type="text" name="price[]" label="{{ __('products.edit.section.locale.price.label') }}">
                                        <x-slot:append>
                                            <span class="search-btn absolute z-[1] inset-y-1 right-1 flex items-center justify-center w-9 bg-color-eff0f0 rounded-sm font-bold text-color-6c757d">€</span>
                                        </x-slot:append>
                                    </x-input>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
