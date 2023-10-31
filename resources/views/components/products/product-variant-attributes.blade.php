<div {{ $attributes->merge(['class' => 'flex items-center space-x-10 text-sm font-semibold']) }}>
    @foreach ($productVariant->attributes as $attribute)
        <div class="flex items-center space-x-2">
            <span class="text-color-b6b9bb">{{ $attribute->group->name }}:</span>
            @if ($attribute->color)
                @if (in_array($attribute->color, ['#fff', '#ffffff']))
                    <span
                        class="inline-block h-5 w-5 rounded-full border border-color-b6b9bb bg-white"></span>
                @else
                    <span class="inline-block h-5 w-5 rounded-full"
                          style="background-color: {{ $attribute->color }}"></span>
                @endif
            @endif
            <span
                @if ($attribute->color && !in_array($attribute->color, ['#fff', '#ffffff'])) style="color: {{ $attribute->color }}" @endif>
                {{ $attribute->value }}
            </span>
        </div>
    @endforeach
</div>
