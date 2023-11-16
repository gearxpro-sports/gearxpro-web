<div class="w-full bg-black px-4 xl:px-[39px] py-10 xl:py-[140px] flex flex-col xl:flex-row">

    <div class="xl:h-full w-full xl:w-1/3 relative">
        <div class="xl:absolute left-[100px] top-[229px] z-20 w-full xl:w-[325px]">
            <h2 class="text-3xl xl:text-[81px] font-bold leading-10 xl:leading-[76px] text-white mb-6 xl:mb-[30px]">Together,
                we carry
                excellence
                forward.</h2>
            <p class="xl:hidden text-[14px] leading-[21px] text-white mb-7">
                Road markings and street furniture. <br>
                They’re subtle, still, they don’t shout to be heard, but <br> they’re everywhere.
            </p>
            <div class="w-full xl:hidden mb-10">
                <x-custom-button text="Ambassador" :icon="'shield'" :link="'/' " width="w-full"/>
            </div>
        </div>
    </div>

    <div class="w-2/3 hidden xl:block">
        <img src="{{ Vite::asset('resources/images/gear/collage_footer.jpg')}}" alt="">
    </div>
    <div class="w-full xl:hidden">
        <img class="w-full" src="{{ Vite::asset('resources/images/collage_vertical.png')}}" alt="">
    </div>
</div>
