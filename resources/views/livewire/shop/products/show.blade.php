<div class="bg-color-f2f0eb">
    <div class="xl:p-[39px] grid grid-cols-12 xl:gap-[30px] relative">
        {{-- image --}}
        <a href="{{route('shop.index', ['country_code' => session('country_code')])}}"
           class="lg:hidden z-10 absolute top-4 left-4">
            <x-icons name="chevron-left-xl"/>
        </a>

        {{--        <div class="flex mt-12 mb-5 col-span-12 overflow-auto scrollBar xl:p-0 snap-mandatory snap-x lg:snap-y relative lg:flex-col lg:col-span-7 lg:gap-4 2xl:h-[1104px]">--}}
        {{--            @foreach ($images as $k => $media_collection)--}}
        {{--                @foreach($media_collection as $image)--}}
        {{--                    <img class="snap-center w-full shrink-0 px-2" src="{{ $image->getUrl() }}" alt="">--}}
        {{--                @endforeach--}}
        {{--            @endforeach--}}
        {{--        </div>--}}

        <div class="flex flex-col mt-12 col-span-full sm:flex-row lg:col-span-7 sm:mb-5 sm:items-start">
            <img
                class="aspect-square object-contain w-full shrink-0 px-2 sm:mx-auto sm:max-w-md sm:order-1 lg:max-w-2xl"
                src="{{ $currentImage }}" alt="">
            <div
                class="flex px-2 gap-3 my-4 shrink-0 overflow-x-scroll no-scrollbar sm:gap-1 sm:my-0 sm:order-0 sm:flex-col sm:max-h-[450px] sm:overflow-y-scroll sm:no-scrollbar">
                @foreach ($images as $k => $media_collection)
                    @foreach($media_collection as $image)
                        <img wire:click="$set('currentImage', '{{ $image->getUrl() }}')"
                             class="{{ $image->getUrl() === $currentImage ? 'ring-2 ring-color-5a6472 bg-white' : 'hover:cursor-pointer bg-white/50' }} rounded-md w-14 h-14 aspect-square p-1 my-1 object-contain"
                             src="{{ $image->getUrl() }}" alt="">
                    @endforeach
                @endforeach
            </div>
        </div>

        {{-- options --}}
        <div class="col-span-12 px-4 md:px-8 lg:col-span-5 xl:col-start-8 lg:py-10">
            {{-- detail --}}
            <div>
                <span class="text-base xl:text-lg text-color-6c757d">
                    {!! $product->categories?->first()->name ?? '&nbsp;' !!}
                </span>
                <h1 class="text-xl my-1 xl:text-3xl font-bold text-color-18181a">
                    {{$product->name}}
                </h1>
                <p class="text-base xl:text-xl font-medium text-color-18181a">
                    @money($product->price)
                </p>
            </div>

            <div class="w-full xl:max-w-md mt-6 xl:mt-10 space-y-10">
                @if($allLengths)
                    <div wire:key="lengths" class="space-y-5">
                        <p class="text-sm font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.products.height_leg')}}</p>
                        <div>
                            <div
                                class="grid grid-cols-2 gap-x-1 rounded-md p-1 text-center text-xs font-semibold leading-5">
                                @foreach($allLengths as $id => $length)
                                    @if(in_array($id, array_keys($lengths)))
                                        <div
                                            wire:key="length-{{$id}}"
                                            wire:click="setLength({{ $id }})"
                                            @class([
                                            'ring-1 ring-inset ring-gray-200 cursor-pointer h-14 text-sm flex items-center justify-center rounded-md px-2.5 py-1',
                                            $selectedLength == $length['id'] ? 'bg-color-18181a text-white' : 'bg-color-edebe5 text-color-6c757d'])
                                        >
                                            <span>{{ $length['value'] }}</span>
                                        </div>
                                    @else
                                        <div
                                            wire:key="length-{{$id}}"
                                            @class([
                                            'opacity-10 pointer-events-none h-14 text-sm flex items-center justify-center rounded-md px-2.5 py-1',
                                            $selectedLength == $length['id'] ? 'bg-color-18181a text-white' : 'border border-black/50 text-color-6c757d'])
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
                                                'flex-shrink-0 cursor-pointer h-12 w-12 relative flex items-center justify-center rounded-full p-0.5 focus:outline-none ring-transparent overflow-hidden bg-white',
                                                $selectedColor == $color['id'] ? 'ring ring-offset-2 ring-offset-color-f2f0eb' : 'ring-2'])
                                            style="--tw-ring-color: {{$color['color']}}"
                                        >
                                            <img
                                                src="{{ $color['image'] ?? Vite::asset('resources/images/placeholder-medium.jpg') }}"
                                                alt=""
                                                class="p-[3px] object-contain aspect-square">
                                        </div>
                                    @else
                                        <div
                                            wire:key="color-{{$id}}"
                                            @class([
                                                'flex-shrink-0 opacity-10 pointer-events-none h-12 w-12 relative flex items-center justify-center rounded-full p-0.5 focus:outline-none ring-transparent overflow-hidden bg-white',
                                                $selectedColor == $color['id'] ? 'ring ring-offset-2' : 'border border-gray-800'])
                                            style="--tw-ring-color: {{$color['color']}}"
                                        >
                                            <img
                                                src="{{ $color['image'] ?? Vite::asset('resources/images/placeholder-medium.jpg') }}"
                                                alt=""
                                                class="p-[3px] object-contain aspect-square">
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
                            @if($product->size_guide && count(json_decode($product->size_guide)))
                                <div class="flex items-center space-x-2">
                                    <div
                                        wire:click.prevent="$dispatch('openModal', { component: 'shop.products.modals.size-guide', arguments: { product_id: {{$product->id}} }})"
                                        class="text-xs font-semibold xl:font-medium text-color-18181a uppercase hover:underline hover:cursor-pointer">
                                        {{__('shop.options.size_guide')}}
                                    </div>
                                    <x-icons name="meter" class="w-5 h-5"></x-icons>
                                </div>
                            @endif
                        </div>
                        <div>
                            <div class="grid grid-cols-6 xl:grid-cols-3 gap-3">
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
                    </div>
                @endif

                @if($selectedLength || $selectedColor || $selectedSize)
                    <div wire:click="resetAll()"
                         class="!mt-5 text-color-6c757d text-sm cursor-pointer hover:underline">{{ __('shop.products.reset_selection') }}</div>
                @endif

                {{-- quantita --}}
                <div class="space-y-5">
                    <p class="text-sm font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.products.amount')}}</p>
                    <div
                        class="w-full xl:w-[185px] h-[48px] rounded-md flex items-center border border-color-b6b9bb">
                        <div wire:click="decrement"
                             class="{{ $quantity === 1 ? 'pointer-events-none text-gray-300' : 'pointer-events-auto cursor-pointer' }} w-[60px] h-full flex items-center justify-center bg-transparent border-r border-color-b6b9bb">
                            <x-icons name="minus" class="h-3 w-3"></x-icons>
                        </div>
                        <div
                            class="w-full grow xl:w-[65px] h-full flex items-center justify-center text-sm font-medium leading-[16px] text-color-18181a font-mono select-none">{{ $quantity }}</div>
                        <div wire:click="increment"
                             class="{{ $quantity >= $this->selectedVariantQuantity ? 'pointer-events-none text-gray-300' : 'pointer-events-auto cursor-pointer' }} w-[60px] h-full flex items-center justify-center bg-transparent border-l border-color-b6b9bb">
                            <x-icons name="plus" class="h-3 w-3"></x-icons>
                        </div>
                    </div>
                </div>

                {{-- actions --}}
                <div class="mt-[30px]">
                    {{--                    <x-shop.shopping-button :disabled="!$selectedVariant" wire:click="payWithLink" color="green"--}}
                    {{--                                            icon="arrow-right-xl">--}}
                    {{--                        {{ __('shop.button.pay_link') }}--}}
                    {{--                    </x-shop.shopping-button>--}}
                    {{--                    <div class="xl:w-[438px] relative py-6 xl:p-6">--}}
                    {{--                        <div class="h-[1px] bg-color-6c757d w-full"></div>--}}
                    {{--                        <span--}}
                    {{--                            class="absolute top-[15px] left-[calc(50%-36px)] px-[10px] bg-color-f2f0eb text-[13px] font-medium leading-[16px] text-color-6c757d">{{__('shop.options.or')}}</span>--}}
                    {{--                    </div>--}}
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
        <div class="hidden lg:block px-8 xl:p-0 lg:col-span-12 2xl:col-start-3 2xl:col-span-8 xl:mt-16">
            {{-- section button --}}
            <div class="w-full h-[58px] rounded-md bg-color-edebe5 flex items-center gap-[10px] mb-8">
                @foreach($tabs as $k => $tab)
                    <button
                        wire:click="$set('currentTab', '{{ $k }}')"
                        class="w-[235px] h-[48px] rounded-md bg-transparent flex items-center justify-center text-sm font-medium leading-[19px] text-color-6c757d capitalize overflow-hidden {{ $currentTab === $k ? '!bg-color-18181a !text-white' : '' }}">
                        <span class="line-clamp-2">{{ $tab }}</span>
                    </button>
                @endforeach
            </div>

            @if($currentTab === 'product')
                <div class="prose max-w-none text-[13px] leading-[24px] text-color-323a46">
                    {!! $product->main_desc !!}
                </div>
            @endif

            @if($currentTab === 'characteristics')
                <div class="prose max-w-none text-[13px] leading-[24px] text-color-323a46">
                    {!! $product->features_desc !!}
                </div>
            @endif

            @if($currentTab === 'advantages')
                <p class="prose max-w-none text-[13px] leading-[24px] text-color-323a46">
                    {!! $product->pros_desc !!}
                </p>
            @endif

            @if($currentTab === 'technicality')
                <p class="prose max-w-none text-[13px] leading-[24px] text-color-323a46">
                    {!! $product->technical_desc !!}
                </p>
            @endif

            @if($currentTab === 'wash')
                <p class="prose max-w-none text-[13px] leading-[24px] text-color-323a46">
                    {!! $product->washing_desc !!}
                </p>
            @endif
        </div>

        <!-- Responsive info product -->
        <div class="lg:hidden col-span-12 flex flex-col gap-6 px-4 md:px-8 pt-10 pb-16">
            @foreach($tabs as $k => $tab)
                @switch($k)
                    @case('product')
                        <x-drop-info-product title="{{$product->name}}">
                            <p class="prose max-w-none text-[13px] leading-[24px] text-color-323a46">
                                {!! $product->main_desc !!}
                            </p>
                        </x-drop-info-product>
                        @break
                    @case('characteristics')
                        <x-drop-info-product title="{{__('shop.products.characteristics')}}">
                            <p class="prose max-w-none text-[13px] leading-[24px] text-color-323a46">
                                {!! $product->features_desc !!}
                            </p>
                        </x-drop-info-product>
                        @break
                    @case('advantages')
                        <x-drop-info-product title="{{__('shop.products.advantages')}}">
                            <p class="prose max-w-none text-[13px] leading-[24px] text-color-323a46">
                                {!! $product->pros_desc !!}
                            </p>
                        </x-drop-info-product>
                        @break
                    @case('technicality')
                        <x-drop-info-product title="{{__('shop.products.technicality')}}">
                            <p class="prose max-w-none text-[13px] leading-[24px] text-color-323a46">
                                {!! $product->technical_desc !!}
                            </p>
                        </x-drop-info-product>
                        @break
                    @case('wash')
                        <x-drop-info-product title="{{__('shop.products.wash')}}">
                            <p class="prose max-w-none text-[13px] leading-[24px] text-color-323a46">
                                {!! $product->washing_desc !!}
                            </p>
                        </x-drop-info-product>
                        @break
                @endswitch
            @endforeach
        </div>
    </div>

    {{-- carousel --}}
    {{-- <div class="col-span-12 pb-[100px] mt-5">
        <div class="mx-[89px] border-t-2 border-color-18181a shadow-shadow-4 mb-[50px]"></div>

        <div class="relative">
            <h2 class="px-[39px] mb-[27px] text-[33px] font-semibold leading-[40px] text-color-18181a">{{__('shop.most_purchased_title')}}</h2>

            <div class="pl-[39px] group-custom-button">
                <button
                    class="customPrevBtn w-[76px] h-[76px] rounded-full bg-white shadow-md hidden group-custom-button-hover:flex justify-center items-center absolute top-[calc(50%-97px)] z-10 hover:border">
                    <img class="rotate-180" src="{{ Vite::asset('resources/images/icons/arrow-left-button.svg')}}"
                            alt="">
                </button>

                <div wire:ignore class="owl-carousel carousel_most_purchased">
                    @foreach ($mostPurchased as $product )
                        <x-card-purchased :product="$product" />
                    @endforeach
                </div>

                <button
                    class="customNextBtn w-[76px] h-[76px] rounded-full bg-white shadow-md hidden group-custom-button-hover:flex justify-center items-center absolute top-[calc(50%-97px)] right-[39px] z-10 hover:border">
                    <img src="{{ Vite::asset('resources/images/icons/arrow-left-button.svg')}}" alt="">
                </button>
            </div>

        </div>
    </div>
 --}}
    <livewire:modals.product-added-to-cart/>
</div>

@push('scripts')
    {{-- <script>
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
    </script> --}}

    <script>
        $(document).ready(function () {
            var most_purchased_carousel = new $(".carousel_most_purchased").owlCarousel({
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
                most_purchased_carousel.trigger('next.owl.carousel', [2000]);
            })

            $('.customPrevBtn').click(function () {
                most_purchased_carousel.trigger('prev.owl.carousel', [2000]);
            })
        });
    </script>
@endpush
