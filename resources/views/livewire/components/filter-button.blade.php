<div wire:click="toggle" class="w-[224px] h-[48px] bg-transparent rounded-md flex justify-between items-center border border-black hover:border-white group">
    <div class="h-full flex items-center grow relative group-hover:text-white">
        <span class="z-10 text-[15px] font-semibold m-auto pr-8">
            @if ($filter)
                {{__('shop.products.button_filter_off')}}
            @else
                {{__('shop.products.button_filter_on')}}
            @endif
        </span>
        <div class="h-full absolute top-0 w-0 bg-black group-hover:animate-line group-hover:w-full rounded-l-md"></div>
    </div>
    <div class="h-full border-l border-black group-hover:border-white w-[47px] flex items-center justify-center group-hover:bg-black rounded-r-md">
        <div class="group-hover:invert">
            <x-icons name="filter_products" />
        </div>
    </div>
</div>
