<div class="w-full h-fit bg-color-18181a grid grid-cols-12">

    <div class="col-span-12 h-[984px] grid grid-cols-12 grid-rows-6 relative overflow-hidden">
        <div class="absolute w-full h-full row-span-6 bg-fixed bg-cover bg-center bg-no-repeat"></div>
        <div class="z-10 col-start-2 col-span-5 row-start-2 row-span-4 flex flex-col items-start justify-center gap-9">
            <h1 class="text-7xl text-white font-bold">Just play. Have fun. Enjoy the game.</h1>
            <p class="w-4/5 text-xl text-white">Passion, motivation, and the desire to improve performance are goals that go beyond trophies.</p>
            <x-custom-button :text="__('shop.button.go_shop')" :icon="'double_arrow_right'" :link="'/shop'" />
        </div>
    </div>

    <div class="col-span-12 h-[1080px] grid grid-cols-12 grid-rows-6 relative overflow-hidden">
        <div class="absolute w-full h-full row-span-6 bg-about_us_1 bg-fixed bg-cover bg-center bg-no-repeat"></div>
        <div class="absolute w-full h-full row-span-6 bg-black/60"></div>
        <div class="relative z-10 col-start-2 col-span-10 row-start-3 row-span-4">
            <h2 class="text-6xl text-white font-bold leading-[76px] mb-5">GEARXPro Sports è un marchio produttore di ultramoderni articoli sportivi.</h2>
            <p class="text-xl text-white leading-9">
                Fondata nel febbraio del 2018 da una intuizione geniale dei fratelli Di Leo, Andrea e Cristian, GEARXPro Sports è oggi una realtà internazionale leader nella produzione manifatturiera di prodotti sportivi ultramoderni ed all’avanguardia.
                Un’avventura di successo ispirata da una grande passione per il mondo dello sport e frutto di un’intensa e radicale conoscenza del settore maturata in anni di esperienza sul campo reale.
                L’idea embrionale, evolutasi brillantemente nel corso degli anni, fu quella di pensare ad un concetto di calzatura sportiva moderno capace di garantire protezione massima ed un netto miglioramento della performance all’atleta sportivo. Da qui l’affermazione di una realtà imprenditoriale capace di rispondere alle singole esigenze degli atleti, con una visione in grado di coniugare creatività ed efficienza, unita ad un’alta attenzione alla ricerca di nuove tecniche di produzione e allo sviluppo di linee di prodotto New to the world.
            </p>
        </div>
    </div>

    <div class="col-span-12 h-[1080px] grid grid-cols-12 grid-rows-6 relative">
        <div class="absolute w-full h-full row-span-6 bg-about_us_2 bg-fixed bg-cover bg-center bg-no-repeat"></div>
        <div class="absolute w-full h-full row-span-6 bg-black/60"></div>
        <div class="relative z-10 col-start-2 col-span-10 row-start-4 row-span-3">
            <h2 class="text-6xl text-white font-bold leading-[76px] mb-5">GEARXPro Sports è la concretizzazione di un’idea singolare, italiana, che con costanza, dedizione e passione ha portato alla nascita di una realtà solida e ambiziosa che ha completamente stravolto le regole del gioco.</h2>
            <p class="text-xl text-white leading-9">
                Una crescita esponenziale, resa possibile dalla capacità di immaginare soluzioni visionarie e di sviluppare nuovi prodotti e lavorazioni ad un alto standard qualitativo.
            </p>
        </div>
    </div>

    <div class="col-span-12 h-[1080px] grid grid-cols-12 grid-rows-6 relative">
        <div class="absolute w-full h-full row-span-6 bg-about_us_3 bg-fixed bg-cover bg-center bg-no-repeat"></div>
        <div class="absolute w-full h-full row-span-6 bg-black/60"></div>
        <div class="relative z-10 col-start-2 col-span-10 row-start-3 row-span-4">
            <h2 class="text-6xl text-white font-bold leading-[76px] mb-5">La vision</h2>
            <p class="text-xl text-white leading-9">
                Cuore pulsante dell’essenza del nostro brand è rappresentata dal desiderio di realizzare innovazione nello sport portando l’appassionato ad un livello più avanzato, con la fortissima consapevolezza che chiunque dedichi il suo tempo e la sua vita allo sport debba avere l’opportunità di sentirsi protagonista.
                Crediamo fermamente che ogni atleta, da sempre al centro delle nostre scelte, indipendentemente dal suo livello debba avere la possibilità di godere appieno dell’esperienza sportiva. È per questo che ci impegniamo nella miglioria dell’esperienza sportiva e della performance degli atleti di tutto il mondo attraverso innovazione, qualità e attenzione al dettaglio dei nostri prodotti.
                L’obiettivo perseguito è quello di trascinare l’appassionato sportivo ad un livello più avanzato. Soddisfare le esigenze degli atleti di tutto il mondo, offrendo loro prodotti all’avanguardia di alta qualità capaci di migliorare la performance e l’intera esperienza sportiva. Impegnati a rafforzare assiduamente i nostri marchi per migliorare il posizionamento competitivo della nostra azienda.
            </p>
        </div>
    </div>

    {{-- year --}}
    <x-about-us.year height="h-[1080px]" bg_image="bg-about_us_4" year="2018">
        <div class="z-20 w-fit absolute top-56 left-9 flex flex-col gap-5">
            <img class="w-fit" src="{{ Vite::asset('resources/images/logo_soxpro.png')}}" alt="">
        </div>

        <div class="z-20 w-fit absolute top-[300px] left-[600px] flex gap-5 opacity-0 transition-all duration-700">
            <x-about-us.icon-product width="w-32" border_color="border-color-bfd8ed" color_1="bg-color-bfd8ed" color_2="bg-color-71a3cf" color_3="bg-color-2271b5" />
            <h3 class="text-3xl font-semibold text-white">classic</h3>
        </div>

        <div class="z-20 w-fit absolute top-[430px] right-[180px] flex gap-5 opacity-0 transition-all duration-700">
            <x-about-us.icon-product width="w-32" border_color="border-color-bfd8ed" color_1="bg-color-bfd8ed" color_2="bg-color-71a3cf" color_3="bg-color-2271b5" />
            <h3 class="text-3xl font-semibold text-white">Low Cut</h3>
        </div>
    </x-about-us.year>

    <x-about-us.year height="h-[1080px]" bg_image="bg-about_us_5" year="2019">
        <div class="z-20 w-fit absolute top-56 left-9 flex flex-col gap-5">
            <img class="w-fit" src="{{ Vite::asset('resources/images/logo_lacexpro.png')}}" alt="">
            <img class="w-fit" src="{{ Vite::asset('resources/images/logo_tubexpro.png')}}" alt="">
        </div>

        <div class="z-20 w-fit absolute top-[350px] left-[750px] flex gap-5 opacity-0 transition-all duration-700">
            <x-about-us.icon-product width="w-16" border_color="border-color-deb79f" color_1="bg-color-deb79f" color_2="bg-color-e7a072" color_3="bg-color-d76f2d" />
            <h3 class="text-3xl font-semibold text-white">LACEXPro</h3>
        </div>

        <div class="z-20 w-fit absolute bottom-[350px] right-[600px] flex gap-5 opacity-0 transition-all duration-700">
            <h3 class="text-3xl font-semibold text-white">TUBEXPro</h3>
            <x-about-us.icon-product width="w-32" border_color="border-color-b8b2d9" color_1="bg-color-b8b2d9" color_2="bg-color-9d97b7" color_3="bg-color-766bad" left="false" />
        </div>
    </x-about-us.year>

    <x-about-us.year height="h-[1080px]" bg_image="bg-about_us_6" year="2020">
        <div class="z-20 w-fit absolute top-56 left-9 flex flex-col gap-5">
            <img class="w-fit" src="{{ Vite::asset('resources/images/logo_gearxpro.png')}}" alt="">
            <img class="w-fit" src="{{ Vite::asset('resources/images/logo_flex-gxpro.png')}}" alt="">
        </div>

        <div class="z-20 w-fit absolute bottom-[450px] left-[480px] flex gap-5 opacity-0 transition-all duration-700">
            <h3 class="text-3xl font-semibold text-white">SOXPro <br/> Recovery</h3>
            <x-about-us.icon-product width="w-24" border_color="border-color-9a9fa7" color_1="bg-color-9a9fa7" color_2="bg-color-5a6472" color_3="bg-color-323a46" left="false" />
        </div>

        <div class="z-20 w-fit absolute top-[350px] right-[670px] flex gap-5 opacity-0 transition-all duration-700">
            <h3 class="text-3xl font-semibold text-white">FLEX-GXPro</h3>
            <x-about-us.icon-product width="w-16" border_color="border-color-bde2b6" color_1="bg-color-bde2b6" color_2="bg-color-89d079" color_3="bg-color-65af54" left="false" />
        </div>
    </x-about-us.year>

    <x-about-us.year height="h-[1080px]" bg_image="bg-about_us_7" year="2021">
        <div class="z-20 w-fit absolute top-56 left-9 flex flex-col gap-5">
            <img class="w-fit" src="{{ Vite::asset('resources/images/logo_soxpro.png')}}" alt="">
            <img class="w-fit" src="{{ Vite::asset('resources/images/logo_quality.png')}}" alt="">
        </div>

        <div class="z-20 w-fit absolute top-[300px] left-[600px] flex items-start gap-5 opacity-0 transition-all duration-700">
            <x-about-us.icon-product width="w-32" border_color="border-color-bfd8ed" color_1="bg-color-bfd8ed" color_2="bg-color-71a3cf" color_3="bg-color-2271b5" />
            <div>
                <h3 class="text-3xl font-semibold text-white mb-2">Ultra Light</h3>
                <h5 class="text-sm font-semibold text-white uppercase mb-1">PLUS X AWARD 2021</h5>
                <p class="text-sm text-white max-w-[366px]">
                    The biggest and most prestigious award in the world dedicated to innovation in the technological ﬁeld, for sport and lifestyle. SOXPro obtained this prestigious recognition in the High Quality, Functionality and Ergonomics categories, thus certifying the quality of unique products on the market.
                </p>
            </div>
        </div>

        <div class="z-20 w-fit absolute top-[450px] right-[220px] flex gap-5 opacity-0 transition-all duration-700">
            <x-about-us.icon-product width="w-28" border_color="border-color-bfd8ed" color_1="bg-color-bfd8ed" color_2="bg-color-71a3cf" color_3="bg-color-2271b5" />
            <h3 class="text-3xl font-semibold text-white">Sprint</h3>
        </div>
    </x-about-us.year>

    <x-about-us.year height="h-[1080px]" bg_image="bg-about_us_8" year="2022">
        <div class="z-20 w-fit absolute top-56 left-9 flex flex-col gap-5">
            <img class="w-fit" src="{{ Vite::asset('resources/images/logo_soxpro.png')}}" alt="">
            <img class="w-fit" src="{{ Vite::asset('resources/images/logo_geraxpro_recovery.png')}}" alt="">
        </div>

        <div class="z-20 w-fit absolute bottom-[100px] left-[480px] flex gap-5 opacity-0 transition-all duration-700">
            <x-about-us.icon-product width="w-32" border_color="border-color-bfd8ed" color_1="bg-color-bfd8ed" color_2="bg-color-71a3cf" color_3="bg-color-2271b5" />
            <h3 class="text-3xl font-semibold text-white">SOXPro <br/> Ankle Support</h3>
        </div>

        <div class="z-20 w-fit absolute top-[250px] right-[550px] flex gap-5 opacity-0 transition-all duration-700">
            <x-about-us.icon-product width="w-28" border_color="border-color-bfd8ed" color_1="bg-color-bfd8ed" color_2="bg-color-71a3cf" color_3="bg-color-2271b5" />
            <h3 class="text-3xl font-semibold text-white">GEARXPro <br/> Recovery</h3>
        </div>


        <div class="z-20 w-fit absolute bottom-[250px] right-[370px] flex gap-5 opacity-0 transition-all duration-700">
            <h3 class="text-3xl font-semibold text-white">SOXPro <br/> Fast Break</h3>
            <x-about-us.icon-product width="w-14" border_color="border-color-bfd8ed" color_1="bg-color-bfd8ed" color_2="bg-color-71a3cf" color_3="bg-color-2271b5" left="false" />
        </div>
    </x-about-us.year>

    <x-about-us.year height="h-[1178px]" bg_image="bg-about_us_9" year="2023">
        <div class="z-20 w-fit absolute top-56 left-9 flex flex-col gap-5">
            <img class="w-fit" src="{{ Vite::asset('resources/images/logo_soxpro.png')}}" alt="">
        </div>

        <div class="z-20 w-fit absolute top-[530px] left-[400px] flex gap-5 opacity-0 transition-all duration-700">
            <x-about-us.icon-product width="w-20" border_color="border-color-bfd8ed" color_1="bg-color-bfd8ed" color_2="bg-color-71a3cf" color_3="bg-color-2271b5" />
            <h3 class="text-3xl font-semibold text-white">Five Toe</h3>
        </div>

        <div class="z-20 w-fit absolute top-[470px] right-[750px] flex gap-5 opacity-0 transition-all duration-700">
            <x-about-us.icon-product width="w-32" border_color="border-color-bfd8ed" color_1="bg-color-bfd8ed" color_2="bg-color-71a3cf" color_3="bg-color-2271b5" />
            <h3 class="text-3xl font-semibold text-white">Trekking</h3>
        </div>


        <div class="z-20 w-fit absolute top-[250px] right-[400px] flex gap-5 opacity-0 transition-all duration-700">
            <h3 class="text-3xl font-semibold text-white">Compression</h3>
            <x-about-us.icon-product width="w-32" border_color="border-color-bfd8ed" color_1="bg-color-bfd8ed" color_2="bg-color-71a3cf" color_3="bg-color-2271b5" left="false" />
        </div>
    </x-about-us.year>

    <div class="col-span-12 flex justify-center h-32">
        <x-custom-button :text="__('shop.button.show_line')" :icon="'double_arrow_right'" :link="'/shop'" />
    </div>
