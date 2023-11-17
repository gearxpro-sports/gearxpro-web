@props(['label', 'content', 'width' => ''])

<div @class([$width])>
    <span class="text-xs font-medium text-color-6c757d">{{ $label }}</span>
    <span class="min-h-6 block text-base font-medium text-color-18181a">{{ $content }}</span>
</div>
