<div class="grid grid-cols-1 gap-4 items-end mb-2.5 bg-white py-4 px-4 text-xs rounded shadow-shadow-1 md:grid-cols-2 md:px-7">
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
    <div class="flex items-end gap-2">
        <div class="mx-0 w-80 md:mx-2.5">
            <x-flatpickr datepickerId="{{ Str::random(9) }}" name="filter[created_at]" label="{{ __('common.filter_by') }}" placeholder="{{ __('customers.index.filter.select_registration_date') }}">
                <x-slot:append>
                    <span class="search-btn absolute z-[1] inset-y-1 right-1 flex items-center justify-center w-9 bg-color-eff0f0 rounded-sm">
                        <x-icons name="calendar" class="w-4 h-4"/>
                    </span>
                </x-slot:append>
            </x-flatpickr>
        </div>
        <x-primary-button>
            <x-slot:prepend>
                <x-icons name="filter" class="w-3.5 h-3.5"></x-icons>
            </x-slot:prepend>
            {{ __('common.filter') }}
        </x-primary-button>
    </div>
</div>
