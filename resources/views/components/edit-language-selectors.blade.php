@props(['currentLang' => config('app.locale')])

<div class="flex items-center justify-end space-x-4">
    <ul class="flex items-center justify-end space-x-2 text-sm">
        @if ($currentLang !== config('app.locale'))
            <li>
                <button
                    class="block h-10 leading-10 bg-color-18181a text-white px-4 font-bold hover:bg-color-18181a/80"
                    wire:click="translateAllFields"
                    wire:confirm="{{ __('categories.edit.languages.confirm_translation') }}"
                    wire:loading.class="bg-color-ffa76c hover:bg-color-ffa76c"
                    wire:target="translateAllFields"
                >
                    <span wire:loading wire:target="translateAllFields">{{ __('categories.edit.languages.translations_in_progress') }}</span>
                    <span wire:loading.remove wire:target="translateAllFields">{{ __('categories.edit.languages.translate_all_fields_from', ['lang' => strtoupper(config('app.locale'))]) }}</span>
                </button>
            </li>
        @endif
        @foreach (config('gearxpro.languages') as $iso => $langData)
            <li wire:key="lang_{{ $iso }}" @class([
                    'p-2 border-t-2 hover:opacity-100',
                    'bg-white border-color-18181a' => $currentLang === $iso,
                    'opacity-50 border-transparent' => $currentLang !== $iso,
            ])
            >
                <button class="block p-0.5" wire:click="setCurrentLang('{{ $iso }}')">
                    <span class="inline-block h-5 w-10 leading-5 text-sm font-semibold">{{ $langData['label'] }}</span>
                </button>
            </li>
        @endforeach
    </ul>
</div>
