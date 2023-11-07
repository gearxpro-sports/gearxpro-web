<x-slot name="title">
    {{ __('resellers.index.title') }}
</x-slot>
<x-slot name="actions">
    <x-primary-button href="{{ route('resellers.create') }}">{{ __('common.create') }}</x-primary-button>
</x-slot>

<div>
    <livewire:components.admin-tables.resellers-table />
</div>
