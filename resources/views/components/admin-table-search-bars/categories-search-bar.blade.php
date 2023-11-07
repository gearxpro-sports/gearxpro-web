<div class="grid grid-cols-2 gap-4 mb-2.5 bg-white py-4 px-7 text-xs rounded shadow-shadow-1">
    <div>
        <div class="relative">
            <x-input wire:model.live.debounce.500ms="search" name="search" placeholder="{{ __('common.search') }}" class="h-10 py-0">
                <x-slot:append>
                    <span class="search-btn absolute z-[1] inset-y-1 right-1 flex items-center justify-center w-9 bg-color-eff0f0 rounded-sm">
                        <x-icons name="search" class="w-4 h-4" />
                    </span>
                </x-slot:append>
            </x-input>
        </div>
    </div>
</div>
