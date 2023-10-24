<div class="w-full h-[1258px] bg-black px-[39px] py-[140px] flex">

    <div class="h-full w-1/3 relative">
        <div class="absolute left-[0px] top-[229px] z-20 w-[506px]">
            <h2 class="text-[63px] font-bold leading-[76px] text-white mb-[30px]">Are Hidden In Buildings</h2>
            <p class="text-[17px] leading-[28px] text-white mb-[50px]">
                Road markings and street furniture. <br>
                They’re subtle, still, they don’t shout to be heard, but <br> they’re everywhere.
            </p>

            <x-custom-button text="Ambassador" :icon="'shield'" :link="'/' "/>
        </div>
    </div>

    <div class="w-2/3">
        <img src="{{ Vite::asset('resources/images/ambassador.png')}}" alt="">
    </div>
</div>
