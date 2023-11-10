<div class="flex border border-color-e0e0df">
    <div class="flex flex-1 p-1 gap-7">
        <div class="w-48 h-48 bg-white"></div>
        <div class="my-auto">
            <div>
                <h3 class="text-lg font-semibold text-color-18181a">{{ $variant->product->name }}</h3>
                <p class="text-sm text-color-18181a mb-[20px]">
                    {{ $variant->product->categories->first()?->name }}
                </p>
            </div>
            <div class="space-y-1">
                <p class="text-sm font-medium text-color-18181a">
                    {{ __('shop.products.height_leg')}}: {{ $variant->length->value }}</p>
                <p class="text-sm font-medium text-color-18181a">
                    {{ __('shop.products.color')}}: {{ $variant->color->value }}</p>
                <p class="text-sm font-medium text-color-18181a">
                    {{ __('shop.products.size')}}: {{ $variant->size->value }}
            </div>
            </p>
        </div>
    </div>

    <div class="w-[248px] border-x border-color-e0e0df flex items-center justify-center">
        <div
            class="w-[185px] h-[48px] rounded-md flex items-center border border-color-b6b9bb">
            <div wire:click="decrement"
                 class="{{ $item->quantity === 1 ? 'cursor-not-allowed text-gray-300' : 'cursor-pointer' }} w-[60px] h-full flex items-center justify-center bg-transparent border-r border-color-b6b9bb">
                <x-icons name="minus" class="h-3 w-3"></x-icons>
            </div>
            <div
                class="w-[65px] h-full flex items-center justify-center text-[13px] font-medium leading-[16px] text-color-18181a font-mono select-none">{{ $item->quantity }}</div>
            <div wire:click="increment"
                 class="{{ $item->quantity >= $variant?->quantity ? 'cursor-not-allowed text-gray-300' : 'cursor-pointer' }} w-[60px] h-full flex items-center justify-center bg-transparent border-l border-color-b6b9bb">
                <x-icons name="plus" class="h-3 w-3"></x-icons>
            </div>
        </div>
    </div>

    <div class="w-44 flex items-center justify-center border-r border-color-e0e0df">
        <span class="font-medium text-color-18181a">@money($item->price)</span>
    </div>

    <div class="w-36 flex items-center justify-center">
        <div wire:click="remove" class="text-xs font-medium text-color-6c757d cursor-pointer">
            <div class="flex items-center space-x-1">
                <span>{{ __('shop.cart.remove')}}</span>
                <x-icons name="trash"></x-icons>
            </div>
        </div>
    </div>
</div>
