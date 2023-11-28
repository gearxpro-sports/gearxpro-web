<x-slot name="title">
    {{ __('categories.create.title') }}
</x-slot>

<div x-data>
    <form wire:submit="save" class="bg-white p-8">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mb-4">
            <div class="flex flex-col space-y-4">
                <x-input type="text" wire:model="name" name="name" label="{{ __('categories.create.name.label') }}" required></x-input>
                <x-textarea rows="10" wire:model="description" name="description" label="{{ __('categories.create.description.label') }}"></x-textarea>
            </div>

            <div class="flex flex-col items-start justify-end">
                <input type="file" wire:model="image"
                class="file:bg-gradient-to-b file:from-slate-600 file:to-black file:text-white file:px-6 file:py-3 file:bg-white file:border-none file:rounded-md file:cursor-pointer text-xs text-gray-900 border-none cursor-pointer focus:outline-none">

                <div class="h-64 mt-3 overflow-hidden flex items-center justify-center border rounded-md">
                    @if ($image)
                        <img class="h-full" src="{{ $image->temporaryUrl() }}">
                    @else
                        <img class="h-full" src="{{ Vite::asset('resources/images/placeholder-medium.jpg')}}" class="" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <x-primary-button>
                {{ __('common.save') }}
            </x-primary-button>
        </div>
    </form>
</div>
