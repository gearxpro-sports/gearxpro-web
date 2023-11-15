@props(['title', 'options', 'active'])

<div class="relative capitalize" x-data="{ dropOpen: false}">
    <button
        @click="dropOpen = !dropOpen"
        @keydown.escape="dropOpen = false"
        @click.outside="dropOpen = false"
        @close.stop="dropOpen = false"
        class="group"
    >
        <div class="flex items-center space-x-1">
            <span class="text-[15px] font-semibold leading-[19px] text-color-18181a focus:outline-none">{{ $title }}</span>
            <x-icons name="arrow-down-bold" />
        </div>

        @if ($active)
            <div class="h-[2px] w-full bg-color-18181a"></div>
        @else
            <div class="h-[2px] w-0 bg-color-18181a group-hover:animate-line group-hover:w-full"></div>
        @endif
    </button>


    <div x-cloak x-show="dropOpen" @click.away="dropOpen = false"
        class="absolute top-11 left-[-30px] z-20 min-w-[240px] py-2 text-sm font-medium bg-white shadow overflow-hidden rounded flex flex-col gap-1"
    >
        @foreach ($options as $option )
            <a href="{{route($option['route'], ['country_code' => session('country_code')])}}" class="w-full text-color-6c757d px-4 py-3 hover:bg-color-18181a hover:text-white cursor-pointer whitespace-nowrap group">
                <span class="group-hover:pl-3 transition-all duration-300">{{$option['name']}}</span>
            </a>
        @endforeach
    </div>
</div>
