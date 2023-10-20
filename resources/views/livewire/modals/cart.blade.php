<div class="relative px-[45px] py-[30px]">
    <img wire:click="$dispatch('closeModal')" src="{{ Vite::asset('resources/images/icons/x-close.svg')}}" class="absolute top-[30px] right-[30px] cursor-pointer" alt="">

    <div class="flex items-center gap-[10px] mb-5">
        <div class="w-[28px] h-[28px] rounded-full bg-color-8be599 shadow flex items-center justify-center">
            <img class="mt-1" src="{{ Vite::asset('resources/images/icons/check-product.svg')}}" alt="">
        </div>
        <h3 class="text-[15px] font-medium leading-[19px] text-color-18181a">{{__('shop.modal_cart.add_product')}}</h3>
    </div>

    @foreach ($cart as $product )
        <div class="flex gap-5 border border-color-f2f0eb p-1">
            <div class="w-[116px] h-[120px] overflow-hidden bg-color-edebe5">
                <img src="" alt="">
            </div>

            <div class="my-auto">
                <h4 class="text-[13px] font-semibold leading-[24px] text-color-18181a">{{$product['name']}}</h4>
                <p class="text-[12px] font-medium leading-[15px] text-color-6c757d">{{__('shop.products.color')}}: {{$product['color']}}</p>
                <p class="text-[12px] font-medium leading-[15px] text-color-6c757d">{{__('shop.products.size')}}: {{$product['size']}}</p>
                <p class="text-[12px] font-medium leading-[15px] text-color-6c757d">{{__('shop.products.amount')}}: {{$product['quantity']}}</p>
                <p class="text-[13px] font-medium leading-[16px] text-color-18181a">{{$money}} {{number_format($product['price'], 2, ',', '.')}}</p>
            </div>
        </div>
    @endforeach

    <div class="flex items-center justify-between mt-[43px]">
        <div class="px-[25px] h-[45px] flex items-center justify-center rounded-md text-white text-[13px] font-semibold leading-[32px] bg-color-ff7f6e hover:bg-white hover:text-color-18181a border border-transparent hover:border-color-18181a">
            {{__('shop.modal_cart.button_show')}}
        </div>
        <div class="px-[25px] h-[45px] flex items-center justify-center rounded-md text-white text-[13px] font-semibold leading-[32px] bg-color-18181a hover:bg-black">
            {{__('shop.modal_cart.button_pay')}}
        </div>
    </div>
</div>
