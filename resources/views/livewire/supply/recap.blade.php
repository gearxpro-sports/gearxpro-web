<x-slot name="title">
    <p>{{ __('supply.recap.title') }}: <span class="uppercase">#{{ $supply->uuid }}</span></p>
</x-slot>

<div class="grid grid-cols-3 gap-6 bg-white p-8">
    <div class="col-span-2 border">
        <livewire:components.admin-tables.supply.recap-table />
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
                <div class="flex flex-col text-sm">
                    <span class="font-semibold">{{ __('supply.recap.order_review.shipping.address') }}:</span>
                    <span>{{ $supply->reseller->shipping_address->address_1 }} - {{ $supply->reseller->shipping_address->city }} {{ $supply->reseller->shipping_address->postcode }} {{ $supply->reseller->shipping_address->state }}</span>
                </div>
                <div class="flex flex-col text-sm">
                    <span class="font-semibold">{{ __('supply.recap.order_review.shipping.phone') }}:</span>
                    <span>{{ $supply->reseller->shipping_address->phone }}</span>
                </div>
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
            <x-primary-button wire:click="confirm" wire:loading.attr="disabled" wire:target="confirm" :disabled="$supply->rows->count() <= 0" type="button" class="w-full !bg-color-0c9d87 hover:!bg-color-0c9d87/90">
                {{ __('supply.recap.order_review.confirm') }}
            </x-primary-button>
        </div>
    </div>
</div>
