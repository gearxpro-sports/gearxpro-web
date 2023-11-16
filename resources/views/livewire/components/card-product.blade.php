<div class="rounded-b-md overflow-hidden">
    <div class="h-[calc(100%-114px)] bg-white flex items-center justify-center overflow-hidden">
        <img class="w-full" src="{{ Vite::asset('resources/images/'. $image)}}" alt="">
    </div>
    <div class="bg-white h-[108px] flex border border-white border-x border-x-white hover:border-y-white rounded-b-md transition-all duration-300 group">
        <div class="h-full grow flex flex-col px-[20px] py-[16px] relative">
            @if($category)
            <span class="z-10 text-[15px] font-semibold text-color-18181a leading-[19px]">{{ $category->name }}</span>
            @endif
            <h3 class="z-10 text-[12px] font-medium text-color-6c757d line-clamp-1">{{ $name }}</h3>
            @if ($availableColors)
            <p class="z-10 text-[12px] font-medium text-color-6c757d">{{ $availableColors }} {{$availableColors == '1' ? 'Colore' : 'Colori'}}</p>
            @endif
            <p class="z-10 text-[13px] font-medium text-color-18181a">@money($price)</p>
            <div class="h-full absolute top-0 left-0 w-0 bg-color-edebe5 group-hover:animate-line_slow group-hover:w-full rounded-bl-md"></div>
        </div>
        <a href="{{route('shop.show', ['product' => $slug, 'country_code' => session('country_code')])}}" class="h-full min-w-[88px] flex items-center justify-center border-l rounded-br-md border-white group-hover:border-white group-hover:bg-color-edebe5 transition-all duration-500">
            <x-icons name="detail" />
        </a>
    </div>
</div>
