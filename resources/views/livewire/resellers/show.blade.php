<x-slot name="title">
    {{ $reseller->fullname }}
</x-slot>
<x-slot name="actions">
    <x-primary-button
        href="{{ route('resellers.edit', ['reseller' => $reseller]) }}">{{ __('common.edit') }}</x-primary-button>
    @if($reseller->deleted_at)
        <x-secondary-button
            x-on:click="Livewire.dispatch('openModal', { component: 'resellers.modals.enable', arguments: { reseller: {{ $reseller->id }} }})">{{ __('common.enable') }}</x-secondary-button>
    @else
    <x-danger-button
        x-on:click="Livewire.dispatch('openModal', { component: 'resellers.modals.disable', arguments: { reseller: {{ $reseller->id }} }})">{{ __('common.disable') }}</x-danger-button>
    @endif
</x-slot>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    <div class="p-7 bg-white">
        <h2 class="flex items-center mb-5">
            <span class="flex items-center justify-center mr-4 h-12 w-12  bg-color-fdce82 text-white rounded">
                <x-heroicon-o-user-circle class="w-6 h-6"></x-heroicon-o-user-circle>
            </span>
            {{ __('resellers.show.titles.data') }}
        </h2>
        <ul class="flex flex-col gap-5 text-sm">
            @if($billing_address)
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.company') }}</span>
                    <span>{{ $billing_address->company ?? '-'}}</span>
                </li>
            @endif
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.email') }}</span>
                <span>{{ $reseller->email}}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.creation_date') }}</span>
                <span>{{ $reseller->created_at->format('d/m/Y') }}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.country') }}</span>
                <span>
                    <img class="inline-block w-5 mr-2 rounded-sm" src="https://flagcdn.com/w320/{{ strtolower($reseller->country->iso2_code) }}.png" alt="{{ $reseller->country->name }}">
                    {{ $reseller->country->name }}
                </span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.last_login') }}</span>
                <span>{{ optional($reseller->last_login)->format('d/m/Y H:i:s') ?? '-' }}</span>
            </li>
            @if($billing_address)
                <h3 class="font-bold">{{ __('resellers.show.titles.billing') }}</h3>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.address') }}</span>
                    <span>{{ $billing_address->address_1 }} {{ $billing_address->address_2 }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.city') }}</span>
                    <span>{{ $billing_address->city }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.postcode') }}</span>
                    <span>{{ $billing_address->postcode }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.country') }}</span>
                    <span>
                        <img class="inline-block w-5 mr-2 rounded-sm" src="https://flagcdn.com/w320/{{ strtolower($billing_address->country->iso2_code) }}.png" alt="{{ $billing_address->country->name }}">
                        {{ $billing_address->country->name }}
                    </span>
                </li>
            @endif
            @if($shipping_address)
                <h3 class="font-bold">{{ __('resellers.show.titles.shipping') }}</h3>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.address') }}</span>
                    <span>{{ $shipping_address->address_1 }} {{ $shipping_address->address_2 }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.city') }}</span>
                    <span>{{ $shipping_address->city }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.postcode') }}</span>
                    <span>{{ $shipping_address->postcode }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.country') }}</span>
                    <span>
                        <img class="inline-block w-5 mr-2 rounded-sm" src="https://flagcdn.com/w320/{{ strtolower($shipping_address->country->iso2_code) }}.png" alt="{{ $shipping_address->country->name }}">
                        {{ $shipping_address->country->name }}
                    </span>
                </li>
            @endif
            <h3 class="font-bold">{{ __('resellers.show.titles.payment') }}</h3>
            <li class="flex space-x-2">
                <span>{{ __('payment_methods.' . $reseller->payment_method) }}</span>
            </li>
        </ul>
    </div>

    <div class="p-7 bg-white lg:col-span-2">
        <h2 class="flex items-center mb-5">{{ __('resellers.show.orders.title') }}</h2>
        @if ($orders->count() > 0)
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
                                    <td class="whitespace-nowrap">
                                        <x-badge
                                            color="{{ \App\Models\Supply::STATUSES[$order->status] }}">{{ __('supply.statuses.' . $order->status) }}</x-badge>
                                    </td>
                                    <td class="text-right">
                                        <div class="inline-flex space-x-2">
                                            <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm hover:bg-color-eff0f0/90"
                                               href="{{ route('supply.purchases.show', ['supply' => $order->id]) }}">
                                                <x-icons name="eye" class="w-4 h-4"/>
                                            </a>
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
