<footer class="w-full relative z-[-1] xl:pt-[85px] xl:pb-[67px] bg-color-010101 grid grid-cols-4 xl:grid-cols-12 xl:grid-rows-6 gap-[10px] xl:gap-[30px]">

    <div class="hidden col-start-3 col-span-3 row-start-1 row-span-6 pr-[86px] xl:flex flex-col justify-between items-center text-white">
        <div class="flex flex-col gap-[28px] text-[13px] font-medium leading-[16px]">
            <h4 class="text-[15px] font-semibold uppercase leading-[19px]">BRANDS</h4>
            <a href="">SOXPro</a>
            <a href="">FLEXGXPro</a>
            <a href="">LACEXPro</a>
            <a href="">TUBEXPro</a>
            <a href="">Recovery</a>
        </div>

        <p class="text-[13px] font-semibold leading-[32px]">Copyright © 2023  |  GEARXPRO SPORTS CO. LIMITED</p>
    </div>

    <div class="hidden col-start-6 col-span-2 row-start-1 row-span-4 xl:flex justify-center pr-[86px] text-white">
        <div class="flex flex-col gap-[28px] text-[13px] font-medium leading-[16px]">
            <h4 class="text-[15px] font-semibold uppercase leading-[19px]">MY ACCOUNT</h4>
            <a href="">Dashboard</a>
            <a href="">Carrello</a>
            <a href="">Checkout</a>
            <a href="">Ordini</a>
            <a href="">Spedizione</a>
        </div>
    </div>

    <div class="hidden col-start-8 col-span-3 row-start-1 row-span-6 xl:flex flex-col justify-between">
        <div class="flex flex-col gap-[28px] text-[13px] font-medium leading-[16px] pl-[86px]">
            <h4 class="text-[15px] font-semibold uppercase leading-[19px] text-white">SQUADRE E GRANDI GRUPPI</h4>
            <p class="text-white">Richiedi il GEARXPro B2B</p>
            <x-custom-button :text="'B2B GearXPro'" :icon="'airplain'" :link="'/'" />

            <div class="flex items-end gap-[22px]">
                <a href="">
                    <x-icons name="facebook" />
                </a>
                <a href="">
                    <x-icons name="linkedin" />
                </a>
                <a href="">
                    <x-icons name="youTube" />
                </a>
                <a href="">
                    <x-icons name="instagram" />
                </a>
            </div>
        </div>

        <div>
            <div class="flex gap-2 justify-end mb-[23px]">
                <div class="w-[30px] h-5 bg-white rounded-sm"></div>
                <div class="w-[30px] h-5 bg-white rounded-sm"></div>
                <div class="w-[30px] h-5 bg-white rounded-sm"></div>
                <div class="w-[30px] h-5 bg-white rounded-sm"></div>
                <div class="w-[30px] h-5 bg-white rounded-sm"></div>
                <div class="w-[30px] h-5 bg-white rounded-sm"></div>
            </div>

            <div class="flex justify-end gap-[25px] text-[13px] font-medium text-white whitespace-nowrap">
                <a href="">Condizioni di vendita</a>
                <a href="">Privacy policy</a>
                <a href="">Rimborsi e resi</a>
                <a href="">Cookie</a>
            </div>
        </div>

    </div>

    {{-- responsive mobile footer --}}
    <div class="xl:hidden col-start-1 col-span-4 px-4 pt-16 mb-14">
        <h3 class="text-base font-semibold text-white mb-7">SQUADRE E GRANDI GRUPPI</h3>
        <p class="text-sm font-medium text-white mb-6">Richiedi il GEARXPro B2B</p>
        <x-custom-button :text="'B2B GearXPro'" :icon="'airplain'" :link="'/'" width="w-full" />
    </div>

    <div class="xl:hidden col-start-1 col-span-4 px-4 space-y-7">
        <x-dropdown-mobile title="{{ __('shop.footer.brands') }}" :options="['Chi siamo', 'GEARXPro Values', 'Ricerca e Sviluppo']" color="white" />
        <x-dropdown-mobile title="{{ __('shop.footer.my_account') }}" :options="['Chi siamo', 'GEARXPro Values', 'Ricerca e Sviluppo']" color="white" />
        <x-dropdown-mobile title="{{ __('shop.footer.privacy') }}" :options="['Chi siamo', 'GEARXPro Values', 'Ricerca e Sviluppo']" color="white" />
    </div>

    <div class="xl:hidden col-start-1 col-span-4 px-14 mt-20">
        <div class="flex item-center justify-between mb-[30px]">
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
            <div class="w-[30px] h-5 bg-white rounded-sm"></div>
        </div>

        <div class="flex items-end justify-between">
            <a href="">
                <x-icons name="facebook" />
            </a>
            <a href="">
                <x-icons name="linkedin" />
            </a>
            <a href="">
                <x-icons name="youTube" />
            </a>
            <a href="">
                <x-icons name="instagram" />
            </a>
        </div>
    </div>

    <div class="xl:hidden col-start-1 col-span-4 px-4 mt-16 mb-11">
        <p class="text-[12px] text-center font-semibold text-white leading-[32px]">Copyright © 2023  |  GEARXPRO SPORTS CO. LIMITED</p>
    </div>
</footer>
