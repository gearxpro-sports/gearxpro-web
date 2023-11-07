@props(['href' => null])

@php($class = 'h-10 inline-flex justify-center items-center space-x-2 rounded bg-color-e54f33 py-2.5 px-6 text-xs font-semibold text-white transition duration-300 hover:bg-color-f55b3f focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-purple disabled:cursor-not-allowed disabled:opacity-25')

@if($href)
    <a href="{{$href}}" {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $class]) }}>
        {{ $slot }}
    </button>
@endif
