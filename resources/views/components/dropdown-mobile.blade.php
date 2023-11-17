@props(['title', 'options', 'uppercase' => '', 'color' => 'black'])

<div x-data="{ open: false }" @class([$uppercase])>
    <div @click="open = ! open" class="flex justify-between items-center">
        <h5 @class(["text-[17px] font-semibold leading-[20px]", $color === 'black' ? 'text-color-18181a' : 'text-white'])>
            {{$title}}
        </h5>
        <div :class="{'rotate-180': open}" @class(["transition-all duration-300", $color === 'black' ? '' : 'invert'])>
            <x-icons name="chevron_down" />
        </div>
    </div>

    <div
        :class="{'!h-fit mt-6': open}"
        class="h-0 transition-all duration-300 ease-out overflow-hidden flex flex-col gap-6"
    >
        @foreach ($options as $option )
            <a href="{{$option}}" @class(["text-[14px] font-medium leading-[18px] text-color-6c757d", $color === 'black' ? 'text-color-18181a' : 'text-color-dee2e6'])>
                {{$option}}
            </a>
        @endforeach
    </div>
</div>
