<x-slot name="title">
    {{ __('Profile') }}
</x-slot>
<div class="space-y-6">
    <div x-data>
        <form wire:submit="save" class="bg-white rounded-lg space-y-10 p-4 sm:p-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <h3 class="col-span-1 sm:col-span-2">{{ __('resellers.create.titles.general_data') }}</h3>
                <x-input type="text" wire:model="reseller.firstname" name="firstname"
                         label="{{ __('resellers.create.firstname.label') }}" required></x-input>
                <x-input type="text" wire:model="reseller.lastname" name="lastname"
                         label="{{ __('resellers.create.lastname.label') }}" required></x-input>
                <x-input type="email" wire:model="reseller.email" name="email" label="{{ __('resellers.create.email.label') }}"
                         required></x-input>
                <x-input type="text" wire:model="billing_address.company" name="company" label="{{ __('resellers.create.company.label') }}"
                         required></x-input>
                <x-input x-mask="{{ __('masks.phone') }}" type="text" wire:model="reseller.phone" name="phone"
                         label="{{ __('resellers.create.phone.label') }}"
                         required></x-input>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <h3 class="col-span-1 sm:col-span-2">{{ __('resellers.create.titles.billing_data') }}</h3>
                <x-input type="text" wire:model="billing_address.address_1" name="billing_address"
                         label="{{ __('resellers.create.address.label') }}" required></x-input>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <x-input type="text" wire:model="billing_address.city" name="billing_city"
                             label="{{ __('resellers.create.city.label') }}" required></x-input>
                    <x-input x-mask="{{ __('masks.postcode') }}" type="text" wire:model="billing_address.postcode"
                             name="billing_postcode"
                             label="{{ __('resellers.create.postcode.label') }}" required></x-input>
                </div>
                <x-select wire:model="billing_address.country_id" name="billing_country"
                          label="{{ __('resellers.create.country.label') }}" required>
                    <option value="">{{ __('common.select') }}</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </x-select>
                <x-input x-mask="{{ __('masks.phone') }}" type="text" wire:model="billing_address.phone" name="billing_phone"
                         label="{{ __('resellers.create.phone.label') }}" required></x-input>
                <x-input type="text" wire:model="billing_address.vat_number" name="billing_vat_number"
                         label="{{ __('resellers.create.vat_number.label') }}" required></x-input>
                <x-input class="uppercase" type="text" x-mask="{{ __('masks.tax_code') }}" wire:model="billing_address.tax_code"
                         name="billing_tax_code"
                         label="{{ __('resellers.create.tax_code.label') }}" required></x-input>
                <x-input type="text" wire:model="billing_address.sdi" name="billing_sdi"
                         label="{{ __('resellers.create.sdi.label') }}"></x-input>
                <x-input type="text" wire:model="billing_address.pec" name="billing_pec"
                         label="{{ __('resellers.create.pec.label') }}"></x-input>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="col-span-1 flex items-center justify-between sm:col-span-2">
                    <h3>{{ __('resellers.create.titles.shipping_data') }}</h3>
                    <x-primary-button type="button" wire:click="copyFromBilling">{{ __('common.copy_from_billing') }}</x-primary-button>
                </div>
                <x-input type="text" wire:model="shipping_address.address_1" name="shipping_address"
                         label="{{ __('resellers.create.address.label') }}" required></x-input>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <x-input type="text" wire:model="shipping_address.city" name="shipping_city"
                             label="{{ __('resellers.create.city.label') }}" required></x-input>
                    <x-input x-mask="{{ __('masks.postcode') }}" type="text" wire:model="shipping_address.postcode"
                             name="shipping_postcode"
                             label="{{ __('resellers.create.postcode.label') }}" required></x-input>
                </div>
                <x-select wire:model="shipping_address.country_id" name="shipping_country"
                          label="{{ __('resellers.create.country.label') }}" required>
                    <option value="">{{ __('common.select') }}</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </x-select>
                <x-input x-mask="{{ __('masks.phone') }}" type="text" wire:model="shipping_address.phone" name="shipping_phone"
                         label="{{ __('resellers.create.phone.label') }}" required></x-input>
                <x-input type="text" wire:model="shipping_address.vat_number" name="shipping_vat_number"
                         label="{{ __('resellers.create.vat_number.label') }}" required></x-input>
                <x-input class="uppercase" type="text" x-mask="{{ __('masks.tax_code') }}" wire:model="shipping_address.tax_code"
                         name="shipping_tax_code"
                         label="{{ __('resellers.create.tax_code.label') }}" required></x-input>
                <x-input type="text" wire:model="shipping_address.sdi" name="shipping_sdi"
                         label="{{ __('resellers.create.sdi.label') }}"></x-input>
                <x-input type="text" wire:model="shipping_address.pec" name="shipping_pec"
                         label="{{ __('resellers.create.pec.label') }}"></x-input>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <h3 class="col-span-1 sm:col-span-2">{{ __('resellers.create.titles.tax') }}</h3>
                <x-input x-mask="99" type="text" wire:model="reseller.tax" name="tax"
                        label="{{ __('resellers.create.tax') }}" required></x-input>
            </div>

            <div class="flex items-center justify-between">
                <x-primary-button>
                    {{ __('common.save') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            <livewire:profile.update-password-form />
        </div>
    </div>
</div>
