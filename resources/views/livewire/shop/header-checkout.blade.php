<div class="w-full z-50 fixed top-0 xl:relative h-[60px] pl-4 pr-8 xl:px-[39px] bg-white flex items-center justify-between ">
    <div class="shrink-0 flex items-center">
        <a href="{{ route('home') }}">
            <x-icons name="logo" />
        </a>
    </div>

    <a href="{{ route('shop.cart') }}" class="relative">
        @if ($cart?->items->count() > 0)
            <div class="absolute top-[-9px] right-[-13px] w-5 h-5 bg-color-ff7f6e rounded-full text-white flex items-center justify-center text-[11px] font-semibold leading-[14px]">
                {{$cart->items->count()}}
            </div>
        @endif
        <x-icons name="shopping-bag" />
    </a>
</div>
