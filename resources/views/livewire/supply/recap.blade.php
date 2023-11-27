<x-slot name="title">
    <p>{{ __('supply.recap.title') }}: <span class="uppercase">#{{ $supply->uuid }}</span></p>
</x-slot>

<div class="grid grid-cols-3 gap-6 bg-white p-8">
    <div class="col-span-2 border">
        <livewire:components.admin-tables.supply.recap-table/>
    </div>
    <div class="col-span-1 space-y-6">
        <div class="bg-white">
            <div class="p-4 border border-b-0">
                <h3 class="text-color-18181a font-semibold">{{ __('supply.recap.order_review.order.title') }}</h3>
                <div class="mt-4 space-y-3 text-color-6c757d">
                    <div class="flex items-center justify-between">
                        <span>{{ __('supply.recap.order_review.order.subtotal') }}:</span>
                        <span>@money($supply->amount)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>{{ __('supply.recap.order_review.order.shipping_cost') }}:</span>
                        <span>@money(0.00)</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>{{ __('supply.recap.order_review.order.vat') }}:</span>
                        <span>@money(0.00)</span>
                    </div>
                </div>
            </div>
            <div class="p-4 border">
                <div class="flex items-center justify-between text-color-18181a font-semibold">
                    <span>{{ __('supply.recap.order_review.order.total') }}</span>
                    <span>@money($supply->amount)</span>
                </div>
            </div>
        </div>
        <div class="bg-color-f7f8fa p-4">
            <div class="flex items-center justify-between">
                <h3 class="text-color-18181a font-semibold">{{ __('supply.recap.order_review.shipping.title') }}</h3>
            </div>
            <div class="mt-4 space-y-3 text-color-6c757d">
                <div class="flex flex-col text-sm">
                    <span class="font-semibold">{{ __('supply.recap.order_review.shipping.receiver') }}:</span>
                    <span>{{ $supply->reseller->fullname }}</span>
                </div>
                @if($supply->reseller->shipping_address)
                    <div class="flex flex-col text-sm">
                        <span class="font-semibold">{{ __('supply.recap.order_review.shipping.address') }}:</span>
                        <span>{{ $supply->reseller->shipping_address->address_1 }} - {{ $supply->reseller->shipping_address->city }} {{ $supply->reseller->shipping_address->postcode }} {{ $supply->reseller->shipping_address->state }}</span>
                    </div>
                    <div class="flex flex-col text-sm">
                        <span class="font-semibold">{{ __('supply.recap.order_review.shipping.phone') }}:</span>
                        <span>{{ $supply->reseller->shipping_address->phone }}</span>
                    </div>
                @else
                    <div class="flex flex-col text-sm">

                        <div class="rounded-md bg-yellow-50 p-4 mt-2">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm text-yellow-700">
                                        <p>{{ __('supply.recap.order_review.shipping.warning.missing_shipping_address') }}</p>
                                        <a href="{{ route('profile.edit') }}" class="block mt-2 underline">{{ __('supply.recap.order_review.shipping.warning.cta') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="flex flex-col text-sm">
                    <span class="font-semibold">{{ __('supply.recap.order_review.shipping.email') }}:</span>
                    <span>{{ $supply->reseller->email }}</span>
                </div>
            </div>
        </div>
        <div class="bg-color-f7f8fa p-4">
            <div class="flex items-center justify-between">
                <h3 class="text-color-18181a font-semibold">{{ __('supply.recap.order_review.payment.title') }}</h3>
            </div>
            <div class="mt-4 space-y-3 text-color-6c757d">
                <div class="flex flex-col text-sm">
                    <span>{{ $supply->reseller->payment_method ? __('payment_methods.' . $supply->reseller->payment_method) : '-' }}</span>
                </div>
            </div>
        </div>
        <div class="w-full">
            <x-primary-button wire:click="confirm" wire:loading.attr="disabled" wire:target="confirm"
                              :disabled="$supply->rows->count() <= 0 || !$supply->reseller->shipping_address" type="button"
                              class="w-full !bg-color-0c9d87 hover:!bg-color-0c9d87/90">
                {{ __('supply.recap.order_review.confirm') }}
            </x-primary-button>
        </div>
    </div>
</div>
