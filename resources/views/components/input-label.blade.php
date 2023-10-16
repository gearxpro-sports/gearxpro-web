@props(['value', 'required'])

<label {{ $attributes->merge(['class' => 'flex text-xs']) }}>
    {{ $value ?? $slot }} @if($required)<span class="ml-0.5 text-red-500">*</span>@endif
</label>
