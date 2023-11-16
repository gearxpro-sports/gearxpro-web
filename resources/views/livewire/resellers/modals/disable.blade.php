<div class="p-6">
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('resellers.disable.title') }}
    </h2>

    <div class="mt-6 flex justify-end">
        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('common.cancel') }}
        </x-secondary-button>

        <x-danger-button wire:click="disable" class="ml-3">
            {{ __('resellers.disable.confirm') }}
        </x-danger-button>
    </div>
</div>
