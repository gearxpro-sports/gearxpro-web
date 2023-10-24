<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('auth.profile.delete_account.title') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('auth.profile.delete_account.subtitle') }}
        </p>
    </header>

    <x-danger-button
        x-data
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('auth.profile.delete_account.button') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form wire:submit="destroy" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('auth.profile.delete_account.modal.title') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('auth.profile.delete_account.modal.subtitle') }}
            </p>

            <div class="mt-6">
                <x-input type="password" wire:model="password" name="password" :label="__('Password')" :placeholder="__('Password')"></x-input>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('common.cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('auth.profile.delete_account.modal.button') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
