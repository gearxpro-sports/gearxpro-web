<tr class="[&>td]:p-4 [&>td]:px-7 border-t border-color-eff0f0 hover:bg-color-eff0f0/50">
    <td class="font-bold">{{ $country->name }}</td>
    <td class="text-center"><img class="inline-block w-10 mr-2 rounded-sm" src="https://flagcdn.com/w320/{{ strtolower($country->iso2_code) }}.png" alt="{{ $country->name }}"></td>
    <td>
        <div class="inline-flex items-center space-x-4">
            <x-select
                class="!w-40"
                name="country_reseller_{{ $country->id }}"
                wire:change="setReseller($event.target.value, {{ $country->id }})"
                wire:confirm="{{  __('countries.index.confirm', ['country' => $country->name]) }}"
            >
                <option value="">{{ __('common.select') }}</option>
                @foreach($resellers as $reseller)
                    <option wire:key="country_{{ $country->id }}_reseller_{{ $reseller->id }}" @selected($reseller->id === $country->reseller?->id) value="{{ $reseller->id }}">({{ strtoupper($reseller->country_code) }}) {{ $reseller->fullName }}</option>
                @endforeach
            </x-select>
            @if (!$country->reseller)
                <x-icon
                    name="heroicon-o-exclamation-circle"
                    class="w-5 h-5 text-orange-500"
                ></x-icon>
            @endif
        </div>
    </td>
</tr>
