<div class="relative">
    <div wire:loading wire:target="send" class="absolute inset-0 bg-white/50 z-10"></div>
    <x-admin-table-search-bars.orders-search-bar/>
    <div class="p-8 bg-white rounded space-y-8">
        @if ($orders->count() > 0)
            <div class="flex items-center space-x-4">
                <h3 class="text-black-1 font-medium">{{ __('orders.index.table.title') }}</h3>
                <x-badge>{{$orders->total()}}</x-badge>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table
                            class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                            <thead>
                                <tr class="text-left [&>th]:py-4 [&>th]:px-7 [&>th]:font-medium border-b-color-eff0f0">
                                    <th></th>
                                    <th class="w-1/5">{{ __('orders.index.table.cols.order_number') }}</th>
                                    <th class="w-1/5">{{ __('orders.index.table.cols.order_date') }}</th>
                                    <th class="w-1/5">{{ __('orders.index.table.cols.customer') }}</th>
                                    <th class="w-1/5">{{ __('orders.index.table.cols.total') }}</th>
                                    <th class="w-1/5">{{ __('orders.index.table.cols.status') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr wire:key="order_{{ $order->id }}"
                                    class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                                    <td>
                                        @if (in_array($order->status, [\App\Models\Order::PAID_STATUS, \App\Models\Order::IN_PROCESS_STATUS, \App\Models\Order::IN_SHIPPING_STATUS]))
                                        <x-checkbox wire:model.live="selectedOrders" name="order_{{ $order->id}}" value="{{ $order->id }}"></x-checkbox>
                                        @endif
                                    </td>
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
{{--                                            @if($order->invoice)--}}
{{--                                                <a class="flex items-center justify-center ml-auto bg-color-ef4983 w-8 h-8 text-center text-white rounded-sm hover:bg-color-ef4983/90"--}}
{{--                                                   href="{{ route('supply.purchases.invoice', ['supply' => $order->id]) }}">--}}
{{--                                                    <x-icons name="download" class="w-4 h-4"/>--}}
{{--                                                </a>--}}
{{--                                            @endif--}}
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
    @if ($selectedOrders)
        <div wire:key="order_status_switcher" class="fixed min-w-[800px] left-1/2 -translate-x-1/2 flex items-center justify-center gap-2 bottom-8 p-5 bg-color-fdce82 text-black-1 text-xs text-center font-medium shadow-shadow-2 rounded-full">
            <span class="inline-block h-8 w-8 leading-8 bg-color-f5af3f text-white rounded">{{ count($selectedOrders) }}</span>
            <span class="mx-2">{{ __('orders.index.status_switcher.selected_items') }}</span>
            <button class="flex items-center space-x-2 h-8 px-6 bg-color-f5af3f text-white rounded" wire:click="deselectAllOrders">
                <x-icons class="w-2 h-2 fill-white" name="x-close"></x-icons><span>{{ __('orders.index.status_switcher.deselect_all') }}</span>
            </button>
            <span class="mx-2">{{ __('orders.index.status_switcher.change_state') }}</span>
            @foreach([\App\Models\Order::PAID_STATUS, \App\Models\Order::IN_PROCESS_STATUS, \App\Models\Order::IN_SHIPPING_STATUS, \App\Models\Order::SHIPPED_STATUS, \App\Models\Order::CANCELED_STATUS, \App\Models\Order::REFUNDED_STATUS] as $status)
                <button wire:click="updateSelectedOrders('{{ $status }}')">
                    <x-badge class="hover:!bg-color-18181a hover:!text-white" color="{{ \App\Models\Order::STATUSES[$status] }}">{{ __('orders.statuses.' . $status) }}</x-badge>
                </button>
            @endforeach
        </div>
    @endif
</div>

