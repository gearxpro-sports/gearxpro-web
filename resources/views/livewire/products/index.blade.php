<x-slot name="title">
    {{ __('products.index.title') }}
</x-slot>
<x-slot name="actions">
    <x-primary-button type="button" onclick="event.preventDefault(); Livewire.dispatch('openModal', { component: 'products.modal.add-product' });">{{ __('common.create') }}</x-primary-button>
</x-slot>

<div>
    <livewire:components.admin-tables.products-table />
</div>
