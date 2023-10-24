@props(['disabled' => false])

<button type="button" @disabled($disabled) class="group flex items-center space-x-2 rounded border border-color-18181a p-0.5 hover:bg-color-18181a disabled:bg-color-f7f8fa disabled:text-color-b6b9bb disabled:border-0">
    <span class="px-2 {{ $disabled ? '' : 'group-hover:text-white' }}">Aggiungi</span>
    <div class="{{ $disabled ? 'bg-color-eff0f0 text-color-b6b9bb' : 'bg-color-b9eddd text-color-0c9d87' }} p-1.5 rounded">
        <x-icons name="cart"></x-icons>
    </div>
</button>
