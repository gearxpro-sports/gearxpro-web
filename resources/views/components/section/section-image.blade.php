<a href="{{ route('about_us.whoWeAre', ['country_code' => session('country_code')]) }}" class="w-full h-[calc(100vh-106px)] xl:h-fit lg:flex items-center justify-center bg-section_image xl:bg-none bg-center bg-cover bg-no-repeat bg-color-e6e7e9 xl:px-[195px] xl:py-[90px] relative">
    <div class="hidden xl:flex">
        <img class="w-1/2" src="{{ Vite::asset('resources/images/gear/reminder_left.jpg') }}" alt="">
        <img class="w-1/2" src="{{ Vite::asset('resources/images/gear/reminder_right.jpg') }}" alt="">
    </div>

    {{-- <img class="w-full max-h-screen xl:hidden" src="{{ Vite::asset('resources/images/gear/reminder_left.jpg') }}" alt=""> --}}
    {{-- <div class="z-10 w-full xl:hidden">
        <div class="absolute top-0 right-0 w-full h-full bg-[#0F2674]/40"></div>

        <div class="absolute px-4 top-14 z-20 w-full">
            <h2 class="text-[30px] font-bold leading-[40px] text-white mb-[24px]">Are Hidden In Buildings</h2>
            <p class="text-[14px] leading-[21px] text-white mb-[50px]">
                Road markings and street furniture. <br>
                They’re subtle, still, they don’t shout to be heard, but <br> they’re everywhere.
            </p>

            <x-custom-button text="Scopri di più" :icon="'arrow-right'" :link="'/' " width="w-full"/>
        </div>
    </div> --}}
</a>
