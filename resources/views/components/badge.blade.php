@props(['color' => 'gray'])
@switch($color)
    @case('gray')
    @php($class = 'bg-color-eff0f0 text-color-6c757d')
    @break
    @case('lightblue')
        @php($class = 'bg-color-e9f5f8 text-color-81a7db')
        @break
    @case('blue')
        @php($class = 'bg-color-4357ef text-white')
        @break
    @case('green')
        @php($class = 'bg-color-20c391 text-white')
        @break
@endswitch
<span class="{{ $class }} inline-flex items-center rounded-full px-3.5 py-1 text-xs font-medium">
    {{ $slot }}
</span>
