<div class="rounded-md overflow-hidden max-w-[280px] md:max-w-[315px] xl:max-w-[560px]">
    <a href="{{route('shop.show', ['product' => $product->slug, 'country_code' => session('country_code')])}}" class="bg-white flex items-center justify-center overflow-hidden">
        <img class="w-full p-10" src="{{ $product->defaultImages->medium }}" alt="{{ $product->name }}">
    </a>
    <div class="bg-white flex border border-white border-x border-x-white hover:border-y-white rounded-b-md transition-all duration-300 group">
        <a href="{{route('shop.show', ['product' => $product->slug, 'country_code' => session('country_code')])}}"
            class="h-full grow flex flex-col px-2 py-3 xl:px-[20px] xl:py-[16px] relative">
            <span class="z-10 text-[15px] font-semibold text-color-18181a leading-[19px]">{!! $product->categories?->first()->name ?? '&nbsp;' !!}</span>
            <h3 class="z-10 text-[12px] font-medium text-color-6c757d line-clamp-1">{{ $product->name }}</h3>
            @if ($availableColors)
                <div class="relative flex space-x-1 my-2 z-10">
                    @foreach($availableColors as $color)
                        @php
                            $colors = explode(',', $color);
                        @endphp
                        @if(count($colors) > 1)
                            <div
                                class="inline-block h-3 w-3 border rounded-full"
                                style="background: linear-gradient(135deg, {{$colors[0]}} 50%, {{$colors[1]}} 50%);"
                            ></div>
                        @else
                            <div style="background-color: {{ $color }}" class="inline-block w-3 h-3 border rounded-full"></div>
                        @endif
                    @endforeach
                </div>
            @endif
            <p class="z-10 text-[13px] font-medium text-color-18181a mt-1 xl:mt-0">@money($product->price)</p>
            <div class="h-full absolute top-0 left-0 w-0 bg-color-edebe5 group-hover:animate-line_slow group-hover:w-full rounded-bl-md"></div>
        </a>
        <a href="{{route('shop.show', ['product' => $product->slug, 'country_code' => session('country_code')])}}" class="hidden w-[88px] lg:flex items-center justify-center border-l rounded-br-md border-white group-hover:border-white group-hover:bg-color-edebe5 transition-all duration-500">
            <x-icons name="detail" />
        </a>
    </div>
</div>
