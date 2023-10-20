<x-slot name="title">
    {{ $reseller->fullname }}
</x-slot>
<x-slot name="actions">
    <x-primary-button href="{{ route('resellers.edit', ['reseller' => $reseller]) }}">{{ __('common.edit') }}</x-primary-button>
</x-slot>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    <div class="p-7 bg-white">
        <h2 class="flex items-center mb-5">
            <span class="flex items-center justify-center mr-4 h-12 w-12  bg-color-fdce82 text-white rounded">
                <x-heroicon-o-user-circle class="w-6 h-6"></x-heroicon-o-user-circle>
            </span>
            {{ __('resellers.show.data.title') }}
        </h2>
        <ul class="flex flex-col gap-5 text-sm">
            @if($billing_address)
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.company') }}</span>
                    <span>{{ $billing_address->company}}</span>
                </li>
            @endif
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.email') }}</span>
                <span>{{ $reseller->email}}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.creation_date') }}</span>
                <span>{{ $reseller->created_at->format('d/m/Y') }}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.country') }}</span>
                <span>{{ $reseller->country->name }}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.last_login') }}</span>
                <span>{{ optional($reseller->last_login)->format('d/m/Y H:i:s') ?? '-' }}</span>
            </li>
            @if($billing_address)
                <h3 class="font-bold">Dati di fatturazione</h3>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.address') }}</span>
                    <span>{{ $billing_address->address_1 }} {{ $billing_address->address_2 }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.city') }}</span>
                    <span>{{ $billing_address->city }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.postcode') }}</span>
                    <span>{{ $billing_address->postcode }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.country') }}</span>
                    <span>{{ $billing_address->country->name }}</span>
                </li>
            @endif
            @if($shipping_address)
                <h3 class="font-bold">Dati di spedizione</h3>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.address') }}</span>
                    <span>{{ $shipping_address->address_1 }} {{ $shipping_address->address_2 }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.city') }}</span>
                    <span>{{ $shipping_address->city }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.postcode') }}</span>
                    <span>{{ $shipping_address->postcode }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('resellers.show.data.country') }}</span>
                    <span>{{ $shipping_address->country->name }}</span>
                </li>
            @endif
        </ul>
    </div>
    <div class="p-7 bg-white lg:col-span-2">
        <h2 class="flex items-center mb-5">{{ __('resellers.show.orders.title') }}</h2>
    </div>
</div>
