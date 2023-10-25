<div class="relative">
    <div wire:loading wire:target="send" class="absolute inset-0 bg-white/50 z-10"></div>
    <x-admin-table-search-bars.supply-search-bar :$prices :$availabilities/>
    <div class="p-8 bg-white rounded space-y-8">
        @if ($customers->count() > 0)
            <div class="flex items-center space-x-4">
                <h3 class="text-black-1 font-medium">{{ __('supply.index.table.title') }}</h3>
                <x-badge>{{$customers->total()}}</x-badge>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table
                            class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                            <thead>
                            <tr class="text-left [&>th]:py-4 [&>th]:px-7 [&>th]:font-medium [&>th]:w-1/5 border-b-color-eff0f0">
                                <th>{{ __('supply.index.table.cols.product_name') }}</th>
                                <th>{{ __('supply.index.table.cols.product_id') }}</th>
                                <th>{{ __('supply.index.table.cols.measures') }}</th>
                                <th>{{ __('supply.index.table.cols.unit_of_measurement') }}</th>
                                <th>{{ __('supply.index.table.cols.sale_price') }}</th>
                                <th>{{ __('supply.index.table.cols.purchase_price') }}</th>
                                <th>{{ __('supply.index.table.cols.quantity') }}</th>
                                <th>{{ __('supply.index.table.cols.manufacturer_availability') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $customer)
                                <tr wire:key="product_{{ $customer->id }}" class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                                    <td>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-10 h-10 bg-gray-100"></div>
                                            <span>product_name</span>
                                        </div>
                                    </td>
                                    <td>product_id</td>
                                    <td>
                                        <x-select name="measures" class="text-xs h-8">
                                            <option value="">Seleziona</option>
                                            <option value="">Misura 1</option>
                                            <option value="">Misura 2</option>
                                        </x-select>
                                    </td>
                                    <td>unit_of_measurement</td>
                                    <td>sale_price</td>
                                    <td>purchase_price</td>
                                    <td>
                                        <livewire:components.counter wire:key="counter_{{ $customer->id }}"/>
                                    </td>
                                    <td>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-color-4dd3aa rounded-full"></div>
                                            <span>Disponibile</span>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <x-supply-button wire:click="addItem({{ $customer->id }})"/>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $customers->links() }}
        @else
            <div class="text-center">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
    @teleport('main')
    <div
        class="sticky bottom-0 h-20 flex items-center justify-end px-4 bg-color-f3f7f9 shadow-[0px_-8px_8px_-8px_#00000024]">
        <div class="flex items-center space-x-6">
            <p class="text-color-6c757d text-sm">Totale Carrello: <span class="font-bold">0,00 €</span></p>
            <x-primary-button wire:click="send" type="button" class="bg-color-0c9d87 hover:bg-color-20c391">
                <x-slot:prepend>
                    <x-icons name="paper-plane"></x-icons>
                </x-slot:prepend>
                Invia ordine
            </x-primary-button>
        </div>
    </div>
    @endteleport
</div>
