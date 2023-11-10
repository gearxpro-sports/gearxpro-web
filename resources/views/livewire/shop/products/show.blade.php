<div class="bg-color-f2f0eb">
    <div class="p-[39px] grid grid-cols-12 gap-[30px]">
        {{-- image --}}
        <div class="col-span-7 h-[1104px] overflow-y-auto scrollBar flex flex-col gap-4 pb-4">
            @if ($selectedLength == 1)
                {{-- Corto --}}
                <img src="{{ Vite::asset('resources/images/SOXPro-1.png')}}" alt="">
                <img src="{{ Vite::asset('resources/images/SOXPro-2.png')}}" alt="">
                <img src="{{ Vite::asset('resources/images/SOXPro-3.png')}}" alt="">
            @else
                <img src="{{ Vite::asset('resources/images/SOXPro-1-long.png')}}" alt="">
                <img src="{{ Vite::asset('resources/images/SOXPro-2-long.png')}}" alt="">
            @endif
        </div>

        {{-- options --}}
        <div class="col-span-5 col-start-8 py-10">
            {{-- detail --}}
            <div>
                {{--                <span class="text-[17px] leading-[28px] text-color-6c757d">{{$product->name}}</span>--}}
                <h1 class="text-[33px] font-semibold leading-[40px] text-color-18181a">{{$product->name}}</h1>
                <p class="text-[21px] font-medium leading-[38px] text-color-18181a">@money($product->price)</p>
            </div>
            <div class="w-full max-w-md mt-10 space-y-10">
                @if($allLengths)
                    <div wire:key="lengths" class="space-y-5">
                        <p class="text-sm font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.products.height_leg')}}</p>
                        <div>
                            <div
                                class="grid grid-cols-2 gap-x-1 rounded-md p-1 text-center text-xs font-semibold leading-5 ring-1 ring-inset ring-gray-200 bg-color-edebe5">
                                @foreach($allLengths as $id => $length)
                                    @if(in_array($id, array_keys($lengths)))
                                        <div
                                            wire:key="length-{{$id}}"
                                            wire:click="setLength({{ $id }})"
                                            @class([
                                            'cursor-pointer h-14 text-sm flex items-center justify-center rounded-md px-2.5 py-1',
                                            $selectedLength == $length['id'] ? 'bg-color-18181a text-white' : 'text-color-6c757d'])
                                        >
                                            <span>{{ $length['value'] }}</span>
                                        </div>
                                    @else
                                        <div
                                            wire:key="length-{{$id}}"
                                            wire:click="resetAll('length', {{ $id }})"
                                            @class([
                                            'opacity-10 pointer-events-none h-14 text-sm flex items-center justify-center rounded-md px-2.5 py-1',
                                            $selectedLength == $length['id'] ? 'bg-color-18181a text-white' : 'text-color-6c757d'])
                                        >
                                            <span>{{ $length['value'] }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if($allColors)
                    <div wire:key="colors" class="space-y-5">
                        <p class="text-sm font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.products.color')}}</p>
                        <div>
                            <div class="flex flex-wrap items-center gap-4">
                                @foreach($allColors as $id => $color)
                                    @if(in_array($id, array_keys($colors)))
                                        <div
                                            wire:key="color-{{$id}}"
                                            wire:click="setColor({{ $color['id'] }})"
                                            @class([
                                                'flex-shrink-0 cursor-pointer h-12 w-12 relative flex items-center justify-center rounded-full p-0.5 focus:outline-none ring-transparent',
                                                $selectedColor == $color['id'] ? 'ring ring-offset-2' : 'ring-2'])
                                            style="background-color: {{ $color['color'] }}; --tw-ring-color: {{$color['color']}}"
                                        >
                                        </div>
                                    @else
                                        <div
                                            wire:key="color-{{$id}}"
                                            wire:click="resetAll('color', {{ $id }})"
                                            @class([
                                                'flex-shrink-0 opacity-10 pointer-events-none h-12 w-12 relative flex items-center justify-center rounded-full p-0.5 focus:outline-none ring-transparent',
                                                $selectedColor == $color['id'] ? 'ring ring-offset-2' : 'ring-2'])
                                            style="background-color: {{ $color['color'] }}; --tw-ring-color: {{$color['color']}}"
                                        >
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if($allSizes)
                    <div wire:key="sizes" class="space-y-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-color-18181a uppercase">{{__('shop.products.size')}}</p>
                            <div class="flex items-center space-x-2">
                                {{-- TODO: modale per guida taglie --}}
                                <span
                                    class="text-xs font-medium text-color-18181a uppercase">{{__('shop.options.size_guide')}}</span>
                                <x-icons name="meter" class="w-5 h-5"></x-icons>
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-3 gap-3 sm:grid-cols-4">
                                @foreach($allSizes as $id => $size)
                                    @if(in_array($id, array_keys($sizes)))
                                        <div
                                            wire:key="size-{{$id}}"
                                            wire:click="setSize({{ $size['id'] }})"
                                            @class([
                                                'cursor-pointer flex items-center justify-center rounded-md py-3 px-3 text-sm font-medium uppercase sm:flex-1 focus:outline-none',
                                                $selectedSize == $size['id'] ? 'bg-color-18181a text-white' : 'border border-black/10 bg-color-edebe5 text-gray-900 hover:bg-color-18181a hover:text-white'])
                                        >
                                            <span id="size-choice-0-label">{{ $size['value'] }}</span>
                                        </div>
                                    @else
                                        <div
                                            wire:key="size-{{$id}}"
                                            wire:click="resetAll('size', {{ $id }})"
                                            @class([
                                                'opacity-10 pointer-events-none flex items-center justify-center rounded-md border border-black/50 py-3 px-3 text-sm font-medium uppercase sm:flex-1 focus:outline-none',
                                                ])
                                        >
                                            <span id="size-choice-0-label">{{ $size['value'] }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @if($selectedLength || $selectedColor || $selectedSize)
                            <div wire:click="resetAll()" class="mt-10 text-color-6c757d text-xs cursor-pointer hover:underline">{{ __('shop.products.reset_selection') }}</div>
                        @endif
                    </div>
                @endif

                {{-- quantita --}}
                <div class="space-y-5">
                    <p class="text-sm font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.products.amount')}}</p>
                    <div
                        class="w-[185px] h-[48px] rounded-md flex items-center border border-color-b6b9bb">
                        <div wire:click="decrement"
                             class="{{ $quantity === 1 ? 'cursor-not-allowed text-gray-300' : 'cursor-pointer' }} w-[60px] h-full flex items-center justify-center bg-transparent border-r border-color-b6b9bb">
                            <x-icons name="minus" class="h-3 w-3"></x-icons>
                        </div>
                        <div
                            class="w-[65px] h-full flex items-center justify-center text-[13px] font-medium leading-[16px] text-color-18181a font-mono select-none">{{ $quantity }}</div>
                        <div wire:click="increment"
                             class="{{ $quantity >= $selectedVariant?->quantity ? 'cursor-not-allowed text-gray-300' : 'cursor-pointer' }} w-[60px] h-full flex items-center justify-center bg-transparent border-l border-color-b6b9bb">
                            <x-icons name="plus" class="h-3 w-3"></x-icons>
                        </div>
                    </div>
                </div>

                {{-- actions --}}
                <div class="mt-[30px]">
                    <x-shop.shopping-button :disabled="!$selectedVariant" wire:click="payWithLink" color="green"
                                            icon="arrow-right-xl">
                        {{ __('shop.button.pay_link') }}
                    </x-shop.shopping-button>
                    <div class="w-[438px] relative p-6">
                        <div class="h-[1px] bg-color-6c757d w-full"></div>
                        <span
                            class="absolute top-[15px] left-[calc(50%-36px)] px-[10px] bg-color-f2f0eb text-[13px] font-medium leading-[16px] text-color-6c757d">{{__('shop.options.or')}}</span>
                    </div>
                    <x-shop.shopping-button :disabled="!$selectedVariant" wire:click="addToCart" icon="bag">
                        {{ __('shop.button.add_to_cart') }}
                    </x-shop.shopping-button>
                </div>

                {{-- other --}}
                <div class="mt-[26px] ">
                    <p class="text-sm font-medium leading-[19px] text-color-18181a uppercase">
                        COD: {{ $selectedVariant ? $selectedVariant->sku : 'N/A' }}</p>
                    {{--                    <p class="mt-5 mb-[15px] text-sm font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.options.currency')}}</p>--}}

                    {{--                    <livewire:components.select-money :selected="$selectedMoney" :options="$currency"/>--}}
                </div>
            </div>
        </div>

        {{-- info product --}}
        <div x-data="handler()" class="col-start-3 col-span-8 mt-[65px]">
            {{-- section button --}}
            <div class="w-full h-[58px] rounded-md bg-color-edebe5 flex items-center gap-[10px] mb-[50px]">
                <template x-for="tab in tabs" :key="tab">
                    <button x-text="tab" x-on:click="currentTab = tab"
                            :class="tab == currentTab ? '!bg-color-18181a !text-white' : ''"
                            class="w-[235px] h-[48px] rounded-md bg-transparent flex items-center justify-center text-sm font-medium leading-[19px] text-color-6c757d capitalize"
                    >
                    </button>
                </template>
            </div>

            <template x-if="currentTab == '{{$product->name}}'">
                <p class="text-[13px] leading-[24px] text-color-323a46">
                    {{ $product->main_desc }}
                </p>
            </template>

            <template x-if="currentTab == '{{__('shop.products.characteristics')}}'">
                <p class="text-[13px] leading-[24px] text-color-323a46">
                    {{ $product->features_desc }}
                </p>
            </template>

            <template x-if="currentTab == '{{__('shop.products.advantages')}}'">
                <p class="text-[13px] leading-[24px] text-color-323a46">
                    {{ $product->pros_desc }}
                </p>
            </template>

            <template x-if="currentTab == '{{__('shop.products.technicality')}}'">
                <p class="text-[13px] leading-[24px] text-color-323a46">
                    {{ $product->technical_desc }}
                </p>
            </template>

            <template x-if="currentTab == '{{__('shop.products.wash')}}'">
                <p class="text-[13px] leading-[24px] text-color-323a46">
                    {{ $product->washing_desc }}
                </p>
            </template>
        </div>
    </div>

    {{-- carousel --}}
{{--    <div class="col-span-12 pb-[100px] mt-5">--}}
{{--        <div class="mx-[89px] border-t-2 border-color-18181a shadow-shadow-4 mb-[50px]"></div>--}}

{{--        <div class="relative">--}}
{{--            <h2 class="px-[39px] mb-[27px] text-[33px] font-semibold leading-[40px] text-color-18181a">{{__('shop.most_purchased_title')}}</h2>--}}

{{--            <div class="pl-[39px] group-custom-button">--}}
{{--                <button--}}
{{--                    class="customPrevBtn w-[76px] h-[76px] rounded-full bg-white shadow-md hidden group-custom-button-hover:flex justify-center items-center absolute top-[calc(50%-97px)] z-10 hover:border">--}}
{{--                    <img class="rotate-180" src="{{ Vite::asset('resources/images/icons/arrow-left-button.svg')}}"--}}
{{--                         alt="">--}}
{{--                </button>--}}

{{--                <div wire:ignore class="owl-carousel carousel_most_purchased">--}}
{{--                    @foreach ($mostPurchased as $key => $prod )--}}
{{--                        <x-card-purchased--}}
{{--                            :key="$key"--}}
{{--                            :image="$prod['image']"--}}
{{--                            :name="$prod['name']"--}}
{{--                            :description="$prod['description']"--}}
{{--                            :availableColor="$prod['availableColor']"--}}
{{--                            :price="$prod['price']"--}}
{{--                        />--}}
{{--                    @endforeach--}}
{{--                </div>--}}

{{--                <button--}}
{{--                    class="customNextBtn w-[76px] h-[76px] rounded-full bg-white shadow-md hidden group-custom-button-hover:flex justify-center items-center absolute top-[calc(50%-97px)] right-[39px] z-10 hover:border">--}}
{{--                    <img src="{{ Vite::asset('resources/images/icons/arrow-left-button.svg')}}" alt="">--}}
{{--                </button>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}

    <livewire:modals.product-added-to-cart/>
</div>

@push('scripts')
    <script>
        function handler() {
            return {
                currentTab: @json($product->name),
                tabs: [
                    @json($product->name),
                    @json(__('shop.products.characteristics')),
                    @json(__('shop.products.advantages')),
                    @json(__('shop.products.technicality')),
                    @json(__('shop.products.wash'))
                ]
            }
        }
    </script>

    <script>
        $(document).ready(function () {
            var carousel = new $(".carousel_most_purchased").owlCarousel({
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

            $('.customNextBtn').click(function () {
                carousel.trigger('next.owl.carousel', [2000]);
            })

            $('.customPrevBtn').click(function () {
                carousel.trigger('prev.owl.carousel', [2000]);
            })
        });
    </script>
@endpush
