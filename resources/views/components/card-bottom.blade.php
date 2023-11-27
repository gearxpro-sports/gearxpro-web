@props(['image','title', 'description', 'colors', 'price', 'slug'])

<div class="max-w-[294px] xl:min-w-[594px] xl:max-w-[594px] xl:h-[727px] rounded-b-md overflow-hidden">
    <div class="w-full h-[calc(100%-108px)] bg-white flex items-center justify-center overflow-hidden">
        <img src="{{ $image }}" alt="">
    </div>
    <div class="bg-color-f2f0eb h-[108px] w-full flex border-y border-color-18181a border-x border-x-color-f2f0eb hover:border-y-color-f2f0eb rounded-b-md transition-all duration-300 group">
        <div class="h-full grow flex flex-col pl-3 xl:pl-5 py-4 relative">
            <h3 class="z-10 text-[15px] font-semibold leading-[19px] group-hover:text-white">{{ $title }}</h3>
            <p class="z-10 text-[12px] font-medium text-color-6c757d group-hover:text-color-b6b9bb line-clamp-1">{{ $description }}</p>
            @if ($colors)
                <div class="relative flex space-x-1 my-1 z-10">
                    @foreach($colors as $color)
                        <span style="background-color: {{ $color }}" class="inline-block w-3 h-3 border rounded-full"></span>
                    @endforeach
                </div>
            @endif

            {{-- <p class="z-10 text-[12px] font-medium text-color-6c757d group-hover:text-color-b6b9bb">{{ $color }} {{$color == '1' ? 'Colore' : 'Colori'}}</p> --}}
            <p class="z-10 text-[13px] font-medium text-color-18181a group-hover:text-white">@money($price)</p>
            <div class="h-full absolute top-0 left-0 w-0 bg-color-18181a group-hover:animate-line_slow group-hover:w-full rounded-bl-md"></div>
        </div>
        <a href="{{route('shop.show', ['product' => $slug, 'country_code' => session('country_code')])}}" class="h-full min-w-16 xl:min-w-[88px] py-4 flex items-center justify-center xl:border-l rounded-br-md border-color-18181a group-hover:border-color-f2f0eb group-hover:bg-color-18181a transition-all duration-500">
            <x-icons class="!w-[10px] group-hover:invert" name="double_arrow_right" />
        </a>
    </div>
</div>
