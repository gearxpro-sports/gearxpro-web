<div class="w-full px-1 pt-[16px]">
    <div wire:click="dropOpen" class="flex justify-between items-center pb-[16px] border-b border-color-e0e0df">
        <h5 class="text-[15px] font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.products.size')}}</h5>
        <x-icons name="minus_menu" @class([
            'invisible transition-all duration-300 ease-out opacity-20',
            $open ? '!visible !opacity-100' : '',
        ])/>
    </div>

    <div
    @class([
        'h-0 transition-all duration-1000 ease-out overflow-hidden',
        $open ? '!h-fit' : '',
    ])>
        <div class="flex flex-wrap items-center gap-[17px] py-5">
            @foreach ($options as $option )
                <div wire:click="selectSize('{{ $option }}')" class="w-[48px] h-[46px] bg-color-edebe5 border border-color-e0e0df rounded-sm flex items-center justify-center">
                    <span class="text-[13px] font-medium leading-[16px] text-color-6c757d uppercase">{{$option}}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
