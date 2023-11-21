<div class="flex flex-col xl:flex-row px-4 pt-8 pb-20 xl:px-0 xl:gap-16 xl:py-20">
    <div class="space-y-6 xl:space-y-12">
        <h1 class="text-xl xl:text-3xl font-semibold text-color-18181a capitalize">{{__('shop.payment.payment')}}</h1>

        {{-- tabs --}}
        <div class="mb-10 flex flex-col space-y-2.5">
            @foreach ($tabs as $key => $tab )
                <button wire:click="changeTab({{$key}})"
                @if ($key != 0 && !$dataUser) disabled @endif
                @class([
                    "w-[232px] m-auto xl:w-[365px] xl:h-20 py-2 rounded-md flex flex-col items-center justify-center gap-1 font-medium text-color-6c757d capitalize",
                    $key == $currentTab ? '!bg-color-18181a !text-white' : 'text-color-6c757d bg-color-edebe5'])
                >
                    <x-icons :name="$tab['icon']"/>
                    <span>{{__('shop.payment.'.$tab['text'])}}</span>
                </button>
            @endforeach
        </div>

        <div class="space-y-6 xl:space-y-12 flex flex-col-reverse xl:flex-col">
            {{-- dettaglio carrello --}}
            <div>
                <h2 class="hidden xl:block text-xl font-semibold text-color-18181a mb-3.5">{{__('shop.payment.in_to_cart')}}</h2>

                <div class="border-y py-2 mt-2 xl:mt-0 xl:py-0 xl:border-none">
                    <div class="flex items-center justify-between mb-1 xl:mb-5">
                        <span
                            class="text-sm font-medium text-color-18181a">{{__('shop.payment.subtotal')}}</span>
                        <span class="text-sm font-medium text-color-18181a">@money($cart->subtotal)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="text-sm font-medium text-color-18181a">{{__('shop.payment.shipment_cost')}}</span>
                        <span class="text-sm font-medium text-color-18181a">
                            @if(config('app.shipping_cost') <= 0)
                                {{ __('common.free_shipping') }}
                            @else
                                @money(config('app.shipping_cost'))
                            @endif
                        </span>
                    </div>
                </div>

                <div class="xl:border-y border-color-18181a py-3 flex items-center justify-between xl:mt-7">
                    <span
                        class="font-medium text-color-18181a">{{__('shop.payment.total')}}</span>
                    <span class="font-semibold  text-color-18181a">@money($cart->total)</span>
                </div>
            </div>

            {{-- prodotti in carrello --}}
            <div>
                <div class="hidden xl:block">
                    <h2 class="text-xl font-semibold text-color-18181a mb-3.5">{{__('shop.payment.articols')}}</h2>
                </div>

                <div class="xl:hidden">
                    <h2 class=" text-base font-semibold text-color-18181a mb-3.5">Il tuo ordine</h2>
                </div>

                @foreach ($cart->items as $item)
                    <div class="flex gap-5 xl:border border-color-f2f0eb bg-color-f2f0eb xl:shadow p-1">
                        <div class="w-20 h-20 xl:w-28 xl:h-28 overflow-hidden bg-color-edebe5">
                            <img src="{{ $item->variant->getThumbUrl() ?: Vite::asset('resources/images/placeholder-medium.jpg') }}" alt="{{ $item->variant->product->name }}">
                        </div>

                        <div class="my-auto">
                            <h4 class="text-sm font-semibold text-color-18181a">
                                {{$item->variant->product->name}}
                            </h4>
                            <p class="text-xs font-medium text-color-6c757d">
                                {{__('shop.products.height_leg')}}: {{$item->variant->length->value}}
                            </p>
                            <p class="text-xs inline xl:block mr-2 xl:mr-0 font-medium text-color-6c757d">
                                {{__('shop.products.color')}}: {{$item->variant->color->value}}
                            </p>
                            <p class="text-xs inline xl:block font-medium text-color-6c757d">
                                {{__('shop.products.size')}}: {{$item->variant->size->value}}
                            </p>
                            <br class="xl:hidden">
                            <p class="text-xs inline xl:block mr-2 xl:mr-0 font-medium text-color-6c757d">
                                {{__('shop.products.amount')}}: {{$item->quantity}}
                            </p>
                            <p class="text-sm inline xl:block font-medium text-color-18181a">
                                @money($item->price)
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    {{-- Recapiti e consegna --}}
    <form wire:submit="next" @class(["pt-8 xl:pt-20 w-full", $currentTab === 1 ? 'hidden' : ''])>
        <h2 class="text-xl font-semibold text-color-18181a mb-3.5">{{__('shop.payment.address')}}</h2>

        <div class="flex flex-col xl:flex-row gap-5">
            <x-input-text wire:model="firstname" width="w-full xl:w-1/2" name="firstname" label="firstname" required="true" />
            <x-input-text wire:model="lastname" width="w-full xl:w-1/2" name="lastname" label="lastname" required="true" />
        </div>

        <div class="flex flex-col gap-5 mt-5">
            <x-input-text placeholder="{{str_replace('\'', ' ',$full_shipping_address)}}" autocomplete="autocomplete" width="w-full" name="shipping_address" label="address_civic" required="true" />
            <x-input-text wire:model="shipping_company" width="w-full" name="shipping_company" label="company" />
        </div>

        <div class="flex flex-col xl:flex-row gap-5 mt-5">
            <x-input-text wire:model="pec" type="email" width="w-full xl:w-1/2" name="pec" label="email" required="true" />
            <x-input-text x-mask="{{ __('masks.phone') }}" wire:model="phone" width="w-full xl:w-1/2" name="phone" label="phone" required="true" />
        </div>

        <div class="mt-10 flex flex-col xl:flex-row gap-5 xl:gap-0 items-center justify-between px-9 xl:px-0">
            <div class="w-full max-w-xs">
                <x-shop.shopping-button href="{{ route('shop.cart', ['country_code' => session('country_code')]) }}" color="transparent" icon="back">{{ __('shop.payment.button_back') }}</x-shop.shopping-button>
            </div>
            <div class="w-full max-w-xs">
                <x-shop.shopping-button type="submit" color="orange" icon="pay">{{ __('shop.payment.button_next_pay') }}</x-shop.shopping-button>
            </div>
        </div>
    </form>

    {{-- Info pagamento --}}
    <div @class(["pt-8 xl:pt-20 w-full space-y-7", $currentTab === 0 ? 'hidden' : ''])>

        <div class="w-full space-y-3.5">
            {{-- Indirizzo --}}
            <div class="w-full p-6 border border-color-e0e0df rounded-md">
                <div class="flex items-center gap-2">
                    <x-icons name="flag_ON"/>
                    <h3 class="font-semibold text-color-18181a">{{__('shop.payment.address')}}</h3>
                </div>

                <h3 class="text-sm font-semibold text-color-323a46 mt-4 mb-1">{{$firstname}} {{$lastname}}</h3>

                <div class="text-sm font-medium flex gap-3.5">
                    <div class="flex flex-col gap-1 text-color-6c757d">
                        <p>{{__('shop.payment.address')}}: <span class="text-color-323a46">{{$full_shipping_address}}</span></p>
                        <p>{{__('shop.payment.email')}}: <span class="text-color-323a46">{{$pec}}</span></p>
                        <p>{{__('shop.payment.phone')}}: <span class="text-color-323a46">{{$phone}}</span></p>
                    </div>
                </div>
            </div>

            {{-- spedizione --}}
            <div class="w-full p-6 border border-color-e0e0df rounded-md">
                <div class="flex items-center gap-2">
                    <x-icons name="flag_ON"/>
                    <h3 class="font-semibold text-color-18181a">{{__('shop.payment.shipment_free')}}</h3>
                </div>

                <p class="text-sm font-medium text-color-6c757d mt-4">{{__('shop.payment.shipment_time')}}</p>
            </div>
        </div>

        <div class="w-full">
            <h2 class="text-base xl:text-xl font-semibold text-color-18181a">{{__('shop.payment.method_payment')}}</h2>

            <div class="w-full mt-3.5 bg-color-f5e3d7 p-6 flex flex-col-reverse xl:flex-row items-center justify-between gap-2 xl:gap-8 rounded-md">
                <p class="text-sm font-medium text-color-6c757d">{{__('shop.payment.ssl')}}</p>
                <x-icons name="trust" class="flex-shrink-0" />
            </div>

            <form wire:submit="next" class="mt-5">
                <x-input-text x-mask:dynamic="creditCardMask" wire:model="creditCard" width="w-full" name="creditCard" label="creditCard" required="true" />

                <div class="flex flex-col xl:flex-row gap-5 mt-5 my-5">
                    <x-input-text x-mask="99/99" wire:model="expiration" width="w-full xl:w-1/2" name="expiration" label="expiration" required="true" />
                    <x-input-text x-mask="999" wire:model="ccv" width="w-full xl:w-1/2" name="ccv" label="ccv" required="true" />
                </div>

                <x-input-text wire:model="accountHolder" width="w-full" name="accountHolder" label="accountHolder" required="true" />

                <div class="mt-10 flex flex-col xl:flex-row gap-5 xl:gap-0 items-center justify-between px-9 xl:px-0">
                    <div class="w-full max-w-xs">
                        <x-shop.shopping-button href="{{ route('shop.cart', ['country_code' => session('country_code')]) }}" color="transparent" icon="back">{{ __('shop.payment.button_back') }}</x-shop.shopping-button>
                    </div>
                    <div class="w-full max-w-xs">
                        <x-shop.shopping-button type="submit" color="orange" icon="pay">{{ __('shop.payment.pay') }}</x-shop.shopping-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function creditCardMask(input) {
            return input.startsWith('34') || input.startsWith('37')
                ? '9999 999999 99999'
                : '9999 9999 9999 9999'
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initAutocomplete"
        type="text/javascript"
        async defer>
    </script>

    <script>
        let autocomplete_shipping_address;

        function initAutocomplete() {
            const input_shipping_address = document.getElementsByName("shipping_address")[0];

            const options = {
                componentRestrictions: { country: @json(session('country_code')) }
            }

            autocomplete_shipping_address = new google.maps.places.Autocomplete(input_shipping_address, options);

            autocomplete_shipping_address.addListener("place_changed", onPlaceChange)
        }

        function onPlaceChange() {
            @this.set('shipping_civic', null);
            @this.set('streetClicked', true);
            const place_shipping_address = autocomplete_shipping_address.getPlace();

            if (place_shipping_address) {
                if (place_shipping_address.address_components.length > 0) {
                    place_shipping_address.address_components.forEach(element => {
                        if (element.types[0] === 'street_number') {
                            @this.set('shipping_civic', place_shipping_address.address_components[0]['long_name']);
                        } else if (element.types[0] === 'route') {
                            @this.set('shipping_address', place_shipping_address.address_components[1]['long_name']);
                        } else if (element.types[0] === 'postal_code') {
                            @this.set('shipping_postcode', place_shipping_address.address_components[7]['long_name']);
                        } else if (element.types[0] === 'locality') {
                            @this.set('shipping_city', place_shipping_address.address_components[2]['long_name']);
                        } else if (element.types[0] === 'country') {
                            @this.set('shipping_state', place_shipping_address.address_components[6]['short_name']);
                        }
                    });
                }
            }
        }
    </script>
@endpush

