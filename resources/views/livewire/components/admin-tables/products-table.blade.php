<div class="relative">
    <div wire:loading class="absolute inset-0 bg-white/50 z-10"></div>
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
    </div>
    <div class="p-8 bg-white rounded space-y-8">
        @if ($products->count() > 0)
        <div class="flex items-center space-x-4">
            <h3 class="text-black-1 font-medium">{{ __('products.index.table.title') }}</h3>
            <x-badge>{{ $products->total() }}</x-badge>
        </div>
        <table class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
            <thead>
                <tr class="[&>th]:py-4 [&>th]:px-7 [&>th]:font-medium border-b-color-eff0f0">
                    <th class="w-1 uppercase text-center">{{ __('categories.index.table.cols.id') }}</th>
                    <th class="w-24"></th>
                    <th class="text-left w-1/5 ">{{ __('products.index.table.cols.name') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="[&>td]:py-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                    <td class="text-color-6c757d text-center">{{ $product->id }}</td>
                    <td class="!p-4">
                        @if ($product->defaultVariantWithMedia)
                        <img class="p-1 bg-white border border-color-dee2e6/50 rounded-sm" src="{{ $product->defaultVariantWithMedia->getThumbUrl('preview') }}" alt="{{ $product->name }}">
                        @else
                        <div class="w-16 h-16 bg-color-f3f7f9"></div>
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <div class="flex items-center space-x-2 justify-end">
                            <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm" href="{{ route('products.edit', ['product' => $product->slug]) }}">
                                <x-icons name="edit" class="w-4 h-4" />
                            </a>
                            <button type="button" class="flex items-center justify-center bg-color-e54f33 text-white w-8 h-8 text-center rounded-sm" wire:click="deleteProduct({{ $product->id }})" wire:confirm="{{ __('products.index.alert.delete_product') }}">
                                <x-icons name="trash" class="w-3 h-3" />
                            </button>
                        </div>
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
