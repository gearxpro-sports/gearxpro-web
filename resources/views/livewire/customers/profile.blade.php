<div x-data="handler()" class="xl:min-h-[743px] bg-color-f2f0eb p-4 xl:px-48 xl:py-16">
    {{-- title --}}
    <div>
        <h1 class="text-2xl xl:text-3xl font-semibold text-color-18181a leading-10">{{__('customers.profile')}}</h1>
        <p class="text-sm xl:text-base font-normal text-color-18181a leading-5">{{__('customers.profile_description')}}</p>
    </div>

    <div class="mt-8 flex flex-col gap-5 xl:flex-row xl:gap-40">
        {{-- button Tabs --}}
        <div class="flex gap-3 xl:block" >
            <template x-for="tab in tabs" :key="tab">
                <button @if ($modify) disabled @endif x-text="tab" x-on:click="currentTab = tab"
                    :class="tab == currentTab ? '!bg-color-18181a !text-white' : ''"
                    @class([
                        "xl:w-[282px] h-[61px] px-5 mb-1 border rounded-md bg-transparent flex items-center justify-start text-sm xl:text-base font-medium leading-[19px] text-color-18181a capitalize",
                        $modify ? 'opacity-80 cursor-not-allowed' : ''
                    ])
                >
                </button>
            </template>
        </div>

        {{-- Content Tabs --}}
        <div class="w-full xl:w-[654px]">
            @if ($modify && $modify !== 'orders')
                <h2 x-text="currentTab" class="hidden xl:block text-xl font-semibold text-color-18181a"></h2>
                <h2 class="xl:hidden text-xl font-semibold text-color-18181a">{{ __('customers.tabs.'. $modify) }}</h2>
            @endif

            @if (!$modify)
                <template x-if="currentTab == '{{__('customers.tabs.personal_data.title')}}'">
                    <div>
                        <div class="flex flex-col-reverse xl:flex-row items-center justify-between py-5 relative">
                            <div class="w-full xl:grow flex flex-col gap-5">
                                <div class="w-full flex items-center">
                                    <x-box-data label="{{__('customers.edit.firstname.label')}}" content="{{$customer->firstname ?? '---'}}" width="w-1/2" />
                                    <x-box-data label="{{__('customers.edit.lastname.label')}}" content="{{$customer->lastname ?? '---'}}" width="w-1/2"/>
                                </div>

                                <x-box-data label="{{__('customers.edit.phone.label')}}" content="{{$customerPhone ?? '---'}}" width="w-full"/>
                            </div>

                            <button wire:click="selectEditData('personal_data.user')" type="button" class="w-full xl:w-36 px-3 text-xs font-semibold xl:font-medium text-color-6c757d flex items-center justify-end gap-1 hover:underline">
                                {{__('customers.edit_data')}}
                                <x-icons name="edit_data" />
                            </button>

                            <div class="absolute bottom-0 left-0 w-full border-t border-color-18181a shadow-shadow-4"></div>
                        </div>

                        <div class="flex flex-col-reverse xl:flex-row items-center justify-between py-5 relative">
                            <x-box-data label="{{__('customers.edit.email.label')}}" content="{{$customer->email ?? '---'}}" width="w-full"/>

                            <button wire:click="selectEditData('personal_data.email')" type="button" class="w-full xl:w-36 px-3 text-xs font-semibold xl:font-medium text-color-6c757d flex items-center justify-end gap-1 hover:underline">
                                {{__('customers.edit_data')}}
                                <x-icons name="edit_data" />
                            </button>

                            <div class="absolute bottom-0 left-0 w-full border-t border-color-18181a shadow-shadow-4"></div>
                        </div>

                        <div class="flex flex-col-reverse xl:flex-row items-center justify-between py-5 relative">
                            <x-box-data label="{{__('customers.password')}}" content="••••••••••••••••" width="w-full"/>

                            <button wire:click="selectEditData('personal_data.password')" type="button" class="w-full xl:w-36 px-3 text-xs font-semibold xl:font-medium text-color-6c757d flex items-center justify-end gap-1 hover:underline">
                                {{__('customers.edit_data')}}
                                <x-icons name="edit_data" />
                            </button>

                            <div class="absolute bottom-0 left-0 w-full border-t border-color-18181a shadow-shadow-4"></div>
                        </div>
                    </div>
                </template>

                <template x-if="currentTab == '{{__('customers.tabs.addresses.title')}}'">
                    <div class="flex flex-col-reverse xl:flex-row items-center justify-between py-5 relative">
                        <div class="w-full xl:grow flex flex-col gap-5">
                            <div class="w-full flex flex-col xl:flex-row items-start gap-5">
                                <x-box-data label="{{__('customers.edit.addresses.shipping')}}" content="{{str_replace('\'', ' ',$full_shipping_address) ?? '---'}}" width="w-full xl:w-1/2"/>
                                <x-box-data label="{{__('customers.edit.phone.label')}}" content="{{$customer_shipping_address->phone ?? '---'}}" width="w-1/2"/>
                            </div>
                            <x-box-data label="{{__('customers.edit.addresses.billing')}}" content="{{str_replace('\'', ' ',$full_billing_address) ?? '---'}}" width="w-full"/>
                        </div>

                        <button wire:click="selectEditData('addresses.address')" type="button" class="w-full xl:w-36 px-3 text-xs font-semibold xl:font-medium text-color-6c757d flex items-center justify-end gap-1 hover:underline">
                            {{__('customers.edit_data')}}
                            <x-icons name="edit_data" />
                        </button>

                        <div class="absolute bottom-0 left-0 w-full border-t border-color-18181a shadow-shadow-4"></div>
                    </div>

                </template>

                <template x-if="currentTab == '{{__('customers.tabs.orders.title')}}'">
                    <div>
                        @foreach($orders as $order)
                            <div wire:click="selectEditData('orders', {{$order->id}})" class="h-36 w-full px-6 py-4 border bg-color-edebe5 mb-7 xl:mb-0 xl:mt-7 flex gap-5 cursor-pointer">
                                <div class="h-full w-fit flex flex-col justify-between">
                                    <div class="flex flex-col items-start justify-start">
                                        <span class="text-base font-semibold text-color-18181a">{{date_format($order->created_at,"d/m/Y ")}}</span>
                                        <span class="text-sm font-medium text-color-18181a">@money(($order->total + $order->shipping_cost))</span>
                                    </div>
                                    <div class="flex flex-col items-start justify-start">
                                        <span class="text-sm font-semibold text-color-18181a whitespace-nowrap">{{__('customers.tabs.orders.status.'. $order->status)}}</span>
                                        <span class="text-xs font-medium text-color-6c757d ">{{$order->reference}}</span>
                                    </div>
                                </div>

                                <div class="overflow-auto scrollBar flex gap-5">
                                    @foreach ($order->items as $item)
                                        @php($variant = \App\Models\ProductVariant::where('id', $item->variant_id)->withTrashed()->first())
                                        @if (!$variant)
                                            @continue
                                        @endif
                                        <img class="w-fit" src="{{ $variant->getThumbUrl() }}" alt="{{ $variant->product?->name }}">
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </template>
            @endif

        {{-- Personal Data --}}
            {{-- user --}}
            <div x-show="modify === 'personal_data.user'">
                <div class="flex items-center justify-between py-5 relative">
                    <div class="grow flex flex-col gap-5">
                        <div class="w-full flex flex-col xl:flex-row items-center gap-5">
                            <x-input-text wire:model="customer.firstname" width="w-full xl:w-1/2" name="customer.firstname" label="firstname" required="true" />
                            <x-input-text wire:model="customer.lastname" width="w-full xl:w-1/2" name="customer.lastname" label="lastname" required="true" />
                        </div>

                        <x-input-text wire:model="customerPhone" x-mask="{{ __('masks.phone') }}" width="w-full" name="customerPhone" label="phone" required="true" />
                    </div>
                </div>

                <div class="flex items-center gap-5 justify-end mt-8 xl:mt-0">
                    <button wire:click="cancel()" type="button" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-b6b9bb border border-color-b6b9bb group">
                        <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-b6b9bb">{{ __('customers.buttons.cancel') }}</span>
                        <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
                    </button>
                    <button wire:click="edit()" type="button" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-18181a border border-color-18181a group">
                        <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-18181a">{{ __('customers.buttons.save') }}</span>
                        <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
                    </button>
                </div>
            </div>
            {{-- Email --}}
            <div x-show="modify === 'personal_data.email'">
                <div class="flex items-center justify-between py-5 relative">
                    <div class="grow flex flex-col gap-5">
                        <x-input-text wire:model="customer.email" type="email" width="w-full" name="customer.email" label="email" required="true" />
                    </div>
                </div>

                <div class="flex items-center gap-5 justify-end mt-8 xl:mt-0">
                    <button wire:click="cancel()" type="button" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-b6b9bb border border-color-b6b9bb group">
                        <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-b6b9bb">{{ __('customers.buttons.cancel') }}</span>
                        <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
                    </button>
                    <button wire:click="edit()" type="button" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-18181a border border-color-18181a group">
                        <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-18181a">{{ __('customers.buttons.save') }}</span>
                        <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
                    </button>
                </div>
            </div>
            {{-- Password --}}
            <form x-show="modify === 'personal_data.password'" wire:submit="edit()" class="space-y-5 pt-5">
                <div class="w-full flex flex-col gap-1 relative">
                    <label for="current_password" class="text-[12px] font-medium leading-[15px] text-color-18181a">{{ __('shop.payment.current_password') }}*</label>
                    <div class="w-full flex flex-col gap-1 relative">
                        <input wire:model.live="current_password" x-bind:type="current_password ? 'text' : 'password'" name="current_password" id="current_password" class="h-[48px] px-4 rounded-md bg-color-edebe5 p-0 border-color-e0e0df focus:border-transparent focus:ring-0" autocomplete="">
                        <div @click="current_password = !current_password"
                            class="flex items-center justify-center absolute z-[1] inset-y-1 right-3 top-[5px] bg-no-repeat bg-center aspect-square rounded-sm cursor-pointer">
                            <template x-if="current_password">
                                <x-icons name="eye-gray" class="w-4 h-4"></x-icons>
                            </template>
                            <template x-if="!current_password">
                                <x-icons name="eye-off-gray" class="w-4 h-4"></x-icons>
                            </template>
                        </div>
                    </div>
                    <div class="absolute bottom-[-20px] right-0">@error('current_password') <span class="text-[12px] text-color-f4432c">{{ $message }}</span> @enderror</div>
                </div>

                <div>
                    <div class="w-full flex flex-col gap-1 relative">
                        <label for="password" class="text-[12px] font-medium leading-[15px] text-color-18181a">{{ __('auth.login.password.label') }}*</label>
                        <div class="w-full flex flex-col gap-1 relative">
                            <input wire:model.live="password" x-bind:type="showPassword ? 'text' : 'password'" name="password" id="password" class="h-[48px] px-4 rounded-md bg-color-edebe5 p-0 border-color-e0e0df focus:border-transparent focus:ring-0" autocomplete="">
                            <div @click="showPassword = !showPassword"
                                class="flex items-center justify-center absolute z-[1] inset-y-1 right-3 top-[5px] bg-no-repeat bg-center aspect-square rounded-sm cursor-pointer">
                                <template x-if="showPassword">
                                    <x-icons name="eye-gray" class="w-4 h-4"></x-icons>
                                </template>
                                <template x-if="!showPassword">
                                    <x-icons name="eye-off-gray" class="w-4 h-4"></x-icons>
                                </template>
                            </div>
                        </div>
                        <div class="absolute bottom-[-20px] right-0">@error('password') <span class="text-[12px] text-color-f4432c">{{ $message }}</span> @enderror</div>
                    </div>
                    <div class="text-[12px] text-color-6c757d mt-[5px]">
                        <p>Make sure the password has at least:</p>
                        <ul class="list-disc pl-[15px] pr-[5px]">
                            @foreach ($formatPassword as $key => $format)
                                <li>
                                    @if (in_array($key, $keyFormat))
                                        <div @class(["flex justify-between text-color-15af2d"])>
                                            {{ $format }}
                                            <x-icons name="check-format" />
                                        </div>
                                    @else
                                        <div @class(["flex justify-between"])>
                                            {{ $format }}
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="w-full flex flex-col gap-1 relative">
                    <label for="password_confirmation" class="text-[12px] font-medium leading-[15px] text-color-18181a">{{ __('shop.payment.confirmPassword') }}*</label>
                    <div class="w-full flex flex-col gap-1 relative">
                        <input wire:model.live="password_confirmation" x-bind:type="password_confirmation ? 'text' : 'password'" name="password_confirmation" id="password_confirmation" class="h-[48px] px-4 rounded-md bg-color-edebe5 p-0 border-color-e0e0df focus:border-transparent focus:ring-0" autocomplete="">
                        <div @click="password_confirmation = !password_confirmation"
                            class="flex items-center justify-center absolute z-[1] inset-y-1 right-3 top-[5px] bg-no-repeat bg-center aspect-square rounded-sm cursor-pointer">
                            <template x-if="password_confirmation">
                                <x-icons name="eye-gray" class="w-4 h-4"></x-icons>
                            </template>
                            <template x-if="!password_confirmation">
                                <x-icons name="eye-off-gray" class="w-4 h-4"></x-icons>
                            </template>
                        </div>
                    </div>
                    <div class="absolute bottom-[-20px] right-0">@error('password') <span class="text-[12px] text-color-f4432c">{{ $message }}</span> @enderror</div>
                </div>

                <div class="flex items-center gap-5 justify-end !mt-8 xl:mt-0">
                    <button wire:click="cancel()" type="button" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-b6b9bb border border-color-b6b9bb group">
                        <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-b6b9bb">{{ __('customers.buttons.cancel') }}</span>
                        <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
                    </button>
                    <button type="submit" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-18181a border border-color-18181a group">
                        <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-18181a">{{ __('customers.buttons.save') }}</span>
                        <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
                    </button>
                </div>
            </form>
            {{-- Address Shipping/Billing --}}
            <div x-show="modify === 'addresses.address'">
                <div class="flex items-center justify-between py-5 relative">
                    <div class="grow flex flex-col gap-10 xl:gap-5">
                        <div class="relative flex flex-col gap-5 p-5 border rounded-md shadow">
                            <span class="absolute px-1 bg-color-f2f0eb top-[-15px] left-[14px] text-color-18181a font-medium">{{__('customers.edit.addresses.shipping')}}</span>
                            <x-input-text placeholder="{{str_replace('\'', ' ',$full_shipping_address)}}" autocomplete="autocomplete" width="w-full" name="shipping_address" label="address_civic" required="true" />
                            <x-input-text wire:model="shipping_company" width="w-full" name="company" label="company" />
                            <x-input-text x-mask="{{ __('masks.phone') }}" wire:model="shipping_phone" width="w-full" name="shipping_phone" label="phone" required="true"/>
                        </div>

                        <div class="relative flex flex-col gap-5 p-5 border rounded-md shadow">
                            <span class="absolute px-1 bg-color-f2f0eb top-[-15px] left-[14px] text-color-18181a font-medium">{{__('customers.edit.addresses.billing')}}</span>
                            @if ($streetClicked)
                                <span wire:click="copyFromShipping()" class="absolute right-3 xl:right-5 top-1 xl:top-2 text-xs lg:text-sm font-semibold text-color-707070 hover:text-color-18181a hover:underline cursor-pointer">{{ __('customers.buttons.copy_shipping') }}</span>
                            @endif
                            <x-input-text placeholder="{{str_replace('\'', ' ',$full_billing_address)}}" autocomplete="autocomplete" width="w-full" name="billing_address" label="address_civic" required="true" />
                            <x-input-text wire:model="billing_company" width="w-full" name="company" label="company" />
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-5 justify-end ">
                    <button wire:click="cancel()" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-b6b9bb border border-color-b6b9bb group">
                        <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-b6b9bb">{{ __('customers.buttons.cancel') }}</span>
                        <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
                    </button>
                    <button wire:click="edit()" type="button" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-18181a border border-color-18181a group">
                        <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-18181a">{{ __('customers.buttons.save') }}</span>
                        <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
                    </button>
                </div>
            </div>

            <div x-show="modify === 'orders'" class="relative">
                <button wire:click="selectEditData(null)" class="xl:absolute top-5 right-0 ml-auto mb-5 flex items-center gap-2 group">
                    <x-icons name="arrow-right-xl" class="rotate-180 group-hover:translate-x-[-8px] duration-300 transition-all"/>
                    <span class="capitalize font-medium group-hover:underline">{{__('customers.buttons.back')}}</span>
                </button>

                @if ($showOrder)
                    <h2 class="text-xl font-semibold text-color-18181a leading-9">{{__('customers.tabs.orders.order')}} {{$showOrder->reference}}</h2>
                    <span class="text-base font-semibold text-color-18181a leading-5">{{date_format($showOrder->created_at,"d/m/Y ")}}</span>
                    @php($color = \App\Models\Order::CUSTOMER_STATUSES)
                    <div class="mt-5">
                        <x-badge class="justify-center" color="{{ $color[$showOrder->status] }}">{{__('customers.tabs.orders.status.'. $showOrder->status)}}</x-badge>
                    </div>

                    @foreach ($showOrder->items as $item)
                        @php($variant = \App\Models\ProductVariant::where('id', $item->variant_id)->withTrashed()->first())
                        @if (!$variant)
                            @continue
                        @endif
                        <div class="h-40 xl:h-fit w-full mt-7 border p-1 flex items-center">
                            <div class="h-full xl:w-48 bg-color-edebe5">
                                <img class="h-full max-w-[135px] xl:max-w-none w-full" src="{{ $variant->getThumbUrl() }}" alt="{{ $variant->product?->name }}">
                            </div>
                            <div class="h-full grow px-3 xl:px-14 flex flex-col items-start justify-center gap-2">
                                <h3 class="text-base font-semibold text-color-18181a leading-5">{{ $variant->product?->name }}</h3>
                                <div>
                                    {{-- <p class="text-xs font-medium text-color-6c757d leading-4">
                                        {{ __('shop.products.height_leg')}}: Lungo
                                    </p> --}}
                                    <p class="text-xs font-medium text-color-6c757d leading-4">
                                        {{-- {{__('shop.products.color')}} {{$item->color}},
                                        {{__('shop.products.size')}} {{$item->size}}, --}}
                                        {{__('shop.products.amount')}} {{ $item->quantity }}
                                    </p>
                                </div>
                                <span class="text-sm font-medium text-color-18181a">@money($item->quantity * $item->price)</span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        function handler() {
            return {
                modify: @entangle('modify'),
                current_password: false,
                showPassword: false,
                password_confirmation: false,
                currentTab: @json(__('customers.tabs.personal_data.title')),
                tabs: [
                    @json(__('customers.tabs.personal_data.title')),
                    @json(__('customers.tabs.addresses.title')),
                    @json(__('customers.tabs.orders.title')),
                ]
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initAutocomplete"
            type="text/javascript"
            async defer>
    </script>
    <script>
        let autocomplete_shipping_address;
        let autocomplete_billing_address;

        function initAutocomplete() {
            const input_shipping_address = document.getElementsByName("shipping_address")[0];
            const input_billing_address = document.getElementsByName("billing_address")[0];

            const options = {
                componentRestrictions: { country: @json(config('app.locale')) }
            }

            autocomplete_shipping_address = new google.maps.places.Autocomplete(input_shipping_address, options);
            autocomplete_billing_address = new google.maps.places.Autocomplete(input_billing_address, options);

            autocomplete_shipping_address.addListener("place_changed", onPlaceChange)
            autocomplete_billing_address.addListener("place_changed", onPlaceChange)
        }

        function onPlaceChange() {
            @this.set('streetClicked', true);
            const place_shipping_address = autocomplete_shipping_address.getPlace();
            const place_billing_address = autocomplete_billing_address.getPlace();
            // shipping data
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
            // billing data
            if (place_billing_address) {
                if (place_billing_address.address_components.length > 0) {
                    place_billing_address.address_components.forEach(element => {
                        if (element.types[0] === 'street_number') {
                            @this.set('billing_civic', place_billing_address.address_components[0]['long_name']);
                        } else if (element.types[0] === 'route') {
                            @this.set('billing_address', place_billing_address.address_components[1]['long_name']);
                        } else if (element.types[0] === 'postal_code') {
                            @this.set('billing_postcode', place_billing_address.address_components[7]['long_name']);
                        } else if (element.types[0] === 'locality') {
                            @this.set('billing_city', place_billing_address.address_components[2]['long_name']);
                        } else if (element.types[0] === 'country') {
                            @this.set('billing_state', place_billing_address.address_components[6]['short_name']);
                        }

                    });
                }
            }
        }
    </script>
@endpush
