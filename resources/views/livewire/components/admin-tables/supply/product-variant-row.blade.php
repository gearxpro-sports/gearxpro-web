<tr class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
    <td>
        <div class="flex items-center space-x-2">
            <div class="w-10 h-10 bg-gray-100 flex-shrink-0"></div>
            <span class="whitespace-nowrap">{{ $variant->product->name }} - {{ $variant->color->value }}</span>
        </div>
    </td>
    <td>{{ $variant->sku }}</td>
    <td>
        {{ $variant->size->value }}
    </td>
    <td>{{ $variant->length->value }}</td>
    <td>unit_of_measurement</td>
    <td>{{ $variant->product->price }}</td>
    <td>{{ $variant->product->wholesale_price }}</td>
    <td>
        <livewire:components.counter wire:model="quantity" wire:key="$variant->id" :disabled="!$variant->inStock()"/>
    </td>
    <td class="whitespace-nowrap">
        <div class="flex items-center space-x-2">
            <div class="w-2 h-2 {{ $variant->inStock() ? 'bg-color-4dd3aa' : 'bg-color-f55b3f' }} rounded-full flex-shrink-0"></div>
            <span>{{ $variant->inStock() ? __('products.stock.in_stock') : __('products.stock.out_of_stock') }}</span>
        </div>
    </td>
    <td class="text-right">
        <x-supply-button :disabled="!$variant->inStock()" wire:click="addItem({{ $variant->id }})" />
    </td>
</tr>
