<div class="w-full px-1 pt-[16px]">
    <div wire:click="dropOpen" class="flex justify-between items-center pb-[16px] border-b border-color-e0e0df cursor-pointer">
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
            @foreach ($options as $id => $color )
                <button wire:click="selectColor('{{ $id }}')" class="w-[44px] h-[44px] rounded-full bg-white p-[2px] hover:shadow-shadow-3">
                    <span style="background-color:{{ $color }}" class='inline-block w-full h-full rounded-full border'></span>
                </button>
            @endforeach
        </div>
    </div>
</div>
