<button wire:click="select({{ $index }})"
    @class([
        'px-[25px] h-[48px] bg-color-18181a text-white text-[15px] font-semibold leading-[19px] rounded-md hover:bg-black',
        $selected === $index ? '!bg-black' : '',
    ])
>
  {{ $name }}
</button>
