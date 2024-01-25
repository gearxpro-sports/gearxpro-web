<x-slot name="title">
    {{ __('categories.edit.title') }}
</x-slot>

<div>
    <x-edit-language-selectors :currentLang="$currentLang" />
    <form wire:submit="update" class="bg-white p-8">
        @if ($category->parent)
            <x-primary-button class="mb-8 bg-color-38a39f"
                              href="{{ route('categories.edit', ['category' => $category->parent->id]) }}">
                {{ __('categories.edit.parent_link') }}: <span
                    class="ml-2 font-bold">{{ $category->parent->name }}</span>
            </x-primary-button>
        @endif

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="grid grid-cols-1 gap-4 space-y-3 sm:col-span-2 sm:grid-cols-2">
                <div class="col-span-2 space-y-2">
                    <x-input type="text" wire:model="categoryForm.name.{{ $currentLang }}" name="categoryForm.name.{{ $currentLang }}" label="{{ __('categories.edit.name.label') }}" required></x-input>
                    <x-textarea rows="11" wire:model="categoryForm.description.{{ $currentLang }}" name="categoryForm.description.{{ $currentLang }}" label="{{ __('categories.edit.description.label') }}"></x-textarea>
                </div>
                <hr class="col-span-2">
                <div class="col-span-2">
                    <input type="file" wire:model="image"
                           class="file:bg-gradient-to-b file:from-slate-600 file:to-black file:text-white file:px-6 file:py-3 file:bg-white file:border-none file:rounded-md file:cursor-pointer text-xs text-gray-900 border-none cursor-pointer focus:outline-none">

                    <div class="h-72 w-fit mt-3 overflow-hidden flex items-center justify-center">
                        @if ($image)
                            <img class="h-full" src="{{ $image->temporaryUrl() }}">
                        @elseif ($category->image)
                            <img class="h-full" src="{{ asset('storage/' . $category->image) }}" alt="">
                        @else
                            <img class="h-full border rounded-md" src="{{ Vite::asset('resources/images/placeholder-medium.jpg')}}" alt="">
                        @endif
                    </div>
                </div>
                <hr class="col-span-2">
                <div class="sm:col-span-2">
                    <h3 class="font-medium">{{ __('categories.edit.size_guide.title') }}</h3>
                    <p class="text-xs">{{ __('categories.edit.size_guide.subtitle') }}</p>
                    <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 2xl:grid-cols-3 gap-5">
                        @foreach(config('gearxpro.size-guide-tables') as $table)
                            <img
                                wire:click="toggleSizeGuideTable('{{$table}}')"
                                src="{{ Vite::asset('resources/images/size-guide-tables/'. $table) }}"
                                class="ring rounded-md cursor-pointer {{ in_array($table, $size_guide_tables) ? 'ring-indigo-400 hover:ring-indigo-500' : 'ring-gray-100 hover:ring-gray-300' }}"
                                alt="">
                        @endforeach
                    </div>
                </div>
            </div>
            <div>
                @if ($category->parent_id === null)
                    <div class="p-8 bg-color-f3f7f9">
                        <h3 class="mb-4 font-bold">{{ __('categories.edit.child_categories_title') }}</h3>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-end gap-2 w-full">
                                <div class="w-full">
                                    <x-select name="shipping_country" wire:model.change="existingToAdd">
                                        <x-slot:label></x-slot:label>
                                        <option value="">{{ __('categories.edit.add_existing') }}</option>
                                        @foreach($categories as $id => $name)
                                            <option wire:key="cat_{{ $id }}" value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                        <x-slot:action>
                                        <span
                                            wire:click.prevent="$dispatch('openModal', { component: 'categories.modal.add-category', arguments: { parentCategory: {{ $categoryForm->category->id }} }})"
                                            class="text-xs text-color-2cb2d1 hover:cursor-pointer">{{ __('common.create') }}</span>
                                        </x-slot:action>
                                    </x-select>
                                </div>
                                <x-primary-button wire:click="addExisting" type="button"
                                                  :disabled="!$existingToAdd">{{ __('common.add') }}</x-primary-button>
                            </div>
                        </div>
                        <div class="mt-4">
                            @foreach ($childCategories as $childCategory)
                                <div wire:key="subcat_{{ $childCategory->id }}"
                                     class="flex items-center mb-4 py-2 px-4 bg-white radius-sm shadow-shadow-1">
                                    <span class="text-color-6c757d text-xs mr-4">{{ $childCategory->id }}</span>
                                    <h4 class="text-sm font-medium">{{ $childCategory->name }}</h4>
                                    <div class="ml-auto flex items-center space-x-2">
                                        <a class="flex items-center justify-center bg-color-eff0f0 w-8 h-8 text-center rounded-sm"
                                           href="{{ route('categories.edit', ['category' => $childCategory->id]) }}">
                                            <x-icons name="edit" class="w-3 h-3"/>
                                        </a>
                                        <button type="button"
                                                class="flex items-center justify-center bg-color-e54f33 text-white w-8 h-8 text-center rounded-sm"
                                                wire:click="deleteChild({{ $childCategory->id }})"
                                                wire:confirm="{{ __('categories.alert.delete_category') }}">
                                            <x-icons name="trash" class="w-3 h-3"/>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center space-x-4 mt-5">
            <x-primary-button>
                {{ __('common.update') }}
            </x-primary-button>
            <x-danger-button type="button" wire:click="deleteParent({{ $category->id }})" wire:confirm="{{ __('categories.alert.delete_category') }}">
                {{ __('common.delete') }}
            </x-danger-button>
        </div>

    </form>
</div>
