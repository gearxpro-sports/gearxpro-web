@props(['title', 'description', 'image'])

<div class="max-w-[294px] xl:min-w-[514px] xl:h-[747px] rounded-b-md overflow-hidden border-b border-color-18181a group relative swiper-slide">
    <div class="z-10 w-full h-[calc(100%-61px)] absolute top-0 left-0 group-hover:bg-color-18181a/30 transition-all duration-500"></div>
    <div class="w-full h-[calc(100%-61px)] bg-white flex items-center justify-center">
        <img src="{{ Vite::asset('resources/images/'.$image) }}" alt="">
    </div>
    <div class="h-[61px] w-full bg-white flex border border-b-0 border-color-18181a rounded-b-md">
        <div class="grow flex flex-col justify-center px-[20px] relative">
            <h3 class="z-10 text-[15px] font-semibold leading-[19px] group-hover:translate-y-[10px] transition-all duration-500">{{ $title }}</h3>
            <p class="z-10 text-[12px] font-medium text-[#6C757D] group-hover:opacity-0 transition-all duration-500 ">{{ $description }}</p>
            <div class="h-full absolute top-0 left-0 w-0 bg-color-f3f7f9 group-hover:animate-line group-hover:w-full rounded-bl-md"></div>
        </div>
        <div class="h-full w-[60px] flex items-center justify-center border-l border-color-18181a bg-color-f3f7f9">
            <img class="!w-[10px]" src="{{ Vite::asset('resources/images/icons/double_arrow_right.svg')}}" alt="">
        </div>
    </div>
</div>
