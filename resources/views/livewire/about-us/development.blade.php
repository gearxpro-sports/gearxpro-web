<div class="bg-black grid grid-cols-12">
    <div class="col-span-12 h-[984px] grid grid-cols-12 grid-rows-6 bg-about_us_dev_1 relative">
        <div class="absolute top-0 left-0 w-full h-full bg-black/50"></div>
        <h1 class="z-10 text-7xl font-bold text-white leading-[86px] col-start-2 col-span-5 row-start-3 row-span-3">Consectetur adipiscing elit sed do eiusmod tempor</h1>
    </div>

    <div class="col-start-2 col-span-10 flex items-center py-52">
        <h2 class="text-6xl font-bold text-white leading-[76px]">I prodotti di GEARXPro Sports sono disegnati con competenza professionale sotto l’occhio attento di professionisti del settore abbigliamento e sportivo.</h2>
    </div>

    <div class="col-span-12 h-[1080px] relative bg-about_us_dev_2">
        <div class="absolute top-0 left-0 w-full h-full bg-black/50"></div>
    </div>

    <div class="col-span-12 h-[1080px] grid grid-cols-12 grid-rows-6 relative bg-about_us_dev_3">
        <div class="absolute top-0 left-0 w-full h-full bg-black/70"></div>
        <p class="z-10 text-[43px] font-bold text-white leading-[56px] col-start-2 col-span-10 row-start-4 row-span-2">
            Investiamo con costanza nelle nostre aree creative per garantire prodotti sempre più all’avanguardia attraverso l’individuazione di tecniche di produzione singolari, consapevoli dell’importanza della continua innovazione per stare al passo in un mercato in continua evoluzione.
        </p>
    </div>

    <div class="col-span-12 py-20 px-[30px] flex flex-col justify-center items-center">
        <div class="owl-carousel carousel_top mb-10">
            <livewire:components.card-product
                :slug="'SOXPro'"
                :image="'SOXPro.png'"
                :name="'SOXPro'"
                :description="'SOXPro Ultra Light - White'"
                :availableColor="5"
                :price="'34.90'"
            />
            <livewire:components.card-product
                :slug="'SOXPro'"
                :image="'SOXPro.png'"
                :name="'SOXPro'"
                :description="'SOXPro Ultra Light - White'"
                :availableColor="5"
                :price="'34.90'"
            />
            <livewire:components.card-product
                :slug="'SOXPro'"
                :image="'SOXPro.png'"
                :name="'SOXPro'"
                :description="'SOXPro Ultra Light - White'"
                :availableColor="5"
                :price="'34.90'"
            />
        </div>

        <x-custom-button :text="__('shop.button.all_products')" :icon="'double_arrow_right'" :link="'/shop'" />
    </div>

    <div class="col-span-12 h-[1080px] grid grid-cols-12 grid-rows-6 relative bg-about_us_dev_4">
        <div class="absolute top-0 left-0 w-full h-full bg-black/70"></div>
        <p class="z-10 text-[43px] font-bold text-white leading-[56px] col-start-2 col-span-10 row-start-5 row-span-2">
            La chiave del nostro successo si completa con la capacità di gestione e controllo dell’intero processo di realizzazione di ogni nuovo prodotto, dal brevetto al suo rilascio ufficiale.
        </p>
    </div>

    <div class="col-span-12 py-20 px-[30px] flex flex-col justify-center items-center">
        <div class="owl-carousel carousel_bottom mb-10">
            <livewire:components.card-product
                :slug="'SOXPro'"
                :image="'SOXPro.png'"
                :name="'SOXPro'"
                :description="'SOXPro Ultra Light - White'"
                :availableColor="5"
                :price="'34.90'"
            />
            <livewire:components.card-product
                :slug="'SOXPro'"
                :image="'SOXPro.png'"
                :name="'SOXPro'"
                :description="'SOXPro Ultra Light - White'"
                :availableColor="5"
                :price="'34.90'"
            />
            <livewire:components.card-product
                :slug="'SOXPro'"
                :image="'SOXPro.png'"
                :name="'SOXPro'"
                :description="'SOXPro Ultra Light - White'"
                :availableColor="5"
                :price="'34.90'"
            />
        </div>

        <x-custom-button :text="__('shop.button.show_last')" :icon="'double_arrow_right'" :link="'/shop'" />
    </div>

    <div class="col-span-12 h-[1080px] grid grid-cols-12 relative">
        <div class="absolute top-0 left-0 w-full h-full bg-black/50"></div>
        <div class="col-span-6 h-full bg-about_us_dev_5"></div>
        <div class="col-span-6 h-full bg-about_us_dev_6"></div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function(){
            var carousel_top = new $(".carousel_top").owlCarousel({
                items: 3,
                margin: 30,
                loop: true,
                autoWidth: true,
                autoplay: false,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                infinite: true,
            });

            var carousel_bottom = new $(".carousel_bottom").owlCarousel({
                items: 3,
                margin: 30,
                loop: true,
                autoWidth: true,
                autoplay: false,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                infinite: true,
            });
        });
    </script>
@endpush
