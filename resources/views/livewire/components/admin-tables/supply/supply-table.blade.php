<div class="relative">
    <div wire:loading wire:target="send" class="absolute inset-0 bg-white/50 z-10"></div>
    <x-admin-table-search-bars.supply-search-bar/>
    <div class="p-8 bg-white rounded space-y-8">
        @if ($variants->count() > 0)
            <div class="flex items-center space-x-4">
                <h3 class="text-black-1 font-medium">{{ __('supply.index.table.title') }}</h3>
                <x-badge>{{$variants->total()}}</x-badge>
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
                                <th>{{ __('supply.index.table.cols.length') }}</th>
                                <th>{{ __('supply.index.table.cols.unit_of_measurement') }}</th>
                                <th>{{ __('supply.index.table.cols.sale_price') }}</th>
                                <th>{{ __('supply.index.table.cols.purchase_price') }}</th>
                                <th>{{ __('supply.index.table.cols.quantity') }}</th>
                                <th>{{ __('supply.index.table.cols.manufacturer_availability') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($variants as $variant)
                                <livewire:components.admin-tables.supply.product_variant_row
                                    wire:key="variant_{{ $variant->id }}" :$variant
                                    :quantity="isset($items[$variant->id]) ? $items[$variant->id]['quantity'] : 0"/>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $variants->links() }}
        @else
            <div class="text-center">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
    @teleport('main')
    <div
        class="sticky bottom-0 h-20 flex items-center justify-end px-4 bg-color-f3f7f9 shadow-[0px_-8px_8px_-8px_#00000024]">
        <div class="flex items-center space-x-6">
            <p class="text-color-6c757d text-sm">
                {{ __('supply.index.table.footer.cart_total') }}: <span class="font-bold">@money($amount)</span>
            </p>
            <x-primary-button wire:click="send" wire:loading.attr="disabled" wire:target="send" type="button" :disabled="!$items" class="!bg-color-0c9d87 hover:!bg-color-0c9d87/90">
                {{ __('supply.index.table.footer.review_order') }}
            </x-primary-button>
        </div>
    </div>
    @endteleport
</div>
