<div>
    @if ($showModalCart)
        <div wire:click="closeModal" class="z-50 fixed inset-0 bg-black/40"></div>

        <div class="w-full max-w-[calc(100vw-32px)] xl:max-w-md fixed bottom-10 left-4 xl:bottom-auto xl:left-auto xl:top-10 xl:right-10 bg-color-18181a xl:bg-white z-[60] p-4 xl:p-10 rounded-md">
            <x-icons name="x-mark" wire:click="closeModal"
                     class="w-3 h-3 text-color-6c757d absolute top-7 right-7 cursor-pointer"></x-icons>

            <div class="hidden xl:flex items-center space-x-2.5 mb-5">
                <div class="w-7 h-7 rounded-full bg-color-8be599 flex items-center justify-center">
                    <x-icons name="check" class="w-3 h-3 text-white"></x-icons>
                </div>
                <h3 class="text-sm font-medium text-color-18181a">{{__('shop.modal_cart.add_product')}}</h3>
            </div>

            <div class="flex space-x-5 xl:border border-color-f2f0eb p-1">
                <div class="w-20 h-20 xl:w-28 xl:h-28 overflow-hidden">
                    <img src="{{ $productVariant->getThumbUrl() ?: Vite::asset('resources/images/placeholder-medium.jpg') }}" alt="{{ $productVariant->product->name }}">
                </div>
                <div class="flex flex-col gap-1 xl:gap-0">
                    <h4 class="text-sm font-bold xl:font-semibold text-white xl:text-color-18181a">{{ $productVariant->product->name }}</h4>
                    <span class="text-xs xl:font-medium text-color-b6b9bb xl:text-color-6c757d">{{__('shop.products.height_leg')}}: {{ $productVariant->length->value }}</span>
                    <span class="text-xs xl:font-medium text-color-b6b9bb xl:text-color-6c757d">{{__('shop.products.color')}}: {{ $productVariant->color->value }}</span>
                    <span class="text-xs xl:font-medium text-color-b6b9bb xl:text-color-6c757d">{{__('shop.products.size')}}: {{ $productVariant->size->value }}</span>
                    <span class="text-xs xl:font-medium text-color-b6b9bb xl:text-color-6c757d">{{__('shop.products.amount')}}: {{ $quantity }}</span>
                    <span class="text-sm font-bold xl:font-medium text-white xl:text-color-18181a">@money($productVariant->product->price)</span>
                </div>
            </div>

            <div class="hidden xl:flex items-center mt-10 space-x-5">
                <x-primary-button href="{{ route('shop.cart', ['country_code' => session('country_code')]) }}" class="w-full bg-color-ff7f6e hover:bg-white hover:text-color-18181a border border-transparent hover:border-color-18181a">
                    {{__('shop.modal_cart.button_show')}}
                </x-primary-button>
                @auth
                    <x-primary-button href="{{ route('shop.payment', ['country_code' => session('country_code')]) }}" class="w-full">
                        {{__('shop.modal_cart.button_pay')}}
                    </x-primary-button>
                @else
                    <x-primary-button href="{{ route('shop.checkout', ['country_code' => session('country_code')]) }}" class="w-full">
                        {{__('shop.modal_cart.button_pay')}}
                    </x-primary-button>
                @endauth
            </div>

            {{-- mobile --}}
            <div class="xl:hidden flex items-center mt-10 space-x-5">
                <x-primary-button href="{{ route('shop.cart', ['country_code' => session('country_code')]) }}" class="w-full bg-color-18181a text-sm font-semibold hover:bg-white hover:text-color-18181a border border-white  hover:border-color-18181a">
                    {{__('shop.modal_cart.cart')}}
                </x-primary-button>
                @auth
                    <x-primary-button href="{{ route('shop.payment', ['country_code' => session('country_code')]) }}" class="w-full bg-white text-sm font-semibold !text-color-18181a">
                        {{__('shop.modal_cart.checkout')}}
                    </x-primary-button>
                @else
                    <x-primary-button href="{{ route('shop.checkout', ['country_code' => session('country_code')]) }}" class="w-full bg-white text-sm font-semibold !text-color-18181a">
                        {{__('shop.modal_cart.checkout')}}
                    </x-primary-button>
                @endauth
            </div>
        </div>
    @endif
</div>
