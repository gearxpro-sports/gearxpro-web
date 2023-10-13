<div class="flex items-center space-x-1">
    <div wire:click="decrement" class="flex items-center justify-center bg-color-18181a text-white rounded leading-none w-10 h-10 hover:bg-color-323a46">
        <x-heroicon-o-minus class="h-5 w-5"></x-heroicon-o-minus>
    </div>
    {{ $value }}
{{--    <input wire:model="value" type="number" class="appearance-none w-24 bg-white border border-color-eff0f0 text-center">--}}
    <div wire:click="increment" class="flex items-center justify-center bg-color-18181a text-white rounded leading-none w-10 h-10 hover:bg-color-323a46">
        <x-heroicon-o-plus class="h-5 w-5"></x-heroicon-o-plus>
    </div>
</div>
