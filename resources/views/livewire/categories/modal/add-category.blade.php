<div>
    <h3 class="py-5 px-10 bg-color-18181a text-white text-center font-bold">{{ __($parentCategory ? 'categories.edit.child_categories_modal_title' : 'categories.create.title') }}</h3>
    <div class="p-10">
        <form x-data="{submitDisabled: @entangle('submitDisabled')}" wire:submit="save" class="flex flex-col">
            @csrf
            <x-input class="mb-5" type="text" wire:model.blur="name" name="name" label="{{ __('categories.create.name.label') }}" required></x-input>
            <x-primary-button x-on:click="submitDisabled = true" :disabled="$submitDisabled">{{ __('common.create') }}</x-primary-button>
        </form>
    </div>
</div>
