<x-slot name="title">
    {{ __('categories.create.title') }}
</x-slot>

<div x-data>
    <form wire:submit="save" class="bg-white p-8">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
            <div class="flex flex-col space-y-4">
                <x-input type="text" wire:model="name" name="name" label="{{ __('categories.create.name.label') }}" required></x-input>
                <x-textarea rows="10" wire:model="description" name="description" label="{{ __('categories.create.description.label') }}"></x-textarea>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <x-primary-button>
                {{ __('common.save') }}
            </x-primary-button>
        </div>
    </form>
</div>
