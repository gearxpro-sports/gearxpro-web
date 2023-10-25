@props(['name', 'width' => '', 'label', 'required' => false])

<div @class(["flex flex-col", $width])>
    <label for="{{ $name }}" class="text-[12px] font-medium leading-[15px] text-color-18181a mb-1">
        {{ __('shop.payment.'. $label) }}@if ($required)*@endif
    </label>
    <input type="text" name="{{ $name }}" {{ $attributes }}
        class="h-[48px] px-4 rounded-md bg-color-edebe5 p-0 border-color-e0e0df focus:border-transparent focus:ring-0"
    >
    <div>
        @error($name) <span class="text-[12px] text-color-f4432c">{{ $message }}</span> @enderror
    </div>
</div>
