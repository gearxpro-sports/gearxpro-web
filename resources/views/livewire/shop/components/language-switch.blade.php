<div class="relative uppercase" x-data="{ isOpen: false}">
    <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false" @close.stop="isOpen = false"
            @click.outside="isOpen = false"
            class="h-[28px] p-[14px] space-x-[21px] flex items-center justify-center rounded-md"
            :class="isOpen ? 'bg-color-dee2e6' : 'bg-color-f3f7f9'"
    >
        <span class="font-medium text-[13px] uppercase">{{ $current }}</span>
        <img src="{{ Vite::asset('resources/images/icons/arrow-down-bold.svg')}}" alt="">
    </button>

    <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
        class="absolute left-0 z-20 p-1 mt-1 text-[12px] font-medium bg-white shadow overflow-hidden rounded border border-color-dee2e6 w-[83px]"
    >
        @foreach ($languages as $key => $language)
            <li wire:key='{{$key}}' wire:click="changeLanguage('{{$language}}')"
                class="text-color-6c757d hover:text-color-323a46 px-2 py-3 hover:bg-color-f3f7f9 cursor-pointer">
                {{ $language }}
            </li>
        @endforeach
    </ul>
</div>
