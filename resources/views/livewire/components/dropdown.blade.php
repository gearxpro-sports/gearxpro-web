<div class="w-full px-1 pt-[16px]">
    <div wire:click="dropOpen" class="flex justify-between items-center pb-[16px] border-b border-color-e0e0df">
        <h5 class="text-[15px] font-medium leading-[19px] text-color-18181a uppercase">{{$name}}</h5>
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
        <ul>
           @foreach ($options as $option )
               <li wire:click="action('type', 'element')" class="py-4 text-[13px] font-medium leading-[16px] text-color-18181a hover:text-color-323a46 flex items-center gap-4 group">
                    <x-icons name="ellisse" />
                   {{$option}}
               </li>
           @endforeach
       </ul>
    </div>
</div>
