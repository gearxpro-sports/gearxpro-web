<x-slot name="title">
    {{ __('resellers.create.title') }}
</x-slot>
<x-slot name="actions">
    <x-primary-button>{{ __('common.save') }}</x-primary-button>
</x-slot>

<div x-data>
    <form wire:submit="save" class="bg-white space-y-10 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <h3 class="col-span-1 sm:col-span-2">{{ __('resellers.create.titles.general_data') }}</h3>
            <x-input type="text" wire:model="firstname" name="firstname"
                     label="{{ __('resellers.create.firstname.label') }}" required></x-input>
            <x-input type="text" wire:model="lastname" name="lastname"
                     label="{{ __('resellers.create.lastname.label') }}" required></x-input>
            <x-input type="email" wire:model="email" name="email" label="{{ __('resellers.create.email.label') }}"
                     required></x-input>
            <x-input type="text" wire:model="billing_company" name="company" label="{{ __('resellers.create.company.label') }}"
                     required></x-input>
            <x-select wire:model="country_id" hint="{{ __('resellers.create.country.hint') }}" name="country"
                      label="{{ __('resellers.create.country.label') }}" required>
                <option value="">{{ __('common.select') }}</option>
                @foreach($countries as $country)
                    <option
                        :disabled="{{ in_array($country->id, $resellers->pluck('country_id')->unique()->toArray()) }}"
                        value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </x-select>
            <x-input x-mask="{{ __('masks.phone') }}" type="text" wire:model="phone" name="phone"
                     label="{{ __('resellers.create.phone.label') }}"
                     required></x-input>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <h3 class="col-span-1 sm:col-span-2">{{ __('resellers.create.titles.billing_data') }}</h3>
            <x-input type="text" wire:model="billing_address_1" name="billing_address_1"
                     label="{{ __('resellers.create.address.label') }}" required></x-input>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-input type="text" wire:model="billing_city" name="billing_city"
                         label="{{ __('resellers.create.city.label') }}" required></x-input>
                <x-input x-mask="{{ __('masks.postcode') }}" type="text" wire:model="billing_postcode"
                         name="billing_postcode"
                         label="{{ __('resellers.create.postcode.label') }}" required></x-input>
            </div>
            <x-select wire:model="billing_country_id" name="billing_country_id"
                      label="{{ __('resellers.create.country.label') }}" required>
                <option value="">{{ __('common.select') }}</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </x-select>
            <x-input x-mask="{{ __('masks.phone') }}" type="text" wire:model="billing_phone" name="billing_phone"
                     label="{{ __('resellers.create.phone.label') }}" required></x-input>
            <x-input type="text" wire:model="billing_vat_number" name="billing_vat_number"
                     label="{{ __('resellers.create.vat_number.label') }}" required></x-input>
            <x-input class="uppercase" type="text" x-mask="{{ __('masks.tax_code') }}" wire:model="billing_tax_code"
                     name="billing_tax_code"
                     label="{{ __('resellers.create.tax_code.label') }}" required></x-input>
            <x-input type="text" wire:model="billing_sdi" name="billing_sdi"
                     label="{{ __('resellers.create.sdi.label') }}"></x-input>
            <x-input type="text" wire:model="billing_pec" name="billing_pec"
                     label="{{ __('resellers.create.pec.label') }}"></x-input>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="col-span-1 flex items-center justify-between sm:col-span-2">
                <h3>{{ __('resellers.create.titles.shipping_data') }}</h3>
                <x-primary-button type="button" wire:click="copyFromBilling">{{ __('common.copy_from_billing') }}</x-primary-button>
            </div>
            <x-input type="text" wire:model="shipping_address_1" name="shipping_address_1"
                     label="{{ __('resellers.create.address.label') }}" required></x-input>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-input type="text" wire:model="shipping_city" name="shipping_city"
                         label="{{ __('resellers.create.city.label') }}" required></x-input>
                <x-input x-mask="{{ __('masks.postcode') }}" type="text" wire:model="shipping_postcode"
                         name="shipping_postcode"
                         label="{{ __('resellers.create.postcode.label') }}" required></x-input>
            </div>
            <x-select wire:model="shipping_country_id" name="shipping_country_id"
                      label="{{ __('resellers.create.country.label') }}" required>
                <option value="">{{ __('common.select') }}</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </x-select>
            <x-input x-mask="{{ __('masks.phone') }}" type="text" wire:model="shipping_phone" name="shipping_phone"
                     label="{{ __('resellers.create.phone.label') }}" required></x-input>
            <x-input type="text" wire:model="shipping_vat_number" name="shipping_vat_number"
                     label="{{ __('resellers.create.vat_number.label') }}" required></x-input>
            <x-input class="uppercase" type="text" x-mask="{{ __('masks.tax_code') }}" wire:model="shipping_tax_code"
                     name="shipping_tax_code"
                     label="{{ __('resellers.create.tax_code.label') }}" required></x-input>
            <x-input type="text" wire:model="shipping_sdi" name="shipping_sdi"
                     label="{{ __('resellers.create.sdi.label') }}"></x-input>
            <x-input type="text" wire:model="shipping_pec" name="shipping_pec"
                     label="{{ __('resellers.create.pec.label') }}"></x-input>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <h3 class="col-span-1 sm:col-span-2">{{ __('resellers.create.titles.payment') }}</h3>
            <x-select wire:model="payment_method" name="payment_method"
                      label="{{ __('resellers.create.payment_method.label') }}" required>
                <option value="">{{ __('common.select') }}</option>
                @foreach(config('payment_methods') as $payment_method)
                    <option value="{{ $payment_method }}">{{ __('payment_methods.'.$payment_method) }}</option>
                @endforeach
            </x-select>
        </div>
        <div class="flex items-center justify-between">
            <x-primary-button>
                {{ __('common.save') }}
            </x-primary-button>
        </div>
    </form>
</div>
