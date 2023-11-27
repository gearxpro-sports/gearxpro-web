<div class="flex flex-col xl:flex-row border-b xl:border border-color-e0e0df relative mb-5 pb-5 xl:pb-0 xl:mb-1">

    <div class="flex flex-1 xl:p-1 gap-7">
        <div class="w-20 h-20 xl:w-48 xl:h-48">
            <img src="{{ $item->variant->getThumbUrl() ?: Vite::asset('resources/images/placeholder-medium.jpg') }}"
                 alt="{{ $item->variant->product->name }}">
        </div>
        <div class="my-auto">
            <div class="flex flex-col gap-2 xl:gap-1 mb-2 xl:mb-1">
                <h3 class="text-sm font-bold xl:text-lg xl:font-semibold text-color-18181a">{{ $item->variant->product->name }}</h3>
                <p class="text-sm text-color-18181a xl:mb-[20px]">
                    {{ $item->variant->product->categories->first()?->name }}
                </p>
            </div>
            <div class="flex flex-col gap-2 xl:gap-1">
                @if($item->variant->length)
                    <p class="text-sm font-normal xl:font-medium text-color-18181a">
                        {{ __('shop.products.height_leg')}}: {{ $item->variant->length->value }}</p>
                @endif
                @if($item->variant->color)
                    <p class="text-sm font-normal xl:font-medium text-color-18181a">
                        {{ __('shop.products.color')}}: {{ $item->variant->color->value }}</p>
                @endif
                @if($item->variant->size)
                    <p class="text-sm font-normal xl:font-medium text-color-18181a">
                    {{ __('shop.products.size')}}: {{ $item->variant->size->value }}</p>
                @endif
                <span class="xl:hidden font-medium text-color-18181a">@money(($item->price * $item->quantity))</span>
            </div>
        </div>
    </div>

    <div
        class="w-[248px] pl-11 xl:pl-0 mx-auto mt-4 xl:mt-0 xl:m-0 xl:border-x border-color-e0e0df flex items-center justify-center">
        <div
            class="w-[185px] h-[48px] rounded-md flex items-center border border-color-b6b9bb">
            <div wire:click="decrement"
                 class="{{ $item->quantity === 1 ? 'cursor-not-allowed text-gray-300' : 'cursor-pointer' }} w-[60px] h-full flex items-center justify-center bg-transparent border-r border-color-b6b9bb">
                <x-icons name="minus" class="h-3 w-3"></x-icons>
            </div>
            <div
                class="w-[65px] h-full flex items-center justify-center text-[13px] font-medium leading-[16px] text-color-18181a font-mono select-none">{{ $item->quantity }}</div>
            <div wire:click="increment"
                 class="{{ $item->quantity >= $variantQuantity ? 'cursor-not-allowed text-gray-300' : 'cursor-pointer' }} w-[60px] h-full flex items-center justify-center bg-transparent border-l border-color-b6b9bb">
                <x-icons name="plus" class="h-3 w-3"></x-icons>
            </div>
        </div>
    </div>

    <div class="hidden xl:flex w-44 items-center justify-center border-r border-color-e0e0df">
        <span class="font-medium text-color-18181a">@money($item->price)</span>
    </div>

    <div class="absolute xl:static bottom-10 right-4 xl:w-36 flex items-center justify-center">
        <div wire:click="remove" class="text-xs font-medium text-color-6c757d cursor-pointer">
            <div class="flex items-center space-x-1">
                <span class="hidden xl:block">{{ __('shop.cart.remove')}}</span>
                <x-icons name="trash" class="scale-150 xl:scale-100"></x-icons>
            </div>
        </div>
    </div>
</div>
