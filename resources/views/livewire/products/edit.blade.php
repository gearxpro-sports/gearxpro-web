@php
    $tabs = ['main', 'options', 'locale'];
    $descFields = ['main', 'features', 'pros', 'technical', 'washing'];
@endphp

<x-slot name="title">
    <span class="text-color-6c757d mr-2">{{ __('products.edit.title') }}:</span> {{ $product->name }}
</x-slot>

<div x-data="{openedTab: '{{ $tabs[0] }}'}" x-on:list-updated="window.scrollTo(0, document.body.scrollHeight)">
    <form wire:submit="save" class="bg-white p-4">
        <div class="p-8">
            <ul class="grid grid-cols-5 gap">
            @foreach($tabs as $tab)
                <li><button @click="openedTab = '{{ $tab }}'" type="button" class="block w-full py-3.5 px-7 text-center text-sm font-bold" :class="openedTab === '{{ $tab }}' && 'bg-color-eff0f0 text-color-18181a'" wire:key="tab_{{ $tab }}">{{ __('products.edit.tabs.'.$tab) }}</button></li>
            @endforeach
            </ul>
            <div class="p-8 border border-color-eff0f0">

                <!-- Main Tab -->
                <div x-show="openedTab === 'main'">
                    <div class="grid grid-cols-4 gap-16">
                        <div class="flex flex-col space-y-4 col-span-3">
                            <x-input type="text" wire:model.change="productForm.name" name="name" label="{{ __('products.edit.section.main.name.label') }}" required></x-input>
                            <x-input type="text" wire:model.change="productForm.slug" name="slug" label="{{ __('products.edit.section.main.slug.label') }}" class="text-color-6c757d" required>
                                <x-slot:action>
                                    <button type="button" wire:click="updateSlug()" class="ml-auto text-color-18181a underline hover:no-underline" tabindex="-1">{{ __('products.edit.section.main.slug.action') }}</button>
                                </x-slot:action>
                            </x-input>
                            <div x-data="{openedDescTab: '{{ $descFields[0] }}'}">
                                <div class="mb-2 text-xs">{{ __('products.edit.section.main.descriptons_label') }}</div>
                                <ul class="flex flex-row space-x-4 border border-color-eff0f0">
                                    @foreach($descFields as $descField)
                                        <li wire:key="tab_desc_{{ $descField }}" class="border-color-eff0f0">
                                            <button @click="openedDescTab = '{{ $descField }}'" :class="openedDescTab === '{{ $descField }}' && 'bg-color-18181a text-color-eff0f0'" type="button" class="block w-full py-2.5 px-5 text-center text-xs font-bold">
                                                {{ __('products.edit.tabs.'. $descField .'_desc') }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                                @foreach($descFields as $descField)
                                <div wire:key="desc_{{ $descField }}" class="p-8 border border-color-eff0f0 border-t-0" x-show="openedDescTab === '{{ $descField }}'">
                                    <x-rich-textarea wire:model="productForm.{{ $descField }}_desc" name="product.{{ $descField }}_desc" placeholder="{{ __('products.edit.section.main.'. $descField .'_desc.placeholder') }}"></x-rich-textarea>
                                </div>
                                @endforeach
                            </div>
                            <x-input type="text" wire:model.change="productForm.meta_title" name="meta_title" label="{{ __('products.edit.section.main.meta_title.label') }}"></x-input>
                            <x-input type="text" wire:model.change="productForm.meta_description" name="meta_description" label="{{ __('products.edit.section.main.meta_description.label') }}"></x-input>
                        </div>
                        <div>
                            @if ($categories->count())
                                <h3 class="mb-4 font-bold">{{ __('products.edit.categories_title') }}</h3>
                                <x-category-tree :categories="$categories" />
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Options Tab -->
                <div x-show="openedTab === 'options'">

                    <div>
{{--                        <div class="my-4">--}}
{{--                            <div class="flex items-center justify-end space-x-4">--}}
{{--                                <h4 class="text-sm font-medium">Prodotto semplice</h4>--}}
{{--                                <label class="inline-flex text-xs font-bold uppercase cursor-pointer"><input wire:model.change="simple_product" type="radio" name="simple_product" value="0" class="mr-2">{{ __('common.no') }}</label>--}}
{{--                                <label class="inline-flex text-xs font-bold uppercase cursor-pointer"><input wire:model.change="simple_product" type="radio" name="simple_product" value="1" class="mr-2">{{ __('common.yes') }}</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @if ($simple_product)--}}
{{--                        <div class="grid grid-cols-4 gap-4">--}}
{{--                            <x-input type="text" name="sku" label="{{ __('products.edit.section.options.sku.label') }}"></x-input>--}}
{{--                            <x-input type="number" min="0" step="1" name="quantity" label="{{ __('products.edit.section.options.quantity.label') }}"></x-input>--}}
{{--                        </div>--}}
{{--                        @else--}}
                        <div class="flex flex-col space-y-4">
                            <div>
                                <div
                                    x-data="{
                                        selectedTerms: {},
                                        updateTerms(attributeId, terms) {
                                            if (terms.length > 0) {
                                                this.selectedTerms[attributeId] = terms;
                                            } else {
                                                delete this.selectedTerms[attributeId];
                                            }
                                        }}"
                                    @call-update-terms="updateTerms($event.detail[0], $event.detail[1])"
                                >
                                    <h4 class="mb-5 font-bold text-lg">{{ __('products.edit.section.options.attributes_title') }}</h4>
                                    <div class="grid grid-cols-3 gap-4 mb-5 pb-5 border-b border-color-eff0f0">
                                        @foreach($productAttributesList as $attributeId => $attribute)
                                        <div x-data="{
                                            selectedValues: [],
                                            addSelected() {
                                                $dispatch('call-update-terms', [{{ $attributeId }}, this.selectedValues])
                                            },
                                            selectAll() {
                                                this.selectedValues = {{ json_encode(array_keys($attribute['terms'])) }};
                                                $nextTick(this.addSelected());
                                            },
                                        }">
                                            <x-select x-model="selectedValues" @change="addSelected" class="h-40 mb-5 min-height-full" multiple name="group_{{ $attributeId }}" label="{{ $attribute['name'] }}">
                                            @foreach($attribute['terms'] as $termId => $termData)
                                                <option :key="{{ $termId }}" value="{{ $termId }}">{{ $termData['value'] }}</option>
                                            @endforeach
                                            </x-select>
                                            <x-primary-button type="button" @click="selectAll">{{ __('common.select_all') }}</x-primary-button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <x-primary-button x-bind:disabled="!Object.keys(selectedTerms).length" wire:click="generateVariants(selectedTerms)" class="h-12 !text-base bg-color-0c9d87" type="button">{{ __('products.edit.section.options.generate_variants') }}</x-primary-button>
                                </div>
                                @if ($productVariants->count())
                                <h3 class="mt-10 font-bold text-lg">{{ __('products.edit.section.options.product_variants_title') }}</h3>
                                <div wire:sortable="updateProductVariantOrder" wire:sortable.options="{ animation: 100 }" class="flex flex-col space-y-4 mt-5">
                                    @foreach($productVariants as $index => $productVariant)
                                        <livewire:products.product-variant-item :images="$images" :productVariant="$productVariant" :product="$product" wire:key="product_variant_{{ $productVariant->id }}" />
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
{{--                        @endif--}}
                    </div>
                </div>

                <!-- Locale Tab -->
                <div x-show="openedTab === 'locale'">
                    <div class="flex flex-col space-y-4">
                    @foreach($countriesAvailable as $country)
                        <div wire:key="country_{{ $country['id'] }}">
                            <h4 class="mb-4 font-bold"><img class="inline-block w-5 mr-2" src="https://flagcdn.com/w320/{{ $country['iso'] }}.png" alt="{{ $country['iso'] }}">{{ $country['name'] }}</h4>
                            <div class="grid grid-cols-4 gap-4">
                                <x-input x-mask:dynamic="$money($input)" wire:model.blur="productForm.country_prices.{{ $country['id'] }}.wholesale_price" type="text" name="wholesale_price[]" label="{{ __('products.edit.section.locale.wholesale_price.label') }}">
                                    <x-slot:append>
                                        <span class="search-btn absolute z-[1] inset-y-1 right-1 flex items-center justify-center w-9 bg-color-eff0f0 rounded-sm font-bold text-color-6c757d">€</span>
                                    </x-slot:append>
                                </x-input>
                                <x-input x-mask:dynamic="$money($input)" wire:model.blur="productForm.country_prices.{{ $country['id'] }}.price" type="text" name="price[]" label="{{ __('products.edit.section.locale.price.label') }}">
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
        <div class="p-8">
            <x-primary-button >{{ __('common.update') }}</x-primary-button>
        </div>
    </form>
