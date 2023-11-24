<div class="w-full flex flex-col items-center justify-center p-8 space-y-4">
    <div>
        <svg class="w-14 h-14 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
    </div>

    <h2 class="text-2xl font-semibold text-color-18181a text-center">{{ __('resellers.missing_data_modal.title') }}</h2>
    <p>{{ __('resellers.missing_data_modal.intro') }}</p>

    @dump($tax, $stripePublicKey, $stripePrivateKey)
    {{ $errors }}
    <form wire:submit.prevent="save" class="flex flex-col space-y-4 w-full">
        @csrf
        @if (!$tax)
        <fieldset class="flex flex-col space-y-2">
            <legend class="text-sm font-bold text-color-6c757d">{{ __('common.taxation') }}</legend>
            <div x-data class="w-1/3">
                <x-input x-mask="99" type="text" wire:model="tax" name="tax" label="{{ __('resellers.create.tax.label') }}"></x-input>
            </div>
        </fieldset>
        @endif
        @if (!$stripePublicKey || !$stripePrivateKey)
        <fieldset class="flex flex-col space-y-2">
            <legend class="text-sm font-bold text-color-6c757d">{{ __('payment_methods.stripe') }}</legend>
            @if (!$stripePublicKey)
            <x-input type="text" wire:model="stripePublicKey" name="stripePublicKey" label="{{ __('resellers.create.stripe_public_key.label') }}"></x-input>
            @endif
            @if (!$stripePrivateKey)
            <x-input type="text" wire:model="stripePrivateKey" name="stripePrivateKey" label="{{ __('resellers.create.stripe_private_key.label') }}"></x-input>
            @endif
        </fieldset>
        @endif
        <div class="flex items-center justify-between">
            <x-primary-button>
                {{ __('common.save') }}
            </x-primary-button>
        </div>
    </form>
</div>
