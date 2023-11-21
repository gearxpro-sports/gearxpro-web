<x-slot name="title">
    {{ $customer->fullname }}
</x-slot>
@role(App\Models\User::SUPERADMIN)
<x-slot name="actions">
    <x-primary-button href="{{ route('customers.edit', ['customer' => $customer]) }}">{{ __('common.edit') }}</x-primary-button>
</x-slot>
@endrole

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
                <span>{{ $customer->created_at->format('d/m/Y') }}</span>
            </li>
            <li class="flex space-x-2">
                <span class="inline-block text-color-6c757d">{{ __('customers.show.data.country') }}</span>
                <span>{{ $customer->country->name }}</span>
            </li>
            @if($billing_address)
                <h3 class="font-bold">Dati di fatturazione</h3>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.address') }}</span>
                    <span>{{ $billing_address->address_1 }} {{ $billing_address->address_2 }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.city') }}</span>
                    <span>{{ $billing_address->city }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.postcode') }}</span>
                    <span>{{ $billing_address->postcode }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.country') }}</span>
                    <span>{{ $billing_address->country->name }}</span>
                </li>
            @endif
            @if($shipping_address)
                <h3 class="font-bold">Dati di spedizione</h3>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.address') }}</span>
                    <span>{{ $shipping_address->address_1 }} {{ $shipping_address->address_2 }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.city') }}</span>
                    <span>{{ $shipping_address->city }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.postcode') }}</span>
                    <span>{{ $shipping_address->postcode }}</span>
                </li>
                <li class="flex space-x-2">
                    <span class="inline-block text-color-6c757d">{{ __('customers.show.data.country') }}</span>
                    <span>{{ $shipping_address->country->name }}</span>
                </li>
            @endif
        </ul>
    </div>
    <div class="p-7 bg-white lg:col-span-2">
        <h2 class="flex items-center mb-5">{{ __('customers.show.orders.title') }}</h2>
        @if($customer->customerOrders->count() === 0)
            <p>Nessun ordine presente</p>
        @else
            Lista ordini
        @endif
    </div>
</div>
