@props(['href' => null, 'disabled' => false, 'append' => null, 'prepend' => null])

@php($class = 'h-10 inline-flex justify-center items-center space-x-2 rounded bg-color-18181a py-2.5 px-6 text-xs font-semibold text-white transition duration-300 hover:bg-color-323a46 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-purple disabled:cursor-not-allowed disabled:opacity-25')

@if($href)
    <a href="{{$href}}" {{ $attributes->merge(['class' => $class]) }}>
        @if($prepend)
            {{ $prepend }}
        @endif
        <span>{{ $slot }}</span>
        @if($append)
            {{ $append }}
        @endif
    </a>
@else
    <button
        {{ $attributes->merge(['type' => 'submit', 'class' => $class]) }}
        @disabled($disabled)
    >
        @if($prepend)
            {{ $prepend }}
        @endif
        <span>{{ $slot }}</span>
        @if($append)
            {{ $append }}
        @endif
    </button>
@endif
