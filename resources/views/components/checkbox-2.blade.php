@props(['disabled' => false, 'required' => false, 'name', 'label' => false])
@php
    $n = $attributes->wire('model')->value() ?: $name;
    $slug = $attributes->wire('model')->value() ?: $n;
    $inputClass = 'bg-color-f2f0eb border-2 border-color-e0e0df rounded text-color-18181a focus:ring-0 !focus:outline-none focus:ring-offset-0';
@endphp

<label class="flex items-center">
    <input type="checkbox" {{ $disabled ? 'disabled' : '' }}
    {{ $required ? 'required' : '' }}
    {{ $attributes->merge(['class' => $inputClass]) }}
    name="{{ $slug }}"
           id="{{ $slug }}"
    >
    <span class="ml-2 text-xs text-color-6c757d {{ $disabled ? 'opacity-50' : '' }}">{{ $label }}</span>
</label>
