<x-slot name="title">
    {{ __('customers.show.title') }}
</x-slot>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    <div class="p-7 bg-white">
        <h2 class="flex items-center mb-5">
            <span class="flex items-center justify-center mr-4 h-12 w-12  bg-color-fdce82 text-white rounded">
                <x-heroicon-o-user-circle class="w-6 h-6"></x-heroicon-o-user-circle>
            </span>
            {{ __('customers.show.data.title') }}
        </h2>
        <ul class="flex flex-col gap-5 text-sm">
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.firstname') }}</span>
                <span>{{ $customer->firstname}}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.lastname') }}</span>
                <span>{{ $customer->lastname}}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.email') }}</span>
                <span>{{ $customer->email}}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.registration_date') }}</span>
                <span>{{ $customer->created_at->format('d M Y') }}</span>
            </li>
            @if ($billingAddresses = $customer->addresses->firstWhere('type', 'billing'))
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.address') }}</span>
                <span>{{ $billingAddresses->address_1 }} {{ $billingAddresses->address_2 }}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.city') }}</span>
                <span>{{ $billingAddresses->city }}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.postcode') }}</span>
                <span>{{ $billingAddresses->postcode }}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.country') }}</span>
                <span>{{ $billingAddresses->country->name }}</span>
            </li>
            @endif
        </ul>
    </div>
    <div class="p-7 bg-white lg:col-span-2">
        <h2 class="flex items-center mb-5">{{ __('customers.show.orders.title') }}</h2>
    </div>
</div>
