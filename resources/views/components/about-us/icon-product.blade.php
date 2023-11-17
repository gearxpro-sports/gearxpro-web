@props(['color_1', 'color_2', 'color_3', 'border_color', 'width', 'left' => 'true'])

<div class="flex items-center gap-1">
    @if ($left == 'true')
        <div @class(["h-1 rounded-full shadow", $width, $color_1])></div>
    @endif
    <div @class(["w-10 h-10 p-[2px] bg-color-18181a rounded-full border-2 border-dashed animate-spin_slow", $border_color])>
        <div @class(["w-full h-full p-1 rounded-full", $color_1])>
            <div class="w-full h-full bg-white rounded-full p-[1px]">
                <div @class(["w-full h-full rounded-full p-[5px]", $color_2])>
                    <div @class(["w-full h-full rounded-full", $color_3])></div>
                </div>
            </div>
        </div>
    </div>
    @if ($left == 'false')
        <div @class(["h-1 rounded-full shadow", $width, $color_1])></div>
    @endif
</div>
