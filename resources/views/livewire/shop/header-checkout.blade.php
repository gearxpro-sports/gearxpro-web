<div class="w-full h-[60px] px-[39px] bg-white flex items-center justify-between ">
    <div class="shrink-0 flex items-center">
        <a href="{{ route('home') }}">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
        </a>
    </div>

    @if (!request()->routeIs('confirm'))
        <a href="{{ route('shop.cart') }}" class="relative">
            @if ($products)
                <div class="absolute top-[-9px] right-[-13px] w-5 h-5 bg-color-ff7f6e rounded-full text-white flex items-center justify-center text-[11px] font-semibold leading-[14px]">{{$products}}</div>
            @endif
            <img src="{{ Vite::asset('resources/images/icons/shopping-bag.svg')}}" alt="">
        </a>
    @endif
</div>
