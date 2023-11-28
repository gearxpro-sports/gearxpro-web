<footer class="w-full relative lg:py-10 xl:pt-[85px] xl:pb-[67px] bg-color-010101 grid grid-cols-4 lg:grid-cols-12 gap-[10px] xl:gap-[30px]">
    <div class="hidden col-span-12 lg:grid grid-cols-4 lg:grid-cols-12 xl:grid-rows-6 gap-[10px] xl:gap-[30px]">
        <div class="col-start-2 xl:col-start-3 col-span-3 row-start-1 row-span-6 xl:pr-20 flex flex-col items-start xl:items-center text-white">
            <div class="flex flex-col gap-5 xl:gap-7 text-[13px] font-medium leading-[16px]">
                <h4 class="text-[15px] font-semibold uppercase leading-[19px]">PRODUCTS</h4>
                <a href="">SOXPro</a>
                <a href="">FLEXGXPro</a>
                <a href="">LACEXPro</a>
                <a href="">TUBEXPro</a>
                <a href="">Recovery</a>
            </div>
        </div>

        <div class="col-start-6 col-span-2 row-start-1 row-span-4 flex justify-start xl:justify-center xl:pr-20 text-white">
            <div class="flex flex-col gap-5 xl:gap-7 text-[13px] font-medium leading-[16px]">
                <h4 class="text-[15px] font-semibold uppercase leading-[19px]">MY ACCOUNT</h4>
                <a href="">Dashboard</a>
                <a href="">Cart</a>
                <a href="">Checkout</a>
                <a href="">Orders</a>
                <a href="">Shippments</a>
            </div>
        </div>

        <div class="col-start-8 col-span-4 xl:col-span-3 row-start-1 row-span-6 items-end xl:items-start flex flex-col justify-between">
            <div class="flex flex-col gap-5 xl:gap-7 text-[13px] font-medium leading-[16px] pl-20">
                <h4 class="text-[15px] font-semibold leading-[19px] text-white uppercase">Distributors</h4>
                <p class="text-white">Are you a distributor? Contact us</p>
                {{-- <x-custom-button :text="'B2B GearXPro'" :icon="'airplain'" :link="'/'" />--}}
                <a class="text-white" href="mailto:distributors@gearxpro-sports.com">distributors@gearxpro-sports.com</a>
                <div class="flex items-end gap-[22px]">
                    <a href="https://www.facebook.com/gearxprosportsofficial">
                        <x-icons class="text-white" name="facebook" />
                    </a>
                    <a href="https://www.linkedin.com/company/gearxpro-sports/">
                        <x-icons class="text-white" name="linkedin" />
                    </a>
                    <a href="https://www.youtube.com/@gearxprosports5301">
                        <x-icons class="text-white" name="youTube" />
                    </a>
                    <a href="https://www.instagram.com/gearxpro_sports/">
                        <x-icons class="text-white" name="instagram" />
                    </a>
                </div>
            </div>

            {{-- <div>
                <div class="flex gap-2 justify-end mb-[23px]">
                    <div class="w-[30px] h-5 bg-white rounded-sm"></div>
                    <div class="w-[30px] h-5 bg-white rounded-sm"></div>
                    <div class="w-[30px] h-5 bg-white rounded-sm"></div>
                    <div class="w-[30px] h-5 bg-white rounded-sm"></div>
                    <div class="w-[30px] h-5 bg-white rounded-sm"></div>
                    <div class="w-[30px] h-5 bg-white rounded-sm"></div>
                </div>


                <div class="flex justify-end gap-[25px] text-[13px] font-medium text-white whitespace-nowrap">
                    <a href="">Privacy policy</a>
                    <a href="">Returns & refounds</a>
                    <a href="">Cookie</a>
                </div>
            </div> --}}
        </div>

        <div class="col-span-10 col-start-2 xl:col-start-3 xl:col-span-8 flex justify-between mt-8 xl:mt-0">
            <p class="text-xs text-white font-semibold leading-5 whitespace-nowrap">Copyright © 2023  |  GEARXPRO SPORTS CO. LIMITED</p>
            <div class="flex justify-end gap-[25px] text-xs font-medium text-white whitespace-nowrap">
                <a href="">Privacy policy</a>
                <a href="">Returns & refounds</a>
                <a href="">Cookie</a>
            </div>
        </div>
    </div>

    {{-- responsive mobile footer --}}
    <div class="lg:hidden col-start-1 col-span-4 px-4 md:px-8 pt-16 mb-14">
        <h3 class="text-base font-semibold text-white mb-7">Distributors</h3>
        <p class="text-sm font-medium text-white mb-6">Are you a distributor? Contact us</p>
        {{-- <x-custom-button :text="'B2B GearXPro'" :icon="'airplain'" :link="'/'" width="w-full" />--}}
        <a class="text-white" href="mailto:distributors@gearxpro-sports.com">distributors@gearxpro-sports.com</a>
    </div>

    <div class="lg:hidden col-start-1 col-span-4 px-4 md:px-8 space-y-7">
        <x-dropdown-mobile title="{{ __('shop.footer.brands') }}" :options="$brands" color="white" />
        <x-dropdown-mobile title="{{ __('shop.footer.my_account.title') }}" :options="$account" color="white" />
        <x-dropdown-mobile title="{{ __('shop.footer.privacy') }}" :options="[]" color="white" />
    </div>

    <div class="lg:hidden col-start-1 col-span-4 px-14 mt-20">
        <div class="hidden xl:flex item-center justify-between mb-[30px]">
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
        </div>

        <div class="flex items-end justify-between">
            <a href="https://www.facebook.com/gearxprosportsofficial">
                <x-icons class="text-white" name="facebook" />
            </a>
            <a href="https://www.linkedin.com/company/gearxpro-sports/">
                <x-icons class="text-white" name="linkedin" />
            </a>
            <a href="https://www.youtube.com/@gearxprosports5301">
                <x-icons class="text-white" name="youTube" />
            </a>
            <a href="https://www.instagram.com/gearxpro_sports/">
                <x-icons class="text-white" name="instagram" />
            </a>
        </div>
    </div>

    <div class="lg:hidden col-start-1 col-span-4 px-4 mt-16 mb-11">
        <p class="text-[12px] text-center font-semibold text-white leading-[32px]">Copyright © 2023  |  GEARXPRO SPORTS CO. LIMITED</p>
    </div>
</footer>
