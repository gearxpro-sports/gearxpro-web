<div class="w-full flex flex-col items-center justify-center p-6 space-y-3">
    <div>
        <svg class="w-14 h-14 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
    </div>

    <h1 class="text-2xl font-semibold text-color-18181a text-center">Indica il valore di tassazione per il tuo paese</h1>

    <form wire:submit="setTax" class="flex items-end gap-5">
        <div x-data>
            <x-input x-mask="99" type="text" wire:model="tax" name="tax"
                     label="{{ __('resellers.create.tax') }}" required></x-input>
        </div>

        <div class="flex items-center justify-between">
            <x-primary-button>
                {{ __('common.save') }}
            </x-primary-button>
        </div>
    </form>
</div>
