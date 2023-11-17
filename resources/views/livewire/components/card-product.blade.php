<div class="rounded-b-md overflow-hidden">
    <div class="bg-white flex items-center justify-center overflow-hidden">
        <img class="w-full p-10" src="{{ $product->defaultImages->medium ?: Vite::asset('resources/images/placeholder-medium.jpg') }}" alt="{{ $product->name }}">
    </div>
    <div class="bg-white flex border border-white border-x border-x-white hover:border-y-white rounded-b-md transition-all duration-300 group">
        <div class="h-full grow flex flex-col px-[20px] py-[16px] relative">
            <span class="z-10 text-[15px] font-semibold text-color-18181a leading-[19px]">{!! $product->categories?->first()->name ?? '&nbsp;' !!}</span>
            <h3 class="z-10 text-[12px] font-medium text-color-6c757d line-clamp-1">{{ $product->name }}</h3>
            @if ($availableColors)
                <div class="relative flex space-x-1 my-3 z-10">
                    @foreach($availableColors as $color)
                        <span style="background-color: {{ $color }}" class="inline-block w-3 h-3 rounded-full"></span>
                    @endforeach
                </div>
            @endif
            <p class="z-10 text-[13px] font-medium text-color-18181a">@money($product->price)</p>
            <div class="h-full absolute top-0 left-0 w-0 bg-color-edebe5 group-hover:animate-line_slow group-hover:w-full rounded-bl-md"></div>
        </div>
        <a href="{{route('shop.show', ['product' => $product->slug, 'country_code' => session('country_code')])}}" class="w-[88px] flex items-center justify-center border-l rounded-br-md border-white group-hover:border-white group-hover:bg-color-edebe5 transition-all duration-500">
            <x-icons name="detail" />
        </a>
    </div>
</div>
