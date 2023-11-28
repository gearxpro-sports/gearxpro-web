<x-slot name="title">
    {{ __('categories.edit.title') }}
</x-slot>

<div>
    <form wire:submit="update" class="bg-white p-8">
        @if ($category->parent)
            <x-primary-button class="mb-8 bg-color-38a39f"
                              href="{{ route('categories.edit', ['category' => $category->parent->id]) }}">
                {{ __('categories.edit.parent_link') }}: <span
                    class="ml-2 font-bold">{{ $category->parent->name }}</span>
            </x-primary-button>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
            <div class="flex flex-col space-y-4 col-span-1">
                <x-input type="text" wire:model="categoryForm.name" name="name" label="{{ __('categories.edit.name.label') }}" required></x-input>
                <x-textarea rows="11" wire:model="categoryForm.description" name="description" label="{{ __('categories.edit.description.label') }}"></x-textarea>
            </div>

            <div class="col-span-1 flex flex-col items-start justify-start">
                <input type="file" wire:model="image"
                class="file:bg-gradient-to-b file:from-slate-600 file:to-black file:text-white file:px-6 file:py-3 file:bg-white file:border-none file:rounded-md file:cursor-pointer text-xs text-gray-900 border-none cursor-pointer focus:outline-none">

                <div class="h-72 w-fit mt-3 overflow-hidden flex items-center justify-center">
                    @if ($image)
                        <img class="h-full" src="{{ $image->temporaryUrl() }}">
                    @elseif ($category->image)
                        <img class="h-full" src="{{ asset('storage/' . $category->image) }}" class="" alt="">
                    @else
                        <img class="h-full border rounded-md" src="{{ Vite::asset('resources/images/placeholder-medium.jpg')}}" class="" alt="">
                    @endif
                </div>
            </div>

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
                                            wire:click.prevent="$dispatch('openModal', { component: 'categories.modal.add-child-category', arguments: { category: {{ $categoryForm->category->id }} }})"
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

        <div class="flex items-center space-x-4">
            <x-primary-button>
                {{ __('common.update') }}
            </x-primary-button>
            <x-danger-button type="button" wire:click="deleteParent({{ $category->id }})" wire:confirm="{{ __('categories.alert.delete_category') }}">
                {{ __('common.delete') }}
            </x-danger-button>
        </div>

    </form>
</div>
