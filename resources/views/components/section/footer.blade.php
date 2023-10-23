<div class="w-full h-[561px] pt-[85px] pb-[67px] bg-black border-t border-white grid grid-cols-12 grid-rows-6 gap-[30px]">

    <div class="col-start-3 col-span-3 row-start-1 row-span-6 pr-[86px] flex flex-col justify-between items-center text-white">
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

    <div class="col-start-6 col-span-2 row-start-1 row-span-4 flex justify-center pr-[86px] text-white">
        <div class="flex flex-col gap-[28px] text-[13px] font-medium leading-[16px]">
            <h4 class="text-[15px] font-semibold uppercase leading-[19px]">MY ACCOUNT</h4>
            <a href="">Dashboard</a>
            <a href="">Carrello</a>
            <a href="">Checkout</a>
            <a href="">Ordini</a>
            <a href="">Spedizione</a>
        </div>
    </div>

    <div class="col-start-8 col-span-3 row-start-1 row-span-6 flex flex-col justify-between">
        <div class="flex flex-col gap-[28px] text-[13px] font-medium leading-[16px] pl-[86px]">
            <h4 class="text-[15px] font-semibold uppercase leading-[19px] text-white">SQUADRE E GRANDI GRUPPI</h4>
            <p class="text-white">Richiedi il GEARXPro B2B</p>
            <x-custom-button :text="'B2B GearXPro'" :icon="'airplain'" :link="'/'" />

            <div class="flex items-end gap-[22px]">
                <a href="">
                    <img src="{{ Vite::asset('resources/images/icons/facebook.svg')}}" alt="">
                </a>
                <a href="">
                    <img src="{{ Vite::asset('resources/images/icons/linkedin.svg')}}" alt="">
                </a>
                <a href="">
                    <img src="{{ Vite::asset('resources/images/icons/youTube.svg')}}" alt="">
                </a>
                <a href="">
                    <img src="{{ Vite::asset('resources/images/icons/instagram.svg')}}" alt="">
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
</div>
