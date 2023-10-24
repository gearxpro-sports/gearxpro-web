<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('auth.profile.update_password.title') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('auth.profile.update_password.subtitle') }}
        </p>
    </header>

    <form wire:submit="update" class="mt-6 space-y-6">
        @csrf
        <x-input type="password" wire:model="current_password" name="current_password"
                 :label="__('auth.profile.update_password.fields.current_password')"></x-input>
        <x-input type="password" wire:model="password" name="password"
                 :label="__('auth.profile.update_password.fields.new_password')"></x-input>
        <x-input type="password" wire:model="password_confirmation" name="password_confirmation"
                 :label="__('auth.profile.update_password.fields.confirm_password')"></x-input>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('common.save') }}</x-primary-button>
        </div>
    </form>
</section>
