<div class="relative">
    <div wire:loading wire:target="send" class="absolute inset-0 bg-white/50 z-10"></div>
    <div class="p-8 bg-white rounded space-y-8">
        @if ($rows->count() > 0)
            <div class="flex items-center space-x-4">
                <h3 class="text-black-1 font-medium">{{ __('supply.recap.table.title') }}</h3>
                <x-badge>{{$rows->count()}}</x-badge>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table
                            class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
                            <thead>
                            <tr class="text-left [&>th]:py-4 [&>th]:px-7 [&>th]:font-medium [&>th]:w-1/5 border-b-color-eff0f0">
                                <th>{{ __('supply.recap.table.cols.product_name') }}</th>
                                <th>{{ __('supply.recap.table.cols.measures') }}</th>
                                <th>{{ __('supply.recap.table.cols.purchase_price') }}</th>
                                <th>{{ __('supply.recap.table.cols.quantity') }}</th>
                                <th>{{ __('supply.recap.table.cols.total') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $row)
                                @php($variant = \App\Models\ProductVariant::find($row->product->id))
                                <tr wire:key="{{$variant->id}}"
                                    class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                                    <td>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-10 h-10 bg-gray-100 flex-shrink-0"></div>
                                            <span
                                                class="whitespace-nowrap">{{ $variant->product->name }} - {{ $variant->color->value }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $variant->size->value }} - {{ $variant->length->value }}</td>
                                    <td>@money($row->price)</td>
                                    <td>{{ $row->quantity }}</td>
                                    <td>@money($row->price * $row->quantity)</td>
                                    <td class="text-right">
                                        <x-primary-button wire:click="deleteItem({{ $row->id }})"
                                                          class="!h-auto !p-3 !bg-color-f55b3f hover:!bg-color-f55b3f/90">
                                            <x-icons name="trash" class="w-3 h-3"></x-icons>
                                        </x-primary-button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
</div>
