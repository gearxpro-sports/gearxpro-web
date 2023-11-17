@props(['href' => null, 'color' => 'orange', 'icon' => ''])
@switch ($color)
    @case('orange')
        @php($class = 'border-transparent bg-color-ff7f6e text-white hover:text-color-18181a')
        @php($bgClass = 'bg-white')
        @php($iconClass = 'border-white group-hover:border-color-18181a group-hover:text-18181a group-hover:bg-white')
        @break
    @case('green')
        @php($class = 'border-transparent bg-color-46beac text-white hover:text-color-18181a')
        @php($bgClass = 'bg-white')
        @php($iconClass = 'border-white group-hover:border-color-18181a group-hover:text-18181a group-hover:bg-white')
        @break
    @case('transparent')
        @php($class = 'border-color-18181a bg-transparent text-color-18181a hover:text-white')
        @php($bgClass = 'bg-color-18181a')
        @php($iconClass = 'border-color-18181a group-hover:border-white group-hover:text-white group-hover:bg-color-18181a')
        @break
@endswitch

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $class . ' group w-full h-12 rounded-md flex justify-between items-center border hover:border-color-18181a disabled:opacity-25 disabled:pointer-events-none']) }}>
        <div class="h-full flex items-center grow relative">
        <span class="z-10 text-sm font-semibold pl-6">
            {{ $slot }}
        </span>
            <div
                class="{{ $bgClass }} h-full absolute top-0 w-0 group-hover:animate-line group-hover:w-full rounded-l-md"></div>
        </div>
        <div
            class="h-full border-l px-4 flex items-center justify-center {{ $iconClass }} rounded-r-md">
            <x-icons :name="$icon" class="w-4 h-4"></x-icons>
        </div>
    </a>
@else
<button {{ $attributes->merge(['class' => $class . ' group w-full h-12 rounded-md flex justify-between items-center border hover:border-color-18181a disabled:opacity-25 disabled:pointer-events-none']) }}>
    <div class="h-full flex items-center grow relative">
        <span class="z-10 text-sm font-semibold pl-6">
            {{ $slot }}
        </span>
        <div
            class="{{ $bgClass }} h-full absolute top-0 w-0 group-hover:animate-line group-hover:w-full rounded-l-md"></div>
    </div>
    <div
        class="h-full border-l px-4 flex items-center justify-center {{ $iconClass }} rounded-r-md">
        <x-icons :name="$icon" class="w-4 h-4"></x-icons>
    </div>
</button>
@endif
