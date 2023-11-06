@props(['title', 'options', 'uppercase' => ''])

<div x-data="{ open: false }" @class([$uppercase])>
    <div @click="open = ! open" class="flex justify-between items-center">
        <h5 class="text-[17px] font-semibold leading-[20px] text-color-18181a">{{$title}}</h5>
        <x-icons name="chevron_down" />
    </div>

    <div
        :class="{'!h-fit mt-6': open}"
        class="h-0 transition-all duration-300 ease-out overflow-hidden flex flex-col gap-6"
    >
        @foreach ($options as $option )
            <a href="{{$option}}" class="text-[14px] font-medium leading-[18px] text-color-6c757d">{{$option}}</a>
        @endforeach
    </div>
</div>
