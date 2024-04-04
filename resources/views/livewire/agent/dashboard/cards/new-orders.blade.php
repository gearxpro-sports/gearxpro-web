<div class="flex flex-col justify-between text-center bg-white p-4 space-y-3 overflow-hidden">
    <div class="flex items-center justify-between border-b pb-4">
        <div class="flex items-center space-x-4">
            @if(auth()->user()->hasRole(App\Models\User::SUPERADMIN))
                <h3 class="text-sm font-medium">{{ __('dashboard.cards.new-orders.admin_title') }}</h3>
                @if($orders_count > 0)
                    <x-badge color="green">{{ $orders_count }}</x-badge>
                @endif
            @elseif(auth()->user()->hasRole(App\Models\User::RESELLER))
                <h3 class="text-sm font-medium">{{ __('dashboard.cards.new-orders.reseller_title') }}</h3>
            @endif
        </div>
        {{--        <x-secondary-button href="{{ route('stocks.index') }}" class="!h-8">{{ __('dashboard.cards.new-orders.cta') }}</x-secondary-button>--}}
    </div>
    <div>
        <div class="-mx-0 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table
                    class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                    <thead>
                    <tr class="text-left [&>th]:py-4 [&>th]:px-7 [&>th]:font-medium border-b-color-eff0f0">
                        <th class="whitespace-nowrap">{{ __('dashboard.cards.new-orders.table.cols.number') }}</th>
                        <th class="whitespace-nowrap">{{ __('dashboard.cards.new-orders.table.cols.date') }}</th>
                        <th class="whitespace-nowrap">{{ __('dashboard.cards.new-orders.table.cols.customer') }}</th>
                        <th class="whitespace-nowrap">{{ __('dashboard.cards.new-orders.table.cols.price') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(auth()->user()->hasRole(\App\Models\User::SUPERADMIN))
                        @foreach ($items as $item)
                            <tr class="text-left [&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                                <td class="whitespace-nowrap uppercase">#{{ $item->uuid }}</td>
                                <td class="whitespace-nowrap">{{ $item->created_at->format('d/m/Y') }}</td>
                                <td class="whitespace-nowrap">
                                    <div>
                                        <img class="inline-block w-5 mr-2 rounded-sm" src="https://flagcdn.com/w320/{{ strtolower($item->reseller->country->iso2_code) }}.png" alt="{{ $item->reseller->country->name }}">
                                        {{ $item->reseller->fullname }}
                                    </div>
                                </td>
                                <td class="whitespace-nowrap">@money($item->amount)</td>
                                <td class="text-right">
                                    <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm"
                                       href="{{ route('supply.purchases.show', ['supply' => $item->id]) }}">
                                        <x-icons name="eye" class="w-4 h-4"/>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @elseif(auth()->user()->hasRole(\App\Models\User::RESELLER))
                        @foreach ($items as $item)
                            <tr class="text-left [&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                                <td class="whitespace-nowrap uppercase">#{{ $item->reference }}</td>
                                <td class="whitespace-nowrap">{{ $item->created_at->format('d/m/Y') }}</td>
                                <td class="whitespace-nowrap">{{ $item->customer?->fullname }}</td>
                                <td class="whitespace-nowrap">@money($item->total)</td>
                                <td class="text-right">
                                    <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm"
                                       href="{{ route('orders.show', $item->id) }}">
                                        <x-icons name="eye" class="w-4 h-4"/>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
