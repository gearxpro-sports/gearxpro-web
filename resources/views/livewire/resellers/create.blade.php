<x-slot name="title">
    {{ __('common.title.resellers') }}
</x-slot>
<x-slot name="actions">
    <x-primary-button>{{ __('common.save') }}</x-primary-button>
</x-slot>

<div x-data>
    <form class="bg-white space-y-10 p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <h3 class="col-span-1 sm:col-span-2">Dati generali</h3>
            <x-input type="text" wire:model="firstname" name="firstname" label="{{ __('resellers.create.firstname.label') }}" required></x-input>
            <x-input type="text" wire:model="lastname" name="lastname" label="{{ __('resellers.create.lastname.label') }}" required></x-input>
            <x-input type="email" wire:model="email" name="email" label="{{ __('resellers.create.email.label') }}" required></x-input>
            <x-input type="text" wire:model="company" name="company" label="{{ __('resellers.create.company.label') }}" required></x-input>
            <x-input type="text" wire:model="vat_number" name="vat_number" label="{{ __('resellers.create.vat_number.label') }}" required></x-input>
            <x-input type="text" x-mask="AAAAAA99A99A999A" wire:model="tax_code" name="tax_code" label="{{ __('resellers.create.tax_code.label') }}" required></x-input>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <h3 class="col-span-1 sm:col-span-2">Indirizzo</h3>
            <x-input type="text" wire:model="address_1" name="address_1" label="{{ __('resellers.create.address_1.label') }}" required></x-input>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-input type="text" wire:model="city" name="city" label="{{ __('resellers.create.city.label') }}" required></x-input>
                <x-input x-mask="9999" type="text" wire:model="postcode" name="postcode" label="{{ __('resellers.create.postcode.label') }}" required></x-input>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <h3 class="col-span-1 sm:col-span-2">Fatturazione</h3>
            <x-input type="text" wire:model="sdi" name="sdi" label="{{ __('resellers.create.sdi.label') }}"></x-input>
            <x-input type="text" wire:model="pec" name="pec" label="{{ __('resellers.create.pec.label') }}"></x-input>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nazione">
                Nazione<span class="text-red-600">*</span>
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nazione" type="text" placeholder="Nazione" required>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="metodo-pagamento">
                Metodo di pagamento
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="metodo-pagamento">
                <option value="carta">Carta di credito</option>
                <option value="paypal">PayPal</option>
                <option value="bonifico">Bonifico bancario</option>
                <option value="altro">Altro</option>
            </select>
        </div>





        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Invia
            </button>
        </div>
    </form>
</div>
