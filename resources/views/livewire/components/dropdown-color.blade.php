<div class="w-full px-1 pt-[16px]">
    <div wire:click="dropOpen" class="flex justify-between items-center pb-[16px] border-b border-color-e0e0df">
        <h5 class="text-[15px] font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.products.color')}}</h5>
        <img src="{{ Vite::asset('resources/images/icons/minus_menu.svg')}}" alt=""
            @class([
            'invisible transition-all duration-300 ease-out opacity-20',
            $open ? '!visible !opacity-100' : '',
        ])>
    </div>

    <div
    @class([
        'h-0 transition-all duration-1000 ease-out overflow-hidden',
        $open ? '!h-fit' : '',
    ])>
        <div class="flex flex-wrap items-center gap-5 py-5">
            @foreach ($options as $option )
                <div class="flex items-center gap-3 w-[calc(50%-20px)]">
                    <div wire:click="selectColor('{{ $option['color'] }}')" class="w-[44px] h-[44px] rounded-full shadow-shadow-3 bg-white p-[2px]">
                        <div style="background-color:{{$option['color']}}" class='w-full h-full rounded-full border'></div>
                    </div>
                    <span class="text-[13px] font-medium leading-[16px] capitalize">{{$option['name']}}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
