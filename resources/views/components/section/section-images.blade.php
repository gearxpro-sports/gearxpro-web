<div class="w-full bg-black px-4 xl:px-[39px] py-10 xl:py-[140px] flex flex-col lg:flex-row">
    <div class="lg:h-full w-full lg:w-2/5 relative">
        <div class="lg:absolute left-[75px] 2xl:left-[100px] top-[120px] 2xl:top-[229px] z-20 w-full lg:w-[325px]">
            <h2 class="text-3xl lg:text-6xl 2xl:text-[81px] font-bold leading-10 xl:leading-[76px] text-white mb-6 xl:mb-[30px]">Together,
                we carry
                excellence
                forward.</h2>
            <!-- <p class="xl:hidden text-[14px] leading-[21px] text-white mb-7">
                Road markings and street furniture. <br>
                They’re subtle, still, they don’t shout to be heard, but <br> they’re everywhere.
            </p> -->
            <div class="w-full lg:hidden mb-10">
                <x-custom-button text="Ambassador" :icon="'shield'" :link="route('about_us.partnership', ['country_code' => session('country_code')])" width="w-full"/>
            </div>
        </div>
    </div>

    <a href="{{ route('about_us.partnership', ['country_code' => session('country_code')]) }}" class="w-3/5 xl:w-2/3 hidden lg:block">
        <img src="{{ Vite::asset('resources/images/gear/collage_footer.jpg')}}" alt="">
    </a>
    <a href="{{ route('about_us.partnership', ['country_code' => session('country_code')]) }}" class="w-full lg:hidden">
        <img class="w-full" src="{{ Vite::asset('resources/images/homeimgam.png')}}" alt="">
    </a>
</div>
