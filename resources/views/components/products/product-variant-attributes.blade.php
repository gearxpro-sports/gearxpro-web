<div {{ $attributes->merge(['class' => 'flex items-center space-x-10 text-sm font-semibold']) }}>
    @foreach ($productVariant->terms as $term)
        <div class="flex items-center space-x-2">
            <span class="text-color-b6b9bb">{{ $term->attribute->name }}:</span>
            @if ($term->color)
                @if (in_array($term->color, ['#fff', '#ffffff']))
                    <span
                        class="inline-block h-5 w-5 rounded-full border border-color-b6b9bb bg-white"></span>
                @else
                    @php
                        $colors = explode(',', $term->color);
                    @endphp
                    @if(count($colors) > 1)
                        <div
                            class="h-5 w-5 rounded-full"
                            style="background: linear-gradient(135deg, {{$colors[0]}} 50%, {{$colors[1]}} 50%);"
                        ></div>
                    @else
                        <div class="inline-block h-5 w-5 rounded-full"
                              style="background-color: {{ $term->color }}"></div>
                    @endif
                @endif
            @endif
            <span
                @if ($term->color && !in_array($term->color, ['#fff', '#ffffff'])) style="color: {{ $term->color }}" @endif>
                {{ $term->value }}
            </span>
        </div>
    @endforeach
</div>
