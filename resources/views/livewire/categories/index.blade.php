<x-slot name="title">
    {{ __('categories.index.title') }}
</x-slot>
<x-slot name="actions">
    <x-primary-button href="{{ route('categories.create') }}">{{ __('common.create') }}</x-primary-button>
</x-slot>

<div>
    <livewire:components.admin-tables.categories-table />
</div>
