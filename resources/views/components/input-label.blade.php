@props(['value'])

<label {{ $attributes->merge(['class' => 'flex text-xs']) }}>
    {{ $value ?? $slot }}
</label>
