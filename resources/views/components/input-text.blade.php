@props(['name', 'width' => '', 'label', 'required' => false, 'type' => 'text', 'placeholder' => ''])

<div @class(["flex flex-col relative", $width ])>
    <label for="{{ $name }}" class="text-[12px] font-medium leading-[15px] text-color-18181a mb-1">
        {{ __('shop.payment.'. $label) }}@if ($required)*@endif
    </label>
    <input type="{{$type}}" name="{{ $name }}" {{ $attributes }} placeholder="{{$placeholder}}"
        @class(["h-[48px] px-4 rounded-md bg-color-edebe5 p-0 border-color-e0e0df focus:border-transparent focus:ring-0 placeholder:text-color-18181a"])
    >
    <div class="absolute bottom-[-20px] right-0">
        @error($name) <span class="text-[12px] text-color-f4432c">{{ $message }}</span> @enderror
    </div>
</div>
