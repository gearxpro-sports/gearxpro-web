<div class="pt-[66px] pb-[222px] pl-[351px] pr-[384px] flex gap-[70px]">
    <div class="w-[365px]">
        <h1 class="text-[33px] font-semibold leading-[40px] text-color-18181a capitalize mb-[30px]">{{__('shop.payment.payment')}}</h1>

        {{-- tabs --}}
        <div class="mb-[40px] flex flex-col gap-[10px]">
            @foreach ($tabs as $key => $tab )
                <button wire:click="changeTab({{$key}})"
                @if ($key != 0 AND !$dataUser) disabled @endif
                @class([
                    "w-[365px] h-[80px] rounded-md flex flex-col items-center justify-center gap-1 text-[15px] font-medium leading-[19px] text-color-6c757d capitalize",
                    $key == $currentTab ? '!bg-color-18181a !text-white' : 'text-color-6c757d bg-color-edebe5',])
                >
                    @if ($key == $currentTab)
                        <x-icons :name="$tab['icon-on']"/>
                    @else
                        <x-icons :name="$tab['icon-off']"/>
                    @endif
                    <span>{{__('shop.payment.'.$tab['text'])}}</span>
                </button>
            @endforeach
        </div>

        {{-- dettaglio carrello --}}
        <div class="mb-[30px]">
            <h2 class="text-[21px] font-semibold leading-[38px] text-color-18181a mb-[15px]">{{__('shop.payment.in_to_cart')}}</h2>

            <div class="flex items-center justify-between mb-5">
                <span class="text-[13px] font-medium leading-[16px] text-color-18181a">{{__('shop.payment.subtotal')}}</span>
                <span class="text-[13px] font-medium leading-[16px] text-color-18181a">{{$money}} {{number_format(70, 2, ',', '.')}}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-[13px] font-medium leading-[16px] text-color-18181a">{{__('shop.payment.shipment_cost')}}</span>
                <span class="text-[13px] font-medium leading-[16px] text-color-18181a">{{__('shop.payment.free')}}</span>
            </div>

            <div class="border-y border-color-18181a h-[61px] flex items-center justify-between mt-[25px]">
                <span class="text-[15px] font-medium leading-[16px] text-color-18181a">{{__('shop.payment.total')}}</span>
                <span class="text-[15px] font-semibold  leading-[16px] text-color-18181a">{{$money}} {{number_format(70, 2, ',', '.')}}</span>
            </div>
        </div>

        {{-- prodotti in carrello --}}
        <div>
            <h2 class="text-[21px] font-semibold leading-[38px] text-color-18181a mb-[15px]">{{__('shop.payment.articols')}}</h2>

            @foreach ($cart as $product )
                <div class="flex gap-5 border border-color-f2f0eb bg-color-f2f0eb shadow p-1">
                    <div class="w-[116px] h-[120px] overflow-hidden bg-color-edebe5">
                        <img src="" alt="">
                    </div>

                    <div class="my-auto">
                        <h4 class="text-[13px] font-semibold leading-[24px] text-color-18181a">{{$product['name']}}</h4>
                        <p class="text-[12px] font-medium leading-[15px] text-color-6c757d">{{__('shop.products.color')}}: {{$product['color']}}</p>
                        <p class="text-[12px] font-medium leading-[15px] text-color-6c757d">{{__('shop.products.size')}}: {{$product['size']}}</p>
                        <p class="text-[12px] font-medium leading-[15px] text-color-6c757d">{{__('shop.products.amount')}}: {{$product['quantity']}}</p>
                        <p class="text-[13px] font-medium leading-[24px] text-color-18181a">{{$money}} {{number_format($product['price'], 2, ',', '.')}}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{-- Recapiti e consegna --}}
    <form wire:submit="getDataUser" @class(["pt-[90px] w-[750px]",$currentTab === 1 ? 'hidden' : ''])>
        <h2 class="text-[21px] font-semibold leading-[38px] text-color-18181a mb-[15px]">{{__('shop.payment.address')}}</h2>

        <div class="flex gap-5">
            <x-input-text wire:model="firstname" width="w-1/2" name="firstname" label="firstname" required="true" />
            <x-input-text wire:model="lastname" width="w-1/2" name="lastname" label="lastname" required="true" />
        </div>

        <div class="flex flex-col gap-5 mt-5">
            <x-input-text placeholder="{{str_replace('\'', ' ',$full_shipping_address)}}" autocomplete="autocomplete" width="w-full" name="shipping_address" label="address_civic" required="true" />
            <x-input-text wire:model="shipping_company" width="w-full" name="company" label="company" />
        </div>

        <div class="flex gap-5 mt-5">
            <x-input-text wire:model="email" type="email" width="w-1/2" name="email" label="email" required="true" />
            <x-input-text x-mask="{{ __('masks.phone') }}" wire:model="phone" width="w-1/2" name="phone" label="phone" required="true" />
        </div>

        <div class="mt-[42px] flex items-center justify-between">
            <x-custom-button-2 :text="__('shop.payment.button_back')" :icon="'back'" :link="'/shop/cart'" width="w-[221px]"/>
            <x-custom-button-4 :text="__('shop.payment.button_next_pay')" :icon="'pay'" width="w-[275px]" />
        </div>
    </form>

    {{-- Info pagamento --}}
    <div @class(["pt-[90px] w-[750px]", $currentTab === 0 ? 'hidden' : ''])>

        <div class="w-full space-y-[15px]">
            {{-- Indirizzo --}}
            <div class="w-full h-[197px] py-[24px] px-[21px] border border-color-e0e0df rounded-md">
                <div class="flex items-center gap-2">
                    <x-icons name="flag_ON"/>
                    <h3 class="text-[15px] font-semibold leading-[19px] text-color-18181a">{{__('shop.payment.address')}}</h3>
                </div>

                <h3 class="text-[13px] font-semibold leading-[24px] text-color-323a46 mt-[25px] mb-[5px]">Giancarlo Ferraro</h3>

                <div class="text-[13px] font-medium flex gap-[15px]">
                    <div class="flex flex-col gap-[5px] min-w-[60px] text-color-6c757d">
                        <span>{{__('shop.payment.address')}}:</span>
                        <span>{{__('shop.payment.email')}}:</span>
                        <span>{{__('shop.payment.phone')}}:</span>
                    </div>
                    <div class="flex flex-col gap-[5px]  text-color-323a46">
                        <span>{{$full_shipping_address}}</span>
                        <span>{{$email}}</span>
                        <span>{{$phone}}</span>
                    </div>
                </div>
            </div>

            {{-- spedizione --}}
            <div class="w-full h-[99px] py-[24px] px-[21px] border border-color-e0e0df rounded-md">
                <div class="flex items-center gap-2">
                    <x-icons name="flag_ON"/>
                    <h3 class="text-[15px] font-semibold leading-[19px] text-color-18181a">{{__('shop.payment.shipment_free')}}</h3>
                </div>

                <p class="text-[13px] font-medium text-color-6c757d mt-[15px]">{{__('shop.payment.shipment_time')}}</p>
            </div>
        </div>

        <div class="w-full mt-[30px]">
            <h2 class="text-[21px] font-semibold leading-[38px] text-color-18181a">{{__('shop.payment.method_payment')}}</h2>

            <div class="w-full h-[73px] mt-[15px] bg-color-f5e3d7 py-[18px] px-[21px] flex items-center justify-between gap-[35px] rounded-md">
                <p class="text-[13px] font-medium leading-[20px] text-color-6c757d">{{__('shop.payment.ssl')}}</p>
                <x-icons name="trust" />
            </div>

            <form wire:submit="getDataUser" class="mt-5">
                <x-input-text x-mask:dynamic="creditCardMask" wire:model="creditCard" width="w-full" name="creditCard" label="creditCard" required="true" />

                <div class="flex gap-5 my-5">
                    <x-input-text x-mask="99/99" wire:model="expiration" width="w-1/2" name="expiration" label="expiration" required="true" />
                    <x-input-text x-mask="999" wire:model="ccv" width="w-1/2" name="ccv" label="ccv" required="true" />
                </div>

                <x-input-text wire:model="accountHolder" width="w-full" name="accountHolder" label="accountHolder" required="true" />

                <div class="mt-[42px] flex items-center justify-between">
                    <x-custom-button-2 :text="__('shop.payment.button_back')" :icon="'back'" :link="'/shop/cart'" width="w-[221px]"/>
                    <x-custom-button-4 :text="__('shop.payment.pay')" :icon="'pay'" width="w-[165px]" />
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initAutocomplete"
        type="text/javascript"
        async defer>
    </script>

    <script>
        let autocomplete_shipping_address;

        function initAutocomplete() {
            const input_shipping_address = document.getElementsByName("shipping_address")[0];

            const options = {
                componentRestrictions: { country: @json(config('app.locale')) }
            }

            autocomplete_shipping_address = new google.maps.places.Autocomplete(input_shipping_address, options);

            autocomplete_shipping_address.addListener("place_changed", onPlaceChange)
        }

        function onPlaceChange() {
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

