@props(['bg_image', 'year', 'height'])

<section @class(["section relative col-span-12 h-[1080px] bg-cover bg-center bg-no-repeat", $bg_image, $height])>
    <h2 class="z-10 w-fit absolute top-32 left-9 text-7xl font-bold text-color-5D5D5D mb-[-300px]">{{$year}}</h2>

    <div class="absolute top-0 left-0 w-full h-full">
        {{ $slot }}
    </div>
</section>
