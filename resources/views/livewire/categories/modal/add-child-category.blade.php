<div>
    <h3 class="py-5 px-10 bg-color-18181a text-white text-center font-bold">{{ __('categories.edit.child_categories_modal_title') }}</h3>
    <div class="p-10 pt-8">
        <form wire:submit="store" class="flex flex-col space-y-4">
            @csrf

            <x-input type="text" wire:model="childCategoryForm.name" name="name" label="{{ __('categories.create.name.label') }}" required></x-input>
            <x-textarea rows="10" wire:model="childCategoryForm.description" name="description" label="{{ __('categories.create.description.label') }}"></x-textarea>
            <x-primary-button>{{ __('common.create') }}</x-primary-button>
        </form>
    </div>
</div>
