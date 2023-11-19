@props(['title', 'options', 'color' => 'black', 'type' => 'route'])

<div x-data="{ open: false }">
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
        @foreach ($options as $key => $option)
            @if ($type == 'route')
                <a wire:key='{{$key}}' href="{{route(isset($option['route']) ? $option['route'] : 'shop.index', ['country_code' => session('country_code')])}}"
                    @class(["text-[14px] font-medium leading-[18px] text-color-6c757d", $color === 'black' ? 'text-color-18181a' : 'text-color-dee2e6'])>
                    {{isset($option['name']) ? $option['name'] : '---'}}
                </a>
            @else
                <button wire:key='{{$key}}' wire:click="$dispatch('changeLanguage', {{$option}})"
                    class="text-color-6c757d text-start hover:text-color-323a46 px-2 py-3 hover:bg-color-f3f7f9 cursor-pointer uppercase">
                    {{ $option }}
                </button>
            @endif
        @endforeach
    </div>
</div>
