@props(['current_status' => \App\Models\Order::PAID_STATUS])

@php
    $statuses = \App\Models\Order::STATUSES;
@endphp

@if (in_array($current_status, [\App\Models\Order::DELIVERED_STATUS, \App\Models\Order::CANCELED_STATUS, \App\Models\Order::REFUNDED_STATUS]))
    <x-badge class="justify-center" color="{{ $statuses[$current_status] }}">{{ __('orders.statuses.'.$current_status) }}</x-badge>
@else
    @php
        if ($current_status === \App\Models\Order::SHIPPED_STATUS) {
        $statuses = array_filter($statuses, fn($key) => in_array($key, [\App\Models\Order::SHIPPED_STATUS, \App\Models\Order::DELIVERED_STATUS, \App\Models\Order::REFUNDED_STATUS]), ARRAY_FILTER_USE_KEY);
        } else {
            unset($statuses[\App\Models\Order::DELIVERED_STATUS]);
        }
    @endphp
    <x-dropdown align="left" width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md focus:outline-none transition ease-in-out duration-150">
                <x-badge class="py-1.5 w-full text-center" color="{{ $statuses[$current_status] }}">
                    {{ __('orders.statuses.'.$current_status) }}
                    <x-icons x-show="!open" class="ml-2" name="chevron-down" />
                    <x-icons x-show="open" class="ml-2" name="chevron-up" />
                </x-badge>
            </button>
        </x-slot>
        <x-slot name="content">
        @foreach ($statuses as $status => $color)
            @if ($current_status !== $status)
                <button
                    type="button"
                    class="py-0.5 px-1 w-full"
                    @if (in_array($status, [\App\Models\Order::DELIVERED_STATUS, \App\Models\Order::CANCELED_STATUS, \App\Models\Order::REFUNDED_STATUS, \App\Models\Order::SHIPPED_STATUS])) wire:confirm="{{ __('orders.show.alert.changing_status.'.$status) }}" @endif
                    wire:click="changeStatus('{{ $status }}')"
                >
                <x-badge class="w-full justify-center" color="{{ $color }}">{{ __('orders.statuses.'.$status) }}</x-badge>
                </button>
            @endif
        @endforeach
        </x-slot>
    </x-dropdown>
@endif
