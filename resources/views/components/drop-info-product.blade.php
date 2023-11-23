@props(['title', 'options', 'color' => 'black', 'type' => 'route'])

<div x-data="{ open: false }">
    <div @click="open = ! open" class="flex justify-between items-center">
        <h5 @class(["text-[17px] font-semibold leading-[20px]", $color === 'black' ? 'text-color-18181a' : 'text-white'])>
            {{$title}}
        </h5>
        <div class="relative">
            <div :class="{'rotate-90': !open}" @class(["transition-all duration-300 absolute right-4", $color === 'black' ? '' : 'invert'])>
                <x-icons name="minus_menu" />
            </div>
            <x-icons class="absolute right-4" name="minus_menu" />
        </div>
    </div>

    <div
        :class="{'!h-fit mt-6': open}"
        class="h-0 transition-all duration-300 ease-out overflow-hidden flex flex-col gap-6"
    >
        {{ $slot }}
    </div>
</div>
