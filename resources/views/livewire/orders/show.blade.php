<x-slot name="title">
    {{ __('orders.show.title') }}
</x-slot>

<div class="flex flex-col space-y-8">
    <div class="flex items-center py-4 px-8 bg-white shadow-shadow-1 radius-sm">
        <div class="flex items-center">
            <div class="flex flex-col mr-8">
                <span class="text-xs text-color-6c757d">{{ __('orders.show.top_bar.order_number') }}</span>
                <span class="block text-color-18181a uppercase">#{{ $order->reference }}</span>
            </div>
            <x-dropdown-order-statuses current_status="{{ $order->status }}"></x-dropdown-order-statuses>
        </div>
        <div class="ml-auto flex items-center space-x-4">
            <div class="flex flex-col space-y-1">
                <div class="flex items-center justify-end space-x-4 text-color-18181a">
                    <span>{{ $order->created_at->format('d M Y') }}</span>
                    <span class="flex justify-center w-5">
                        <x-icons name="calendar" class="w-4 h-4"/>
                    </span>
                </div>
                <div class="flex items-center justify-end space-x-4 text-xs text-color-6c757d">
                    <span>{{ $order->created_at->format('H:i') }}</span>
                    <span class="flex justify-center w-5">
                        <x-icons name="clock" class="w-3.5 h-3.5"/>
                    </span>
                </div>
            </div>
{{--            @if($supply->invoice)--}}
{{--                <div class="flex flex-col space-y-2">--}}
{{--                    <x-primary-button href="#">--}}
{{--                        <span class="flex items-center space-x-2">--}}
{{--                            <x-icons name="download" class="w-3 h-3"/>--}}
{{--                            <span>{{ __('common.invoice') }}</span>--}}
{{--                        </span>--}}
{{--                    </x-primary-button>--}}
{{--                    @if(auth()->user()->hasRole(\App\Models\User::SUPERADMIN))--}}
{{--                        <div class="flex items-center">--}}
{{--                            <x-dropdown align="right" width="48">--}}
{{--                                <x-slot:trigger>--}}
{{--                                    <x-badge class="space-x-2 cursor-pointer">--}}
{{--                                        <span>{{ __('invoice.statuses.'.$supply->invoice->status) }}</span>--}}
{{--                                        <span>--}}
{{--                                        <x-icons name="chevron-down" class="w-2 h-2"></x-icons>--}}
{{--                                    </span>--}}
{{--                                    </x-badge>--}}
{{--                                </x-slot:trigger>--}}
{{--                                <x-slot:content>--}}
{{--                                    <x-dropdown-link wire:click="setInvoiceStatus('to_pay')">Da pagare</x-dropdown-link>--}}
{{--                                    <x-dropdown-link wire:click="setInvoiceStatus('payed')">Pagato</x-dropdown-link>--}}
{{--                                    <x-dropdown-link wire:click="setInvoiceStatus('not_payed')">Non pagato--}}
{{--                                    </x-dropdown-link>--}}
{{--                                </x-slot:content>--}}
{{--                            </x-dropdown>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="p-8 bg-white rounded-sm flex">
            <div class="grow">
                <h3 class="mb-4 text-color-18181a font-medium">{{ __('orders.show.boxes.customer_data') }}</h3>
                <ul class="grow-0 text-sm">
                    <li class="mt-2 text-color-323a46">{{ $order->customer?->fullname }}</li>
                    <li class="mt-2 text-color-6c757d">{{ $order->customer->email }}</li>
                </ul>
            </div>
            <div class="grow-0">
                <x-box-icon color="bg-color-fdce82" name="user-data"></x-box-icon>
            </div>
        </div>
        <div class="p-8 bg-white rounded-sm flex">
            <div class="grow">
                <h3 class="mb-4 text-color-18181a font-medium">{{ __('orders.show.boxes.shipping_data') }}</h3>
                <ul class="grow-0 text-sm">
                    <li class="mt-2 text-color-323a46">{{ $order->customer->fullname }}</li>
                    <li class="mt-2 text-color-6c757d">{{ $order->customer->shipping_address?->inlineFormat }}</li>
                    <li class="mt-2 text-color-6c757d">{{ $order->customer->shipping_address?->country->name }}</li>
                </ul>
            </div>
            <div class="grow-0">
                <x-box-icon color="bg-color-81a7db" name="truck"></x-box-icon>
            </div>
        </div>
        <div class="p-8 bg-white rounded-sm flex">
            <div class="grow">
                <h3 class="mb-4 text-color-18181a font-medium">{{ __('orders.show.boxes.billing_data') }}</h3>
                <ul class="grow-0 text-sm">
                    <li class="mt-2 text-color-323a46">{{ $order->customer->fullname }}</li>
                    <li class="mt-2 text-color-6c757d">{{ $order->customer->billing_address?->inlineFormat }}</li>
                    <li class="mt-2 text-color-6c757d">{{ $order->customer->billing_address?->country->name }}</li>
                </ul>
            </div>
            <div class="grow-0">
                <x-box-icon color="bg-color-ef4983" name="billing"></x-box-icon>
            </div>
        </div>
        <div class="p-8 bg-white rounded-sm flex">
            <div class="grow">
                <h3 class="mb-4 text-color-18181a font-medium">{{ __('orders.show.boxes.payment_data') }}</h3>
                <ul class="grow-0 text-sm">
                    <li class="my-2 text-color-6c757d">{{ __('orders.show.boxes.payment_method') }}
                        <span class="ml-2 font-medium">{{ $order->payment_method ? __('payment_methods.'.$order->payment_method) : '-' }}</span>
                    </li>
                    @if ($order->payment_method === \App\Models\Order::STRIPE_PAYMENT && $receiptUrl)
                        <li class="my-2">
                            <a class="text-color-2cb2d1 font-bold underline hover:no-underline" href="{{ $receiptUrl }}" target="_blank">{{ __('orders.show.stripe_receipt') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="grow-0">
                <x-box-icon color="bg-color-2cb2d1" name="credit-card"></x-box-icon>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
        <div class="lg:col-span-3 p-8 bg-white rounded-sm">
            <h3 class="text-color-18181a font-medium">{{ __('orders.show.table.title') }}</h3>
            <table
                class="my-8 table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                <thead>
                <tr class="[&>th]:py-4 [&>th]:px-7 [&>th]:font-medium [&>th]:w-1/5 border-b-color-eff0f0">
                    <th class="text-left">{{ __('orders.show.table.cols.name') }}</th>
                    <th class="text-left">{{ __('orders.show.table.cols.id') }}</th>
                    <th class="text-center">{{ __('orders.show.table.cols.price') }}</th>
                    <th class="text-center">{{ __('orders.show.table.cols.quantity') }}</th>
                    <th class="text-right">{{ __('orders.show.table.cols.total') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($order->items as $item)
                    @php($variant = \App\Models\ProductVariant::where('id', $item->variant_id)->withTrashed()->first())
                    @if (!$variant)
                        @continue
                    @endif
                    <tr class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                        <td class="text-left">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <img class="w-10" src="{{ $variant->getThumbUrl() }}" alt="{{ $variant->product->name }}">
                                </div>
                                <div>
                                    {{ $variant->product->name }}
                                    <div class="flex divide-x text-xxs mt-1">
                                        @foreach($variant->terms as $term)
                                            <span class="first:pl-0 px-1">{{ $term->value }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-left">{{ $variant->sku }}</td>
                        <td class="text-center">@money($item->price)</td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-right">@money($item->quantity * $item->price)</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex flex-col text-center space-y-4 p-8 border-dashed border-2 border-color-dee2e6">
                    <span class="text-xs text-color-6c757d">{{ __('orders.show.order_date') }}</span>
                    <span class="text-color-18181a font-medium">{{ $order->created_at->format('d M Y') }}</span>
                </div>
                <div class="flex flex-col text-center space-y-4 p-8 border-dashed border-2 border-color-dee2e6">
                    <span class="text-xs text-color-6c757d">{{ __('orders.show.ship_date') }}</span>
                    <span class="text-color-18181a font-medium">
                        {{ $order->shipped_at ? $order->shipped_at?->format('d M Y') : '-' }}
                    </span>
                </div>
                <div class="flex flex-col text-center space-y-4 p-8 border-dashed border-2 border-color-dee2e6">
                    <span class="text-xs text-color-6c757d">{{ __('orders.show.order_total') }}</span>
                    <span class="text-color-18181a font-medium">@money($order->total)</span>
                </div>
                <div class="flex flex-col text-center space-y-4 p-8 border-dashed border-2 border-color-dee2e6">
                    <span class="text-xs text-color-6c757d">{{ __('orders.show.order_state') }}</span>
                    <div class="flex justify-center">
                        <x-dropdown-order-statuses current_status="{{ $order->status }}"></x-dropdown-order-statuses>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="bg-white rounded-sm">
                <div class="p-8">
                    <h3 class="text-color-18181a font-medium">{{ __('orders.show.order_total') }}</h3>
                    <div class="text-sm">
                        <div class="flex items-center text-color-6c757d pt-5">
                            <span>{{ __('orders.show.summary.subtotal') }}</span><span class="ml-auto">@money($order->total - config('app.shipping_cost'))</span>
                        </div>
                        <div class="flex items-center text-color-6c757d pt-5">
                            <span>{{ __('orders.show.summary.shipping_costs') }}:</span><span class="ml-auto">@money(config('app.shipping_cost'))</span>
                        </div>
                        <div class="flex items-center text-color-6c757d pt-5">
                            <span>{{ __('orders.show.summary.tax') }}</span><span class="ml-auto">@money(0)</span>
                        </div>
                    </div>
                </div>
                <div class="p-8 border-t border-color-eff0f0">
                    <div class="flex items-center">
                        <span>{{ __('orders.show.summary.total') }}</span><span class="ml-auto">@money($order->total)</span>
                    </div>
                </div>
            </div>
            @if ($order->shipped_at)
            <div class="mt-4">
                <div class="bg-white rounded-sm">
                    <div class="p-8">
                        <h3 class="text-color-18181a font-medium">{{ __('orders.show.shipping_details') }}</h3>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
