@props(['disabled' => false, 'required' => false, 'name', 'label' => false, 'hint' => false, 'append' => false, 'prepend' => false, 'iconColor' => 'text-gray-800'])
@php
    $n = $attributes->wire('model')->value() ?: $name;
    $slug = $attributes->wire('model')->value() ?: $n;
    $inputClass = 'h-10 block w-full text-sm text-color-18181a border border-color-eff0f0 rounded focus:outline-none focus:ring-0 focus:ring-offset-0 placeholder:placeholder-color-b6b9bb';
@endphp
@error($slug)
@php
    $inputClass .= ' pr-11 border-red-300 focus:outline-none text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500';
@endphp
@else
    @php
        $inputClass .= ' focus:border-indigo-300 focus:ring-indigo-200';
    @endphp
    @enderror
    @if($prepend)
        @php
            $inputClass .= ' pl-11';
        @endphp
    @endif
    @if($append)
        @php
            $inputClass .= ' pr-11';
        @endphp
    @endif

    <div>
        @if($label || isset($action))
            <div class="flex items-center justify-between">
                @if ($label)
                    <x-input-label :for="$name" :required="$required">{{ $label }}</x-input-label>
                @endif
                @isset($action)
                    <div class="text-xs">
                        {{ $action }}
                    </div>
                @endisset
            </div>
        @endif
        <div class="relative @if($label || isset($action)) mt-2 @endif">
            @if($prepend)
                {{ $prepend }}
            @endif
            <input
                {{ $attributes->merge(['class' => $inputClass]) }}
                {{ $attributes['type'] == 'number' && !$attributes['step'] ? 'step=0.001' : 'step=$attributes[\'step\']' }}
                {{ $disabled ? 'disabled' : '' }}
                name="{{ $slug }}"
                id="{{ $slug }}"
                {{ $required ? 'required' : '' }}
            >
            @error($slug)
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <x-icon
                    name="heroicon-o-exclamation-circle"
                    class="w-5 h-5 text-red-500"
                ></x-icon>
            </div>
            @else
                @if($append)
                    {{ $append }}
                @endif
                @enderror
        </div>
        @if($hint)
            <p class="mt-1 text-xs text-gray-500">{{ $hint }}</p>
        @endif
        <x-input-error :messages="$errors->get($slug)" class="mt-1"></x-input-error>
    </div>
