<x-slot name="title">
    {{ __('categories.index.title') }}
</x-slot>
<x-slot name="actions">
    <x-primary-button type="button" onclick="event.preventDefault(); Livewire.dispatch('openModal', { component: 'categories.modal.add-category' });">{{ __('common.create') }}</x-primary-button>
</x-slot>

<div>
    <livewire:components.admin-tables.categories-table />
</div>
