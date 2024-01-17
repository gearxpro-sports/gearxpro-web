<div class="p-6">
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('stocks.modals.edit-quantity.title') }}
    </h2>
    <div class="mt-5">
        <x-input type="number" wire:model="stock.quantity" />
    </div>
    <div class="mt-6 flex justify-end">
        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('common.cancel') }}
        </x-secondary-button>

        <x-primary-button wire:click="update" class="ml-3">
            {{ __('stocks.modals.edit-quantity.update') }}
        </x-primary-button>
    </div>
</div>