</div>

{{-- Moved Spatie Media Library here because in modal not working --}}
@push('scripts')

    <script>
        window.initDropZone = function({ _this, rules, multiple, uploadError }) {
            const isValid = true;

            const hasDragObject = false;
            const isDropTarget = false;
            const uploadProgress = 0;

            const { ruleHelpText, fileTypeRules } = buildRuleHelpText(rules, undefined, multiple);

            function getFileTypeIsAllowed(fileType) {
                let checkType = fileType;

                if (checkType.includes('/')) {
                    checkType = checkType.split('/')[1];
                }

                if (!fileTypeRules.length) {
                    return true;
                }

                if (fileTypeRules.includes(checkType)) {
                    return true;
                }

                if (fileTypeRules.some((acceptType) => acceptType.endsWith('*') && checkType.includes(acceptType.replace('*', '')))) {
                    return true;
                }

                return false;
            }

            function handleDocumentDragenter(e) {
                e.preventDefault();
                this.hasDragObject = true;

                if (!e.dataTransfer.items || !e.dataTransfer.items.length) {
                    return this.isValid = true;
                }

                if (!fileTypeRules || !fileTypeRules.length) {
                    return this.isValid = true;
                }

                this.isValid = Array.from(e.dataTransfer.items).every((item) => {
                    return getFileTypeIsAllowed(item.type);
                })
            }

            function handleDocumentDragleave(e) {
                if (!e.clientX && !e.clientY) {
                    e.preventDefault();
                    this.hasDragObject = false;
                    this.isValid = true;
                }
            }

            function handleDocumentDrop(e) {
                e.preventDefault();
                this.hasDragObject = false;
                this.isValid = true;
            }

            function handleDocumentDragOver(e, element) {
                e.preventDefault();
                const overElement = element.contains(e.target);

                if (!overElement) {
                    return (this.isDropTarget = false);
                }

                this.isDropTarget = true;
            }

            function handleDrop(e) {
                e.preventDefault();

                this.isValid = true;

                const files = multiple ? e.dataTransfer.files : e.dataTransfer.files[0];

                const myArguments = ['upload', files, (uploadedFilename) => {
                    this.uploadCompletedSuccessfully();
                }, (error) => {
                    // Error callback
                    console.log('upload error', error);
                }, (event) => {
                    this.uploadProgress = event.detail.progress;
                }];

                multiple ? _this.uploadMultiple(...myArguments) : _this.upload(...myArguments);
            }

            function uploadCompletedSuccessfully() {
                if (uploadError) {
                    this.uploadError = uploadError;

                    return;
                }
            }

            return {
                hasDragObject,
                isDropTarget,
                isValid,
                handleDrop,
                handleDocumentDragenter,
                handleDocumentDragleave,
                handleDocumentDrop,
                handleDocumentDragOver,
                uploadProgress,
                uploadCompletedSuccessfully,
                ruleHelpText,
                uploadError,
            }
        }

        function addToRuleHelpText(ruleHelpText, newRule) {
            if (!newRule) {
                return ruleHelpText;
            }

            return `${ruleHelpText ? ruleHelpText + ' | ' : ''}${newRule}`;
        }

        function buildRuleHelpText(rules = '', maxItems, multiple) {
            let fileTypeRules = [];
            let fileSizeRules = { min: '', max: '' };

            rules.toString().split('|').forEach(rule => {
                const [ruleName, ruleValue] = rule.split(':');

                if (ruleName === 'mimes') {
                    fileTypeRules = ruleValue.split(',');
                }

                if (ruleName === 'max') {
                    fileSizeRules.max = ruleValue;
                }

                if (ruleName === 'min') {
                    fileSizeRules.min = ruleValue;
                }
            });

            let ruleHelpText = '';

            ruleHelpText = addToRuleHelpText(ruleHelpText, multiple ? '{{ __('Select or drag files') }}' : '{{  __('Select or drag a file') }}');

            if (fileTypeRules) {
                const amountOfRules = fileTypeRules.length;

                ruleHelpText = addToRuleHelpText(
                    ruleHelpText,
                    fileTypeRules.reduce((ruleHelpText, rule, i) => {
                        const joiner = i === amountOfRules - 1 ? '' : ', ';

                        ruleHelpText += rule.toUpperCase() + joiner;

                        return ruleHelpText;
                    }, '')
                );
            }

            if (fileSizeRules.min) {
                const minSizeString =
                    fileSizeRules.min > 1024 ? (fileSizeRules.min / 1024).toFixed(2) + 'MB' : fileSizeRules.min + 'KB';
                ruleHelpText = addToRuleHelpText(ruleHelpText, `> ${minSizeString}`);
            }

            if (fileSizeRules.max) {
                const maxSizeString =
                    fileSizeRules.max > 1024 ? (fileSizeRules.max / 1024).toFixed(2) + 'MB' : fileSizeRules.max + 'KB';
                ruleHelpText = addToRuleHelpText(ruleHelpText, `< ${maxSizeString}`);
            }

            return { ruleHelpText, fileTypeRules };
        }
    </script>

@endpush
