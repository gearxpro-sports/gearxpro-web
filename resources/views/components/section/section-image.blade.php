<div class="w-full h-[1115px] flex bg-color-f2f0eb px-[195px] py-[90px]">
    <div class="h-full w-1/2">
        <img class="h-full" src="{{ Vite::asset('resources/images/AdobeStock_428598977.png')}}" alt="">
    </div>
    <div class="h-full w-1/2 relative">
        <div class="z-10 absolute top-0 right-0 w-full h-full bg-[#0F2674]/40"></div>
        <img class="h-full absolute top-0 right-0" src="{{ Vite::asset('resources/images/AdobeStock_612274890.png')}}" alt="">

        <div class="absolute left-[140px] top-[205px] z-20 w-[506px]">
            <h2 class="text-[63px] font-bold leading-[76px] text-white mb-[30px]">Are Hidden In Buildings</h2>
            <p class="text-[17px] leading-[28px] text-white mb-[50px]">
                Road markings and street furniture. <br>
                They’re subtle, still, they don’t shout to be heard, but <br> they’re everywhere.
            </p>

            <x-custom-button text="Scopri di più" :icon="'arrow-right'" :link="'/' "/>
        </div>
    </div>
</div>
