@props(['bg_image', 'title', 'text'])

<div class="section relative grid grid-cols-12 grid-rows-6">
    <div @class(["absolute top-0 left-0 w-full h-[100vh] bg-center bg-cover bg-no-repeat", $bg_image])></div>

    <div class="z-10 col-span-12 xl:col-span-6 row-span-6 xl:pl-[92px] pt-[125px] xl:pt-[13px] overflow-hidden">
        <h3 style="word-spacing: 100vw" class="text-[200px] xl:text-[285px] font-extrabold leading-[170px] xl:leading-[227px]  tracking-[-3px] uppercase text-white mb-5">{{$title}}</h3>
        <p class="pl-5 text-[29px] font-medium leading-[35px] tracking-[2px] text-white">{{$text}}</p>
    </div>
</div>
