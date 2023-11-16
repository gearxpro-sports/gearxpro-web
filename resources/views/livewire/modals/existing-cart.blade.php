<div class="p-6">
    <div class="text-center">
        <h3 class="text-base font-semibold leading-6 text-gray-900">{{ __('shop.checkout.existing_cart.title') }}</h3>
        <div class="mt-2">
            <p class="text-sm text-gray-500">{!! __('shop.checkout.existing_cart.paragraph') !!}</p>
        </div>
    </div>
    <div class="mt-6 flex justify-end space-x-3">
        <x-primary-button wire:click="merge">{{ __('shop.checkout.existing_cart.merge') }}</x-primary-button>
        <x-primary-button wire:click="override">{{ __('shop.checkout.existing_cart.override') }}</x-primary-button>
    </div>
</div>
