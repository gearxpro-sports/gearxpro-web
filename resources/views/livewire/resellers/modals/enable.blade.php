<div class="p-6">
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('resellers.enable.title') }}
    </h2>

    @if($already_exist)
    <div class="mt-5 text-sm">
        <p>
            {!! __('resellers.enable.already_exist', ['country' => $already_exist->country->name]) !!}
        </p>
    </div>
    @endif

    <div class="mt-6 flex justify-end">
        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('common.cancel') }}
        </x-secondary-button>

        <x-primary-button wire:click="enable" class="ml-3">
            {{ __('resellers.enable.confirm') }}
        </x-primary-button>
    </div>
</div>
