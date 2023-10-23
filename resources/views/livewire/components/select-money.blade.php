<div class="flex gap-2 items-center">
    <div class="relative h-[48px] w-[206px]">
      <button wire:click="toggle" class="w-full h-full flex items-center justify-between bg-transparent border border-color-b6b9bb rounded-md px-[22px] text-[15px] font-medium leading-[19px] text-color-18181a capitalize">
        {{ $options[$selected]['name'] }}
        <img src="{{ Vite::asset('resources/images/icons/arrow-down.svg')}}" alt="">
      </button>

      @if ($open)
        <ul class="bg-white absolute mt-1 p-1 z-10 border rounded-md w-full">
          @foreach($options as $key => $option)
            <li wire:click="select({{ $key }})"
                @class([
                    'px-3 py-2 cursor-pointer capitalize',
                    'bg-color-f3f7f9' => $selected === $key,
                    'hover:bg-color-f3f7f9 hover:text-color-323a46',
                ])
            >
                {{ $option['name'] }}
            </li>
          @endforeach
        </ul>
      @endif
    </div>
</div>
