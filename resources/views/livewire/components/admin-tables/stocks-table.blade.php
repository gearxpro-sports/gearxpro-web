<div class="relative">
    <div wire:loading class="absolute inset-0 bg-white/50 z-10"></div>
    {{-- <x-admin-table-search-bars.customers-search-bar /> --}}
    <div class="p-8 bg-white rounded space-y-8">
        @if ($stocks->count() > 0)
            <div class="flex items-center space-x-4">
                <h3 class="text-black-1 font-medium">{{ __('stocks.index.table.title') }}</h3>
                <x-badge>{{ $stocks->total() }}</x-badge>
            </div>
            <table
                class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                <thead>
                <tr class="[&>th]:py-4 [&>th]:px-7 [&>th]:font-medium [&>th]:w-1/5 border-b-color-eff0f0">
                    <th class="text-left">{{ __('stocks.index.table.cols.product') }}</th>
                    <th class="text-left">{{ __('stocks.index.table.cols.sku') }}</th>
                    <th class="text-center">{{ __('stocks.index.table.cols.measures') }}</th>
                    <th class="text-center">{{ __('stocks.index.table.cols.quantity') }}</th>
                    <th class="text-right">{{ __('stocks.index.table.cols.sale_price') }}</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($stocks as $stock)
                    <tr @class([
                    '[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50',
                    '!bg-red-50' => $stock->productVariant->trashed() && $stock->quantity <= 0,
                    ])
                    >
                        <td>
                            <div class="flex flex-col space-y-1">
                                <span class="font-semibold text-sm">{{ $stock->productVariant->product->name }}</span>
                                <div class="flex divide-x text-xxs">
                                    @foreach($stock->productVariant->terms as $term)
                                        <span class="first:pl-0 px-1">{{ $term->value }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>{{ $stock->productVariant->sku }}</td>
                        <td class="text-center">{{ __('common.pz') }}</td>
                        <td class="text-center">{{ $stock->quantity }}</td>
                        <td class="text-right">
                            @isset($stock->productVariant->product->countries[0])
                                @money($stock->productVariant->product->countries[0]->prices->price)
                            @else
                                -
                            @endisset
                        </td>
                        <td>
                            <div class="inline-flex items-center space-x-2 min-w-[200px]">
                                @if ($stock->quantity > 10)
                                    <span class="inline-block w-3 h-3 bg-color-4dd3aa rounded-full"></span>
                                    <span>{{ __('common.available') }}</span>
                                @elseif ($stock->quantity > 1)
                                    <span class="inline-block w-3 h-3 bg-color-fdce82 rounded-full"></span>
                                    <span>{{ __('common.running_low') }}</span>
                                @else
                                    <span class="inline-block w-3 h-3 bg-color-f55b3f rounded-full"></span>
                                    <span>{{ __('common.sold_out') }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="text-right flex items-center space-x-3">
                            @if (!$stock->productVariant->trashed() || $stock->quantity > 0)
                                <div
                                    wire:click="$dispatch('openModal', {component: 'stocks.modals.edit-quantity', arguments: {stock: {{$stock->id}}} })"
                                    class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm cursor-pointer">
                                    <x-icons name="edit" class="w-4 h-4"/>
                                </div>
                                <a target="_blank"
                                   class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm"
                                   href="{{ route('shop.show', ['product' => $stock->product->slug, 'country_code' => session('country_code')]) }}">
                                    <x-icons name="eye" class="w-4 h-4"/>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $stocks->links() }}
        @else
            <div class="text-center">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
</div>
