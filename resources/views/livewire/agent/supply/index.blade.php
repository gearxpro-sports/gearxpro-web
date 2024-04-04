<x-slot name="title">
    {{ __('supply.index.title-agent') }}
</x-slot>

<div>
    <div class="relative">
        <div class="grid grid-cols-1 gap-4 items-end mb-2.5 bg-white py-4 px-4 text-xs rounded shadow-shadow-1 md:grid-cols-2 md:px-7">
            <div class="w-full max-w-xs">
                <x-select wire:model.live="selected_customer" name="selected_customer">
                    <option value="">{{ __('supply.index.filter.customers') }}</option>
                    
                    @foreach($customers as $customer)
                        <option value="{{$customer}}">{{ $customer->firstname." ".$customer->lastname }}</option>
                    @endforeach
                </x-select>
            </div>
        </div>
    </div>
    <livewire:components.admin-tables.supply.supply-table />
</div>
