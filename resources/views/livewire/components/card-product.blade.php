<div
    @class([
        'grow rounded-b-md overflow-hidden',
        $cardSmall ? 'max-w-[434px] h-[561px]' : 'max-w-[594px] h-[727px]',
    ])
 >
    <div class="h-[calc(100%-108px)] bg-white flex items-center justify-center overflow-hidden">
        <img src="{{ Vite::asset('resources/images/'. $image)}}" alt="">
    </div>
    <div class="bg-white h-[108px] flex border border-white border-x border-x-white hover:border-y-white rounded-b-md transition-all duration-300 group">
        <div class="h-full grow flex flex-col px-[20px] py-[16px] relative">
            <h3 class="z-10 text-[15px] font-semibold text-color-18181a leading-[19px]">{{ $name }}</h3>
            <p class="z-10 text-[12px] font-medium text-color-6c757d">{{ $description }}</p>
            <p class="z-10 text-[12px] font-medium text-color-6c757d">{{ $availableColor }} {{$availableColor == '1' ? 'Colore' : 'Colori'}}</p>
            <p class="z-10 text-[13px] font-medium text-color-18181a">€ {{ $price }}</p>
            <div class="h-full absolute top-0 left-0 w-0 bg-color-edebe5 group-hover:animate-line_slow group-hover:w-full rounded-bl-md"></div>
        </div>
        <a href="{{route('shop.show', $name)}}" class="h-full w-[88px] flex items-center justify-center border-l rounded-br-md border-white group-hover:border-white group-hover:bg-color-edebe5 transition-all duration-500">
            <img class="hidden group-hover:block" src="{{ Vite::asset('resources/images/icons/vedi_dettaglio.svg')}}" alt="">
        </a>
    </div>
</div>
