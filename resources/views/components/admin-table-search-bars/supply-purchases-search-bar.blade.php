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
    <div class="flex items-center gap-2">
{{--        <div class="w-full max-w-xs">--}}
{{--            <x-select name="prices">--}}
{{--                <option value="">{{ __('supply.index.filter.prices') }}</option>--}}
{{--                @foreach($prices as $price)--}}
{{--                    <option :value="$price">{{ $price }}</option>--}}
{{--                @endforeach--}}
{{--            </x-select>--}}
{{--        </div>--}}
{{--        <div class="w-full max-w-xs">--}}
{{--            <x-select name="prices">--}}
{{--                <option value="">{{ __('supply.index.filter.availabilities') }}</option>--}}
{{--                @foreach($availabilities as $availability)--}}
{{--                    <option :value="$availability">{{ $availability }}</option>--}}
{{--                @endforeach--}}
{{--            </x-select>--}}
{{--        </div>--}}
{{--        <x-primary-button>--}}
{{--            <x-slot:prepend>--}}
{{--                <x-icons name="filter" class="w-3.5 h-3.5"></x-icons>--}}
{{--            </x-slot:prepend>--}}
{{--            {{ __('common.filter') }}--}}
{{--        </x-primary-button>--}}
    </div>
</div>
