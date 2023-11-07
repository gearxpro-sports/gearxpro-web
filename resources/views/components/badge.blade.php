@props(['color' => 'gray'])
@switch($color)
    @case('black')
        @php($class = 'bg-color-18181a text-white')
        @break
    @case('red')
        @php($class = 'bg-color-f55b3f text-white')
        @break
    @case('orange')
        @php($class = 'bg-color-f5af3f text-white')
        @break
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
    @case('lightgreen')
        @php($class = 'bg-color-b9eddd text-color-0c9d87')
        @break
@endswitch
<span {{ $attributes->merge(['class' => $class .' inline-flex items-center rounded-full px-3.5 py-1.5 text-xs font-medium']) }}>
    {{ $slot }}
</span>
