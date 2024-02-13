<div class="relative">
    <div wire:loading wire:target="send" class="absolute inset-0 bg-white/50 z-10"></div>
    <div class="grid grid-cols-1 gap-4 items-end mb-2.5 bg-white py-4 px-4 text-xs rounded shadow-shadow-1 md:grid-cols-2 md:px-7">
        <div>
            <div class="relative">
                <x-input wire:model.live.debounce.500ms="search" name="search" placeholder="{{ __('common.search') }}" class="h-10 py-0">
                    <x-slot:append>
                    <span class="search-btn absolute z-[1] inset-y-1 right-1 flex items-center justify-center w-9 bg-color-eff0f0 rounded-sm">
                        <x-icons name="search" class="w-4 h-4" />
                    </span>
                    </x-slot:append>
                </x-input>
            </div>
        </div>
        <div class="flex items-end gap-2">
            <div class="mx-0 w-80 md:mx-2.5">
                <x-flatpickr datepickerId="{{ Str::random(9) }}" name="filter[created_at]" label="{{ __('common.filter_by') }}" placeholder="{{ __('customers.index.filter.select_registration_date') }}">
                    <x-slot:append>
                    <span class="search-btn absolute z-[1] inset-y-1 right-1 flex items-center justify-center w-9 bg-color-eff0f0 rounded-sm">
                        <x-icons name="calendar" class="w-4 h-4"/>
                    </span>
                    </x-slot:append>
                </x-flatpickr>
            </div>
            <div class="w-full max-w-xs">
                <x-select wire:model.live="selected_status" name="selected_status">
                    <option value="">{{ __('supply.index.filter.status') }}</option>
                    @foreach($statuses as $status)
                        <option value="{{$status}}">{{ __('supply.statuses.'. $status) }}</option>
                    @endforeach
                </x-select>
            </div>
        </div>
    </div>
    <div class="p-8 bg-white rounded space-y-8">
        @if ($orders->count() > 0)
            <div class="flex items-center space-x-4">
                <h3 class="text-black-1 font-medium">{{ __('supply.purchases.index.table.title') }}</h3>
                <x-badge>{{$orders->total()}}</x-badge>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table
                            class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                            <thead>
                            <tr class="text-left [&>th]:py-4 [&>th]:px-7 [&>th]:font-medium [&>th]:w-1/5 border-b-color-eff0f0">
                                <th>{{ __('supply.purchases.index.table.cols.order_number') }}</th>
                                <th>{{ __('supply.purchases.index.table.cols.order_date') }}</th>
                                <th>{{ __('supply.purchases.index.table.cols.total') }}</th>
                                @role(App\Models\User::SUPERADMIN)
                                <th>{{ __('supply.purchases.index.table.cols.reseller') }}</th>
                                @endrole
                                <th>{{ __('supply.purchases.index.table.cols.status') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr wire:key="order_{{ $order->uuid }}"
                                    class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                                    <td class="whitespace-nowrap uppercase text-color-ff9d60">
                                        #{{ $order->uuid }}
                                    </td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>@money($order->amount)</td>
                                    @role(App\Models\User::SUPERADMIN)
                                    <td>
                                        <a href="{{ route('resellers.show', ['reseller' => $order->reseller->id]) }}"
                                           target="_blank">
                                            <span class="text-color-6c757d underline">
                                                <img class="inline-block w-5 mr-2 rounded-sm" src="https://flagcdn.com/w320/{{ strtolower($order->reseller->country->iso2_code) }}.png" alt="{{ $order->reseller->country->name }}">
                                                {{ $order->reseller->fullname}}
                                            </span>
                                            @if($order->reseller->trashed())
                                                <span class="text-color-f55b3f ml-1">({{__('supply.purchases.index.table.trashed')}})</span>
                                            @endif
                                        </a>
                                    </td>
                                    @endrole
                                    <td class="whitespace-nowrap">
                                        <x-badge
                                            color="{{ \App\Models\Supply::STATUSES[$order->status] }}">{{ __('supply.statuses.' . $order->status) }}</x-badge>
                                    </td>
                                    <td class="text-right">
                                        <div class="inline-flex space-x-2">
                                            @hasanyrole([App\Models\User::RESELLER, App\Models\User::SUPERADMIN])
                                            <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm hover:bg-color-eff0f0/90"
                                               href="{{ route('supply.purchases.show', ['supply' => $order->id]) }}">
                                                <x-icons name="eye" class="w-4 h-4"/>
                                            </a>
                                            @endhasanyrole
                                            @if($order->invoice)
                                                <a class="flex items-center justify-center ml-auto bg-color-ef4983 w-8 h-8 text-center text-white rounded-sm hover:bg-color-ef4983/90"
                                                   href="{{ route('supply.purchases.invoice', ['supply' => $order->id]) }}">
                                                    <x-icons name="download" class="w-4 h-4"/>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $orders->links() }}
        @else
            <div class="text-center">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
</div>
