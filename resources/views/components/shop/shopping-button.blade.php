@props(['color' => 'orange', 'icon' => ''])
@switch ($color)
    @case('orange')
        @php($class = 'bg-color-ff7f6e')
        @break
    @case('green')
        @php($class = 'bg-color-46beac')
        @break
@endswitch

<button {{ $attributes->merge(['class' => $class . ' group w-full h-12 rounded-md flex justify-between items-center border border-transparent hover:border-color-18181a disabled:opacity-25 disabled:pointer-events-none']) }}>
    <div class="h-full flex items-center grow relative text-white group-hover:text-white">
        <span class="z-10 text-sm font-semibold pl-6 group-hover:text-color-18181a">
            {{ $slot }}
        </span>
        <div
            class="h-full absolute top-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-l-md"></div>
    </div>
    <div
        class="h-full border-l border-white group-hover:border-color-18181a px-4 flex items-center justify-center group-hover:bg-white rounded-r-md">
        <x-icons :name="$icon" class="w-4 h-4 text-white group-hover:text-color-18181a"></x-icons>
    </div>
</button>
