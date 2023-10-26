<div class="relative">
    <div wire:loading class="absolute inset-0 bg-white/50 z-10"></div>
    <x-admin-table-search-bars.products-search-bar />
    <div class="p-8 bg-white rounded space-y-8">
        @if ($products->count() > 0)
        <div class="flex items-center space-x-4">
            <h3 class="text-black-1 font-medium">{{ __('products.index.table.title') }}</h3>
            <x-badge>{{ $products->total() }}</x-badge>
        </div>
        <table class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
            <thead>
                <tr class="[&>th]:py-4 [&>th]:px-7 [&>th]:font-medium [&>th]:w-1/5 border-b-color-eff0f0">
                    <th class="text-left">{{ __('products.index.table.cols.name') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                    <td>{{ $product->name }}</td>
                    <td class="text-right">
                        <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm" href="{{ route('products.edit', ['product' => $product->id]) }}">
                            <x-icons name="edit" class="w-4 h-4" />
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
        @else
            <div class="text-center">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
</div>
