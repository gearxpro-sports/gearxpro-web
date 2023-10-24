<div class="pt-[70px] bg-color-f2f0eb pb-[150px]">

    {{-- carrello --}}
    @if (count($cart) > 0)
        <div class="px-[39px] grid grid-cols-12 mb-[150px]">
            {{-- info carrello --}}
            <div class="col-span-12">
                <div>
                    <h2 class="text-[33px] font-semibold leading-[40px] text-color-18181a">{{ __('shop.cart.your_cart')}}</h2>
                        <p class="text-[17px] leading-[38px] text-color-18181a font-normal">{{ __('shop.cart.total')}} (2 {{ __('shop.cart.product')}})
                            <span class="font-semibold">70,00 €</span>
                        </p>
                        <p class="text-[17px] leading-[17px] text-color-18181a font-normal">{{ __('shop.cart.shop_complete')}}</p>
                </div>
            </div>

            {{-- Prodotti inseriti --}}
            <div class="col-span-8 mt-[55px]">
                <div class="w-fit border border-color-e0e0df flex">

                    {{-- specifiche prodotto --}}
                    <div class="p-[5px] w-[578px] flex gap-[29px]">
                        <div class="w-[202px] h-[210px] bg-white">
                            <img src="" alt="">
                        </div>
                        <div class="my-auto">
                            <h3 class="text-[17px] font-semibold leading-[20px] text-color-18181a mb-[10px]">SOXPro Trekking</h3>
                            <p class="text-[15px] font-medium leading-[19px] text-color-18181a mb-[20px]">SOXPro</p>
                            <p class="text-[15px] font-medium leading-[19px] text-color-18181a mb-[10px]">{{ __('shop.products.color')}} Green</p>
                            <p class="text-[15px] font-medium leading-[19px] text-color-18181a">{{ __('shop.products.size')}} M</p>
                        </div>
                    </div>

                    {{-- quantita --}}
                    <div class="w-[248px] border-x border-color-e0e0df flex items-center justify-center">
                        <div class="w-[185px] h-[48px] rounded-md flex items-center border border-color-b6b9bb mt-5">
                            <div wire:click="removeProduct" class="w-[60px] h-full flex items-center justify-center bg-transparent border-r border-color-b6b9bb">
                                <x-heroicon-o-minus class="h-5 w-5"></x-heroicon-o-minus>
                            </div>
                            <div class="w-[65px] h-full flex items-center justify-center text-[13px] font-medium leading-[16px] text-color-18181a">2</div>
                            <div wire:click="addProduct" class="w-[60px] h-full flex items-center justify-center bg-transparent border-l border-color-b6b9bb">
                                <x-heroicon-o-plus class="h-5 w-5"></x-heroicon-o-plus>
                            </div>
                        </div>
                    </div>

                    {{-- prezzo --}}
                    <div class="w-[176px] flex items-center justify-center border-r border-color-e0e0df">
                        <span class=" text-[15px] font-medium leading-[19px] text-color-18181a">€ 70,00</span>
                    </div>

                    {{-- rimozione --}}
                    <div class="w-[156px] flex items-center justify-center">
                        <button class="text-[12px] font-medium leading-[15px] text-color-6c757d group">
                            <div class="flex items-center gap-1 mb-[2px]">
                                {{ __('shop.cart.remove')}}
                                <img src="{{ Vite::asset('resources/images/icons/delete.svg')}}" alt="">
                            </div>
                            <div class="h-[1px] w-0 bg-color-6c757d group-hover:animate-line group-hover:w-full"></div>
                        </button>
                    </div>
                </div>

                <div class="w-[1160px] h-[1px] bg-color-ff7f6e mt-[27px] mb-[24px]"></div>

                <x-custom-button-2 :text="__('shop.cart.back_to_shopping')" :icon="'back'" :link="'/shop'" />
            </div>

            {{-- riepilogo ordine --}}
            <div class="col-span-3">
                <h2 class="text-[21px] font-semibold leading-[38px] text-color-18181a">{{ __('shop.cart.summary')}}</h2>
                {{-- PromoCode --}}
                <div class="bg-color-edebe5 w-full h-[48px] flex items-center justify-between px-5 rounded-md mt-[15px]">
                    <input wire:model='promoCode' type="text" placeholder="{{ __('shop.cart.promo_code')}}" class="bg-transparent border-none p-0 placeholder:text-[13px] placeholder:font-normal placeholder:text-color-6c757d border-transparent focus:border-transparent focus:ring-0">
                    <button wire:click='applyCode' class=" text-[12px] font-medium leading-[15px] text-color-6c757d">{{ __('shop.cart.apply')}}</button>
                </div>

                {{-- subtotale --}}
                <div class="flex justify-between items-center my-[22px]">
                    <span class="text-[13px] font-medium leading-[16px] text-color-18181a">{{ __('shop.cart.subtotal')}}</span>
                    <span class="text-[13px] font-medium leading-[16px] text-color-18181a">€ 70,00</span>
                </div>
                {{-- spedizione --}}
                <div class="flex justify-between items-center mb-[22px]">
                    <span class="text-[13px] font-medium leading-[16px] text-color-18181a">{{ __('shop.cart.shipping_cost')}}</span>
                    <span class="text-[13px] font-medium leading-[16px] text-color-18181a">{{ __('shop.cart.free')}}</span>
                </div>
                {{-- totale --}}
                <div class="h-[61px] w-full border-y border-color-ff7f6e flex items-center justify-between mb-[47px]">
                    <span class="text-[15px] font-medium leading-[19px] text-color-18181a capitalize">{{ __('shop.cart.total')}}</span>
                    <span class="text-[15px] font-semibold leading-[19px] text-color-18181a">€ 70,00</span>
                </div>

                <x-custom-button-3 :text="__('shop.cart.go_to_pay')" :icon="'arrow-right-xl'" :link="'/shop'" />
            </div>
        </div>

        {{-- carousel --}}
        <div class="pl-[39px] col-span-12 mt-5">
            <div class="relative">
                <h2 class="mb-[27px] text-[33px] font-semibold leading-[40px] text-color-18181a">{{ __('shop.cart.product_recommended')}}</h2>

                <div class="group-custom-button">
                    <div wire:ignore class="owl-carousel carousel_performance">
                        @foreach ($productsRecommended as $key => $prod )
                            <x-card-reccomended
                                :key="$key"
                                :image="$prod['image']"
                                :name="$prod['name']"
                                :description="$prod['description']"
                                :availableColor="$prod['availableColor']"
                                :price="$prod['price']"
                            />
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="col-span-12">
            <h2 class="text-[33px] font-semibold leading-[40px] text-color-18181a">{{ __('shop.cart.cart_empty')}}</h2>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            var carousel = new $(".carousel_performance").owlCarousel({
                items: 4,
                margin: 15,
                loop: true,
                autoWidth: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                infinite: true,
            });
        });
    </script>
@endpush
