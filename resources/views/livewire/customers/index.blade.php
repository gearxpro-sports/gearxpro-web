<x-slot name="title">
    {{ __('customers.index.title') }}
</x-slot>
<x-slot name="actions">
    <x-primary-button>{{ __('common.create') }}</x-primary-button>
</x-slot>

<div>
    <livewire:components.admin-tables.customers-table />
</div>
