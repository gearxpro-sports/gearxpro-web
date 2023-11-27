@props(['bg_image', 'title', 'text'])

<div class="section relative grid grid-cols-12 grid-rows-6">
    <div @class(["absolute top-0 left-0 w-full h-[100vh] bg-center bg-cover bg-no-repeat", $bg_image])></div>

    <div class="action z-10 col-span-12 xl:col-span-8 row-span-6 px-4 xl:pl-[92px] xl:pt-[13px] overflow-hidden transition-all duration-1000">
        <h3 style="word-spacing: 100vw" class="xl:text-[250px] font-extrabold leading-[111px] xl:leading-[190px] tracking-[-3px] uppercase text-white mb-5 values-h3">{{$title}}</h3>
        <p class="xl:pl-5 text-xl xl:text-[29px] font-medium leading-[35px] tracking-[2px] text-white values-p">{{$text}}</p>
    </div>
</div>
