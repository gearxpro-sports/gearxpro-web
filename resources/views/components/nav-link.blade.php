@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-[15px] font-semibold leading-[19px] text-color-18181a focus:outline-none group'
            : 'text-[15px] font-semibold leading-[19px] text-color-18181a focus:outline-none group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    <div class="h-[2px] w-0 bg-color-18181a group-hover:animate-line group-hover:w-full"></div>
</a>
