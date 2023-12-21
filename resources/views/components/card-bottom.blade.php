@props(['product', 'colors'])

<div class="max-w-[294px] xl:min-w-[594px] xl:max-w-[594px] xl:h-[727px] rounded-b-md overflow-hidden">
    <a href="{{route('shop.show', ['product' => $product->slug, 'country_code' => session('country_code')])}}" class="w-full h-[calc(100%-108px)] bg-white flex items-center justify-center overflow-hidden">
        <img src="{{ $product->defaultImages->medium }}" alt="">
    </a>
    <div class="bg-color-f2f0eb h-[108px] w-full flex border-y border-color-18181a border-x border-x-color-f2f0eb hover:border-y-color-f2f0eb rounded-b-md transition-all duration-300 group">
        <div class="h-full grow flex flex-col pl-3 xl:pl-5 py-4 relative">
            <h3 class="z-10 text-[15px] font-semibold leading-[19px] group-hover:text-white">{!! $product->categories?->first()->name ?? '&nbsp;' !!}</h3>
            <div class="z-10 pr-4 text-[12px] font-medium text-color-6c757d group-hover:text-color-b6b9bb line-clamp-1">{{ $product->name }}</div>
            @if ($colors)
                <div class="relative flex space-x-1 my-1 z-10">
                    @foreach($colors as $color)
                        @php
                            $colors = explode(',', $color);
                        @endphp
                        @if(count($colors) > 1)
                            <div
                                class="h-3 w-3 rounded-full"
                                style="background: linear-gradient(135deg, {{$colors[0]}} 50%, {{$colors[1]}} 50%);"
                            ></div>
                        @else
                            <div class="inline-block h-3 w-3 rounded-full"
                                 style="background-color: {{ $color }}"></div>
                        @endif
                    @endforeach
                </div>
            @endif
            <p class="z-10 text-[13px] font-medium text-color-18181a group-hover:text-white">@money($product->price)</p>
            <div class="h-full absolute top-0 left-0 w-0 bg-color-18181a group-hover:animate-line_slow group-hover:w-full rounded-bl-md"></div>
        </div>
        <a href="{{route('shop.show', ['product' => $product->slug, 'country_code' => session('country_code')])}}" class="h-full min-w-[64px] xl:min-w-[88px] py-4 flex items-center justify-center xl:border-l rounded-br-md border-color-18181a group-hover:border-color-f2f0eb group-hover:bg-color-18181a transition-all duration-500">
            <x-icons class="!w-[10px] group-hover:invert" name="double_arrow_right" />
        </a>
    </div>
</div>
