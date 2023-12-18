<div>
    <h3 class="py-5 px-10 bg-color-18181a text-white text-center font-bold">Crea Prodotto</h3>
    <div class="p-10">
        <form wire:submit="save" class="flex flex-col">
            @csrf
            <x-input class="mb-5" type="text" wire:model.blur="name" name="name" label="{{ __('products.edit.section.main.name.label') }}" required></x-input>
            <x-primary-button wire:loading.attr="disabled" wire:target="save">{{ __('common.create') }}</x-primary-button>
        </form>
    </div>
</div>
