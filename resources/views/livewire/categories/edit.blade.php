<x-slot name="title">
    {{ __('categories.edit.title') }}
</x-slot>

<div>
    <form wire:submit="update" class="bg-white p-8">
        @if ($category->parent)
            <x-primary-button class="mb-8 bg-color-38a39f" href="{{ route('categories.edit', ['category' => $category->parent->id]) }}">
            {{ __('categories.edit.parent_link') }}: <span class="ml-2 font-bold">{{ $category->parent->name }}</span>
            </x-primary-button>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
            <div class="flex flex-col space-y-4 col-span-2">
                <x-input type="text" wire:model="categoryForm.name" name="name" label="{{ __('categories.edit.name.label') }}" required></x-input>
                <x-textarea rows="10" wire:model="categoryForm.description" name="description" label="{{ __('categories.edit.description.label') }}"></x-textarea>
            </div>
            <div class="p-8 bg-color-f3f7f9">
                <h3 class="mb-4 font-bold">{{ __('categories.edit.child_categories_title') }}</h3>
                @foreach ($childCategories as $childCategory)
                <div wire:key="subcat_{{ $childCategory->id }}" class="flex items-center mb-4 py-2 px-4 bg-white radius-sm shadow-shadow-1">
                    <h4 class="text-sm font-medium">{{ $childCategory->name }}</h4>
                    <div class="ml-auto flex items-center space-x-2">
                        <a class="flex items-center justify-center bg-color-eff0f0 w-8 h-8 text-center rounded-sm" href="{{ route('categories.edit', ['category' => $childCategory->id]) }}">
                            <x-icons name="edit" class="w-3 h-3" />
                        </a>
                        <button type="button" class="flex items-center justify-center bg-color-e54f33 text-white w-8 h-8 text-center rounded-sm" wire:click="deleteChild({{ $childCategory->id }})" wire:confirm="{{ __('categories.alert.delete_category') }}">
                            <x-icons name="trash" class="w-3 h-3" />
                        </button>
                    </div>
                </div>
                @endforeach
                <x-primary-button type="button" wire:click.prevent="$dispatch('openModal', { component: 'categories.modal.add-child-category', arguments: { category: {{ $categoryForm->category->id }} }})">{{ __('common.create') }}</x-primary-button>
            </div>
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
