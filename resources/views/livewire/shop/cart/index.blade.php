<div class="p-4 xl:px-10 xl:py-24 bg-color-f2f0eb">
    {{-- carrello --}}
    @if ($cart?->items->count())
        {{-- info carrello --}}
        <div>
            <h2 class="text-xl xl:text-3xl font-semibold text-color-18181a">{{ __('shop.cart.your_cart')}}</h2>
            <p class="text-sm xl:text-base text-color-18181a font-normal mt-2">{{ __('shop.cart.total')}}
                <span>
                    ({{ trans_choice('shop.cart.product', $cart->items->count(), ['value' => $cart->items->count()]) }})
                </span>
                {{--<span class="font-semibold">@money($cart->subtotal)</span>--}}
            </p>
            <p class="text-sm xl:text-base text-color-18181a font-normal mt-2 xl:mt-0">{{ __('shop.cart.shop_complete')}}</p>
        </div>
        <div class="grid grid-cols-6 xl:gap-14 border-color-ff7f6e xl:border-0 pb-5 xl:pb-0 xl:mb-36">
            {{-- Prodotti inseriti --}}
            <div class="col-span-6 xl:col-span-4 mt-12 xl:mt-14">
                @foreach($cart->items as $item)
                    <div class="relative" wire:key="wrapper_{{$item->product_variant_id}}">
                        @if(in_array($item->product_variant_id, array_keys($not_available)))
                                <x-icons
                                    x-data
                                    x-tooltip.raw="{{ __('notifications.cart.product_not_available.tooltip', ['quantity' => $not_available[$item->product_variant_id]]) }}"
                                    name="exclamation-circle"
                                    class="absolute -left-4 top-0 -translate-y-4 lg:-translate-y-6 lg:top-1/2 z-10 w-8 h-8 text-white fill-red-400"></x-icons>
                        @endif
                        <livewire:shop.components.cart.cart-item wire:key="item_{{$item->product_variant_id}}" :$item/>
                    </div>
                @endforeach

                <div class="w-full h-px bg-color-ff7f6e -mt-5 mb-11 xl:my-6"></div>
                <div class="w-72 hidden xl:block">
                    <x-shop.shopping-button
                        href="{{ route('shop.index', ['country_code' => session('country_code')]) }}"
                        color="transparent"
                        icon="back">
                        {{ __('shop.cart.back_to_shopping') }}
                    </x-shop.shopping-button>
                </div>
            </div>

            {{-- riepilogo ordine --}}
            <div class="col-span-6 xl:col-span-2">
                <h2 class="text-xl font-semibold text-color-18181a">{{ __('shop.cart.summary')}}</h2>
                {{-- TODO: Coupon Code --}}
                {{--                <div--}}
                {{--                    class="bg-color-edebe5 w-full h-12 flex items-center justify-between px-5 rounded-md mt-4">--}}
                {{--                    <input wire:model='promoCode' type="text" placeholder="{{ __('shop.cart.promo_code')}}"--}}
                {{--                           class="bg-transparent border-none p-0 text-xs placeholder:text-xs placeholder:font-normal placeholder:text-color-6c757d border-transparent focus:border-transparent focus:ring-0">--}}
                {{--                    <button wire:click='applyCode'--}}
                {{--                            class=" text-xs font-medium text-color-6c757d">{{ __('shop.cart.apply')}}</button>--}}
                {{--                </div>--}}

                {{-- subtotale --}}
                <div class="flex justify-between items-center my-6">
                    <span
                        class="text-xs font-medium text-color-18181a">{{ __('shop.cart.subtotal')}}</span>
                    <span class="text-xs font-medium text-color-18181a">@money($cart->subtotal)</span>
                </div>
                {{-- spedizione --}}
                <div class="flex justify-between items-center mb-6">
                    <span
                        class="text-xs font-medium text-color-18181a">{{ __('shop.cart.shipping_cost')}}</span>
                    <span class="text-xs font-medium text-color-18181a">
                        @if(config('app.shipping_cost') <= 0)
                            {{ __('common.free_shipping') }}
                        @else
                            @money(config('app.shipping_cost'))
                        @endif
                    </span>
                </div>
                {{-- totale --}}
                <div
                    class="w-full py-3.5 border-y border-color-ff7f6e flex items-center justify-between mb-5 xl:mb-[47px]">
                    <span
                        class="font-medium text-color-18181a">{{ __('shop.cart.total')}}</span>
                    <span class="font-semibold text-color-18181a">@money($cart->total)</span>
                </div>

                <div class="sticky bottom-10 left-0">
                    @auth
                        <x-shop.shopping-button wire:click="checkIfCartItemsAreAvailable" color="orange"
                                                icon="arrow-right-xl">
                            {{ __('shop.cart.go_to_pay') }}
                        </x-shop.shopping-button>
                    @else
                        <x-shop.shopping-button
                            href="{{ route('shop.checkout', ['country_code' => session('country_code')]) }}"
                            color="orange"
                            icon="arrow-right-xl">
                            {{ __('shop.cart.go_to_pay') }}
                        </x-shop.shopping-button>
                    @endauth
                </div>
            </div>
        </div>

        {{-- carousel --}}
        {{-- <div class="xL:pl-[39px] col-span-12 mt-10 mb-28 xl:mt-5 xl:mb-0">
            <div class="relative">
                <h2 class="mb-3 xl:mb-[27px] text-2xl xl:text-3xl font-semibold leading-9 xl:leading-[40px] text-color-18181a">{{ __('shop.cart.product_recommended')}}</h2>

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
        </div> --}}
    @else
        <div>
            <h2 class="text-3xl font-semibold text-color-18181a">{{ __('shop.cart.cart_empty')}}</h2>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
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
