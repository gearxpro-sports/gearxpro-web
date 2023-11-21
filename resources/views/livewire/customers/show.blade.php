<x-slot name="title">
    {{ $customer->fullname }}
</x-slot>
@role(App\Models\User::SUPERADMIN)
<x-slot name="actions">
    <x-primary-button href="{{ route('customers.edit', ['customer' => $customer]) }}">{{ __('common.edit') }}</x-primary-button>
</x-slot>
@endrole

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    <div class="p-7 bg-white">
        <h2 class="flex items-center mb-5">
            <span class="flex items-center justify-center mr-4 h-12 w-12  bg-color-fdce82 text-white rounded">
                <x-heroicon-o-user-circle class="w-6 h-6"></x-heroicon-o-user-circle>
            </span>
            {{ __('customers.show.data.title') }}
        </h2>
        <ul class="flex flex-col gap-5 text-sm">
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.firstname') }}</span>
                <span>{{ $customer->firstname}}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.lastname') }}</span>
                <span>{{ $customer->lastname}}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.email') }}</span>
                <span>{{ $customer->email}}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.registration_date') }}</span>
                <span>{{ $customer->created_at->format('d/m/Y') }}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.country') }}</span>
                <span>{{ $customer->country->name }}</span>
            </li>
            @if($billing_address)
                <h3 class="font-bold">Dati di fatturazione</h3>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.address') }}</span>
                    <span>{{ $billing_address->address_1 }} {{ $billing_address->address_2 }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.city') }}</span>
                    <span>{{ $billing_address->city }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.postcode') }}</span>
                    <span>{{ $billing_address->postcode }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.country') }}</span>
                    <span>{{ $billing_address->country->name }}</span>
                </li>
            @endif
            @if($shipping_address)
                <h3 class="font-bold">Dati di spedizione</h3>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.address') }}</span>
                    <span>{{ $shipping_address->address_1 }} {{ $shipping_address->address_2 }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.city') }}</span>
                    <span>{{ $shipping_address->city }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.postcode') }}</span>
                    <span>{{ $shipping_address->postcode }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.country') }}</span>
                    <span>{{ $shipping_address->country->name }}</span>
                </li>
            @endif
        </ul>
    </div>
    <div class="p-7 bg-white lg:col-span-2">
        <h2 class="flex items-center mb-5">{{ __('customers.show.orders.title') }}</h2>
        @if ($orders->count() > 0)
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table
                            class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                            <thead>
                            <tr class="text-left [&>th]:py-4 [&>th]:px-7 [&>th]:font-medium [&>th]:w-1/5 border-b-color-eff0f0">
                                <th>{{ __('orders.index.table.cols.order_number') }}</th>
                                <th>{{ __('orders.index.table.cols.order_date') }}</th>
                                <th>{{ __('orders.index.table.cols.customer') }}</th>
                                <th>{{ __('orders.index.table.cols.total') }}</th>
                                <th>{{ __('orders.index.table.cols.status') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr wire:key="order_{{ $order->id }}"
                                    class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                                    <td class="whitespace-nowrap uppercase text-color-ff9d60">
                                        #{{ $order->reference }}
                                    </td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $order->customer?->fullname }}</td>
                                    <td>@money($order->total)</td>
                                    <td class="whitespace-nowrap">
                                        <x-badge color="{{ \App\Models\Order::STATUSES[$order->status] }}">{{ __('orders.statuses.' . $order->status) }}</x-badge>
                                    </td>
                                    <td class="text-right">
                                        <div class="inline-flex space-x-2">
                                            <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm hover:bg-color-eff0f0/90"
                                               href="{{ route('orders.show', ['order' => $order->id]) }}">
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
