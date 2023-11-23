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
        </div>
    </div>
    <div class="p-8 bg-white rounded space-y-8">
        @if ($resellers->count() > 0)
        <div class="flex items-center space-x-4">
            <h3 class="text-black-1 font-medium">{{ __('resellers.index.table.title') }}</h3>
            <x-badge>{{$resellers->total()}}</x-badge>
        </div>
        <table class="table-auto border-collapse w-full text-xs text-black-1 border border-color-eff0f0 font-medium">
            <thead>
                <tr class="text-left [&>th]:py-4 [&>th]:px-7 [&>th]:font-medium [&>th]:w-1/5 border-b-color-eff0f0">
                    <th>{{ __('resellers.index.table.cols.company') }}</th>
                    <th>{{ __('resellers.index.table.cols.email') }}</th>
                    <th>{{ __('resellers.index.table.cols.creation_date') }}</th>
                    <th>{{ __('resellers.index.table.cols.country') }}</th>
                    <th>{{ __('resellers.index.table.cols.last_login_date') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resellers as $reseller)
                <tr class="text-left [&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
                    <td class="flex flex-col">
                        <span>{{ $reseller->firstname }} {{ $reseller->lastname }}</span>
                        @if($reseller->deleted_at)
                            <span class="text-xxs text-color-e54f33">{{ __('resellers.index.table.disabled') }}</span>
                        @endif
                    </td>
                    <td>{{ $reseller->email }}</td>
                    <td>{{ $reseller->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div>
                            <img class="inline-block w-5 mr-2 rounded-sm" src="https://flagcdn.com/w320/{{ strtolower($reseller->country->iso2_code) }}.png" alt="{{ $reseller->country->name }}">
                            {{ $reseller->country->name ?? '-' }}
                        </div>
                    </td>
                    <td>{{ optional($reseller->last_login)->format('d/m/Y H:i:s') ?? '-' }}</td>
                    <td class="text-right">
                        <a class="flex items-center justify-center ml-auto bg-color-eff0f0 w-8 h-8 text-center rounded-sm" href="{{ route('resellers.show', ['reseller' => $reseller->id]) }}">
                            <x-icons name="eye" class="w-4 h-4" />
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $resellers->links() }}
        @else
            <div class="text-center">{{ __('common.search_not_found') }}</div>
        @endif
    </div>
</div>
