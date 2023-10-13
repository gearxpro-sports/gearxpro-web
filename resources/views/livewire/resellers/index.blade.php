<x-slot name="title">
    {{ __('common.title.resellers') }}
</x-slot>
<x-slot name="actions">
    <x-primary-button href="{{ route('resellers.create') }}">{{ __('common.create') }}</x-primary-button>
</x-slot>

<div>
{{--    <livewire:components.counter wire:model="counter" />--}}
    <div>
        <ul>
            @foreach($resellers as $reseller)
                <li wire:key="$reseller->id">{{ $reseller->fullname }} - {{ $reseller->country->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
