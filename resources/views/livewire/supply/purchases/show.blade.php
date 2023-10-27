<x-slot name="title">
    {{ __('supply.purchases.show.title') }}
</x-slot>

<div class="flex flex-col space-y-8">
    <div class="flex items-center py-4 px-8 bg-white shadow-shadow-1 radius-sm">
        <div class="flex items-center">
            <div class="flex flex-col mr-8">
                <span class="text-xs text-color-6c757d">Ordine Numero</span>
                <span class="block text-color-18181a uppercase">#{{ $supply->uuid }}</span>
            </div>
            <x-dropdown-supply-statuses current_status="{{ $supply->status }}"></x-dropdown-supply-statuses>
        </div>
        <div class="ml-auto flex items-center space-x-4">
            <div class="flex flex-col space-y-1">
                <div class="flex items-center justify-end space-x-4 text-color-18181a">
                    <span>{{ $supply->created_at->format('d M Y') }}</span>
                    <span class="flex justify-center w-5"><x-icons name="calendar" class="w-4 h-4" /></span>
                </div>
                <div class="flex items-center justify-end space-x-4 text-xs text-color-6c757d">
                    <span>{{ $supply->created_at->format('H:i') }}</span>
                    <span class="flex justify-center w-5"><x-icons name="clock" class="w-3.5 h-3.5" /></span>
                </div>
            </div>
            <x-primary-button href="#"><span class="flex items-center space-x-2"><x-icons name="download" class="w-3 h-3" /><span>{{ __('common.invoice') }}</span></span></x-primary-button>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <div class="p-8 bg-white rounded-sm flex">
            <div class="grow">
                <h3 class="mb-4 text-color-18181a font-medium">Dati Rivenditore</h3>
                <ul class="grow-0 text-sm">
                    <li class="mt-2 text-color-323a46">{{ $supply->reseller->fullname }}</li>
                    <li class="mt-2 text-color-6c757d">{{ $supply->reseller->email }}</li>
                </ul>
            </div>
            <div class="grow-0">
                <x-box-icon color="bg-color-fdce82" name="user-data"></x-box-icon>
            </div>
        </div>
        <div class="p-8 bg-white rounded-sm flex">
            <div class="grow">
                <h3 class="mb-4 text-color-18181a font-medium">Dati Spedizione</h3>
                <ul class="grow-0 text-sm">
                    <li class="mt-2 text-color-323a46">{{ $supply->reseller->fullname }}</li>
                    <li class="mt-2 text-color-6c757d">{{ $supply->reseller->shippingAddress->inlineFormat }}</li>
                    <li class="mt-2 text-color-6c757d">{{ $supply->reseller->shippingAddress->country->name }}</li>
                </ul>
            </div>
            <div class="grow-0">
                <x-box-icon color="bg-color-81a7db" name="truck"></x-box-icon>
            </div>
        </div>
        <div class="p-8 bg-white rounded-sm flex">
            <div class="grow">
                <h3 class="mb-4 text-color-18181a font-medium">Dati Fatturazione</h3>
                <ul class="grow-0 text-sm">
                    <li class="mt-2 text-color-323a46">{{ $supply->reseller->fullname }}</li>
                    <li class="mt-2 text-color-6c757d">{{ $supply->reseller->billingAddress->inlineFormat }}</li>
                    <li class="mt-2 text-color-6c757d">{{ $supply->reseller->billingAddress->country->name }}</li>
                </ul>
            </div>
            <div class="grow-0">
                <x-box-icon color="bg-color-ef4983" name="billing"></x-box-icon>
            </div>
        </div>
        <div class="p-8 bg-white rounded-sm flex">
            <div class="grow">
                <h3 class="mb-4 text-color-18181a font-medium">Informazioni Pagamento</h3>
                <ul class="grow-0 text-sm">
                    <li class="mt-2 text-color-6c757d">Metodo di pagamento: <span class="ml-2 font-medium">{{ $supply->payment_method ? __('payment_methods.'.$supply->payment_method) : '-' }}</span></li>
                </ul>
            </div>
            <div class="grow-0">
                <x-box-icon color="bg-color-2cb2d1" name="credit-card"></x-box-icon>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <div class="col-span-3 p-8 bg-white rounded-sm">
            <h3 class="text-color-18181a font-medium">{{ __('supply.purchases.show.table.title') }}</h3>
            <table class="my-8 table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                <thead>
                    <tr class="[&>th]:py-4 [&>th]:px-7 [&>th]:font-medium [&>th]:w-1/5 border-b-color-eff0f0">
                        <th class="text-left">{{ __('supply.purchases.show.table.cols.name') }}</th>
                        <th class="text-left">{{ __('supply.purchases.show.table.cols.id') }}</th>
                        <th class="text-center">{{ __('supply.purchases.show.table.cols.price') }}</th>
                        <th class="text-center">{{ __('supply.purchases.show.table.cols.quantity') }}</th>
                        <th class="text-right">{{ __('supply.purchases.show.table.cols.total') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supply->rows as $row)
                        @php($variant = \App\Models\ProductVariant::find($row->product->id))
                    <tr class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                        <td class="text-left">
                            <div class="flex flex-col">
                                {{ $variant->product->name }}
                                <div class="flex divide-x text-xxs mt-1">
                                    @foreach($variant->attributes as $attribute)
                                        <span class="first:pl-0 px-1">{{ $attribute->value }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td class="text-left">{{ $variant->sku }}</td>
                        <td class="text-center">@money($row->price)</td>
                        <td class="text-center">{{ $row->quantity }}</td>
                        <td class="text-right">@money($row->quantity * $row->price)</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex flex-col text-center space-y-4 p-8 border-dashed border-2 border-color-dee2e6">
                    <span class="text-xs text-color-6c757d">{{ __('supply.purchases.show.supply_date') }}</span>
                    <span class="text-color-18181a font-medium">{{ $supply->created_at->format('d M Y') }}</span>
                </div>
                <div class="flex flex-col text-center space-y-4 p-8 border-dashed border-2 border-color-dee2e6">
                    <span class="text-xs text-color-6c757d">{{ __('supply.purchases.show.ship_date') }}</span>
                    <span class="text-color-18181a font-medium">{{ $supply->shipped_at ? $supply->shipped_at->format('d M Y') : '-' }}</span>
                </div>
                <div class="flex flex-col text-center space-y-4 p-8 border-dashed border-2 border-color-dee2e6">
                    <span class="text-xs text-color-6c757d">{{ __('supply.purchases.show.supply_total') }}</span>
                    <span class="text-color-18181a font-medium">@money($supply->amount)</span>
                </div>
                <div class="flex flex-col text-center space-y-4 p-8 border-dashed border-2 border-color-dee2e6">
                    <span class="text-xs text-color-6c757d">{{ __('supply.purchases.show.supply_state') }}</span>
                    <div class="flex justify-center">
                        <x-dropdown-supply-statuses current_status="{{ $supply->status }}"></x-dropdown-supply-statuses>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
