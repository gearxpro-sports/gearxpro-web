@props(['title', 'options'])

<div class="relative uppercase" x-data="{ dropOpen: false}">
    <button
        @click="dropOpen = !dropOpen"
        @keydown.escape="dropOpen = false"
        @click.outside="dropOpen = false"
        @close.stop="dropOpen = false"
        class="group"
    >
        <div class="flex space-x-1">
            <span class="text-[15px] font-semibold leading-[19px] text-color-18181a focus:outline-none">{{ $title }}</span>
            <img src="{{ Vite::asset('resources/images/icons/arrow-down-bold.svg')}}" alt="">
        </div>

        <div class="h-[2px] w-0 bg-color-18181a group-hover:animate-line group-hover:w-full"></div>
    </button>

    <ul x-show="dropOpen" @click.away="dropOpen = false"
        class="absolute left-0 z-20 p-1 mt-1 text-[12px] font-medium bg-white shadow overflow-hidden rounded border border-color-dee2e6"
    >
        @foreach ($options as $option )
            <li class="text-color-6c757d hover:text-color-323a46 px-2 py-3 hover:bg-color-f3f7f9 cursor-pointer whitespace-nowrap">
                {{$option}}
            </li>
        @endforeach
    </ul>
</div>
