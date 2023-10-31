@props(['required' => false, 'name', 'label' => false, 'placeholder' => null])

@php
    $placeholder ?: $label;
    $rteId = Str::random(9);
@endphp

@pushOnce('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endPushOnce

@pushOnce('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endPushOnce

<div wire:ignore x-data="{
        value: @entangle($attributes->wire('model')).live,
        init() {
            let quill = new Quill('#rte-{{ $rteId }}', {
                theme: 'snow',
                placeholder: '{{ $placeholder }}'
            });
            quill.root.innerHTML = this.value;
            quill.on('text-change', () => {
                this.value = quill.root.innerHTML;
            });
        }
    }"
    class="[&>.ql-toolbar]:!border [&>.ql-toolbar]:!border-color-eff0f0"
>
    @if($label)
        <div class="flex items-center justify-between mb-2">
            @if ($label)
                <x-input-label :for="$name" :required="$required">{{ $label }}</x-input-label>
            @endif
        </div>
    @endif
    <div id="rte-{{ $rteId }}" class="[&>.ql-editor]:h-[250px] !border !border-color-eff0f0"></div>
</div>
