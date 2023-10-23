@props(['color' => 'bg-gray-300', 'name'])
<div class="flex items-center justify-center mr-4 h-12 w-12 rounded {{ $color }}">
    <x-icons name="{{ $name }}" class="text-white w-6 h-6" />
</div>