</div>

@push('scripts')
    <script>
        var scrollPosition = window.scrollY;
        var sectionContainer = document.getElementsByClassName('section');

        window.addEventListener('scroll', function() {
            scrollPosition = window.scrollY;

            // 2018
            if (scrollPosition >= 4320) {
                sectionContainer[0].childNodes[1].classList.add('!sticky')
                sectionContainer[0].childNodes[3].childNodes[1].classList.add('!sticky')

                sectionContainer[0].childNodes[3].childNodes[3].classList.add("!opacity-100", "translate-x-10")
                sectionContainer[0].childNodes[3].childNodes[5].classList.add("!opacity-100", "translate-x-10")
            } else {
                sectionContainer[0].childNodes[1].classList.remove('!sticky')
                sectionContainer[0].childNodes[3].childNodes[1].classList.remove('!sticky')

                sectionContainer[0].childNodes[3].childNodes[3].classList.remove("!opacity-100", "translate-x-10")
                sectionContainer[0].childNodes[3].childNodes[5].classList.remove("!opacity-100", "translate-x-10")
            }
            // 2019
            if (scrollPosition >= 5400) {
                sectionContainer[1].childNodes[1].classList.add('!sticky')
                sectionContainer[1].childNodes[3].childNodes[1].classList.add('!sticky')
                sectionContainer[0].childNodes[1].classList.add('hidden')

                sectionContainer[1].childNodes[3].childNodes[3].classList.add("!opacity-100", "translate-x-10")
                sectionContainer[1].childNodes[3].childNodes[5].classList.add("!opacity-100", "translate-x-[-40px]")
            } else {
                sectionContainer[1].childNodes[1].classList.remove('!sticky')
                sectionContainer[1].childNodes[3].childNodes[1].classList.remove('!sticky')
                sectionContainer[0].childNodes[1].classList.remove('hidden')

                sectionContainer[1].childNodes[3].childNodes[3].classList.remove("!opacity-100", "translate-x-10")
                sectionContainer[1].childNodes[3].childNodes[5].classList.remove("!opacity-100", "translate-x-[-40px]")
            }
            // 2020
            if (scrollPosition >= 6480) {
                sectionContainer[2].childNodes[1].classList.add('!sticky')
                sectionContainer[2].childNodes[3].childNodes[1].classList.add('!sticky')
                sectionContainer[1].childNodes[1].classList.add('hidden')

                sectionContainer[2].childNodes[3].childNodes[3].classList.add("!opacity-100", "translate-x-[-40px]")
                sectionContainer[2].childNodes[3].childNodes[5].classList.add("!opacity-100", "translate-x-[-40px]")
            } else {
                sectionContainer[2].childNodes[1].classList.remove('!sticky')
                sectionContainer[2].childNodes[3].childNodes[1].classList.remove('!sticky')
                sectionContainer[1].childNodes[1].classList.remove('hidden')

                sectionContainer[2].childNodes[3].childNodes[3].classList.remove("!opacity-100", "translate-x-[-40px]")
                sectionContainer[2].childNodes[3].childNodes[5].classList.remove("!opacity-100", "translate-x-[-40px]")
            }
            // 2021
            if (scrollPosition >= 7560) {
                sectionContainer[3].childNodes[1].classList.add('!sticky')
                sectionContainer[3].childNodes[3].childNodes[1].classList.add('!sticky')
                sectionContainer[2].childNodes[1].classList.add('hidden')

                sectionContainer[3].childNodes[3].childNodes[3].classList.add("!opacity-100", "translate-x-10")
                sectionContainer[3].childNodes[3].childNodes[5].classList.add("!opacity-100", "translate-x-10")
            } else {
                sectionContainer[3].childNodes[1].classList.remove('!sticky')
                sectionContainer[3].childNodes[3].childNodes[1].classList.remove('!sticky')
                sectionContainer[2].childNodes[1].classList.remove('hidden')

                sectionContainer[3].childNodes[3].childNodes[3].classList.remove("!opacity-100", "translate-x-10")
                sectionContainer[3].childNodes[3].childNodes[5].classList.remove("!opacity-100", "translate-x-10")
            }
            // 2022
            if (scrollPosition >= 8640) {
                sectionContainer[4].childNodes[1].classList.add('!sticky')
                sectionContainer[4].childNodes[3].childNodes[1].classList.add('!sticky')
                sectionContainer[3].childNodes[1].classList.add('hidden')

                sectionContainer[4].childNodes[3].childNodes[3].classList.add("!opacity-100", "translate-x-10")
                sectionContainer[4].childNodes[3].childNodes[5].classList.add("!opacity-100", "translate-x-10")
                sectionContainer[4].childNodes[3].childNodes[7].classList.add("!opacity-100", "translate-x-10")
            } else {
                sectionContainer[4].childNodes[1].classList.remove('!sticky')
                sectionContainer[4].childNodes[3].childNodes[1].classList.remove('!sticky')
                sectionContainer[3].childNodes[1].classList.remove('hidden')

                sectionContainer[4].childNodes[3].childNodes[3].classList.remove("!opacity-100", "translate-x-10")
                sectionContainer[4].childNodes[3].childNodes[5].classList.remove("!opacity-100", "translate-x-10")
                sectionContainer[4].childNodes[3].childNodes[7].classList.remove("!opacity-100", "translate-x-10")
            }
            // 2023
            if (scrollPosition >= 9720) {
                sectionContainer[5].childNodes[1].classList.add('!sticky')
                sectionContainer[5].childNodes[3].childNodes[1].classList.add('!sticky')
                sectionContainer[4].childNodes[1].classList.add('hidden')

                sectionContainer[5].childNodes[3].childNodes[3].classList.add("!opacity-100", "translate-x-10")
                sectionContainer[5].childNodes[3].childNodes[5].classList.add("!opacity-100", "translate-x-10")
                sectionContainer[5].childNodes[3].childNodes[7].classList.add("!opacity-100", "translate-x-[-40px]")
            } else {
                sectionContainer[5].childNodes[1].classList.remove('!sticky')
                sectionContainer[5].childNodes[3].childNodes[1].classList.remove('!sticky')
                sectionContainer[4].childNodes[1].classList.remove('hidden')

                sectionContainer[5].childNodes[3].childNodes[3].classList.remove("!opacity-100", "translate-x-10")
                sectionContainer[5].childNodes[3].childNodes[5].classList.remove("!opacity-100", "translate-x-10")
                sectionContainer[5].childNodes[3].childNodes[7].classList.remove("!opacity-100", "translate-x-[-40px]")
            }
        });
    </script>
@endpush

