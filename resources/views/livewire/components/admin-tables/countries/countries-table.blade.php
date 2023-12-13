<div class="relative">
    <div wire:loading class="absolute inset-0 bg-white/50 z-10"></div>
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
    </div>
    <div class="p-8 bg-white rounded space-y-8">
        @if ($countries->count() > 0)
        <div class="flex items-center space-x-4">
            <h3 class="text-black-1 font-medium">{{ __('countries.index.table.title') }}</h3>
            <x-badge>{{ $countries->total() }}</x-badge>
        </div>
        <table class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
            <thead>
                <tr class="[&>th]:py-4 [&>th]:px-7 [&>th]:font-medium border-b-color-eff0f0">
                    <th class="text-left w-1/5">{{ __('countries.index.table.cols.name') }}</th>
                    <th class="text-center"></th>
                    <th class="text-left">{{ __('countries.index.table.cols.reseller') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                    <livewire:components.admin-tables.countries.country_row
                        wire:key="country_{{ $country->id }}"
                        :$country
                        :$resellers
                    />
                @endforeach
            </tbody>
        </table>
        {{ $countries->links() }}
        @else
            <div class="text-center">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
</div>
