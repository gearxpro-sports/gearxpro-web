<div class="flex items-stretch space-x-2">
    <button wire:click="decrement" type="button" @disabled($disabled) class="w-7 flex items-center justify-center bg-color-18181a text-white rounded cursor-pointer disabled:opacity-10 disabled:cursor-auto {{ $value <= 0 && !$disabled ? 'opacity-10 cursor-auto' : '' }}">
        <x-icons name="minus" class="w-2 h-2"></x-icons>
    </button>
    <input wire:model.live.debounce.500ms="value" type="number" @disabled($disabled) name="{{ \Illuminate\Support\Str::random(10) }}" class="h-7 w-20 block text-sm text-center text-color-18181a border border-color-eff0f0 rounded focus:outline-none focus:ring-0 focus:ring-offset-0 placeholder:placeholder-color-b6b9bb disabled:opacity-60">
    <button wire:click="increment" type="button" @disabled($disabled) class="w-7 flex items-center justify-center bg-color-18181a text-white rounded cursor-pointer disabled:opacity-10 disabled:cursor-auto">
        <x-icons name="plus" class="w-2 h-2"></x-icons>
    </button>
</div>
