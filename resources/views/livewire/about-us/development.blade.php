<div class="bg-black grid grid-cols-12">
    <div class="col-span-12 h-[calc(100vh-106px)] xl:h-[984px] px-4 xl:p-0 bg-about_us_dev_1_mb xl:bg-about_us_dev_1 bg-contain bg-top bg-no-repeat relative overflow-hidden prod-intro-bg">
        <div class="prod-intro-block w-fit">
            <img class="prod-gearxpro-logo" src="{{ Vite::asset('resources/images/about_us/development/gearxpro-logo.jpg') }}" />
            <h2 class="w-fit xl:w-full z-10 absolute text-2xl xl:text-4xl leading-10 font-bold text-white text-center products-h2">
                Products are designed with professional expertise <br>
                under the watchful eye of professionals <br>
                in the apparel and sportswear industry. <br>
            </h2>
        </div>
    </div>

    <div class="col-span-12 h-[calc(100vh-106px)] xl:h-[1080px] relative bg-about_us_dev_2_mb xl:bg-about_us_dev_2 bg-fixed bg-cover bg-center bg-no-repeat"></div>

    <div class="h-[100vh] px-4 xl:p-0 col-span-12 flex items-center justify-center py-28 xl:py-52">
        <h2 class="text-2xl xl:text-4xl text-center font-medium text-white leading-10 products-h2">
            We constantly invest in our creative areas <br class="hidden xl:block">
            to guarantee increasingly cutting-edge products through the identification <br class="hidden xl:block">
            of unique production techniques, aware of the importance <br class="hidden xl:block">
            of continuous innovation to keep up in a constantly evolving market. <br class="hidden xl:block">
        </h2>
    </div>

    @if ($products->count() > 0)
        <div class="col-span-12 py-20 px-[30px] flex flex-col justify-center items-center">
            <div class="owl-carousel carousel_top mb-10">
                @foreach ($products as $product )
                    <livewire:components.card-product
                        wire:key="prod_{{ $product->id }}"
                        :product="$product"
                        :image="'SOXPro.png'"
                        :availableColors="$productColors[$product->id] ?? []"
                    />
                @endforeach
            </div>
        </div>
    @endif

    <div class="col-span-12 px-4 xl:p-0 h-[calc(100vh-106px)] xl:h-[1080px] bg-about_us_dev_3_mb xl:bg-about_us_dev_3 bg-fixed bg-cover bg-center bg-no-repeat flex items-center justify-center">
        <p class="z-10 text-2xl xl:text-4xl font-medium text-white leading-10  text-center products-p">
            The key to our success is completed by the <br class="hidden xl:block">
            ability to manage and control the entire process <br class="hidden xl:block">
            of creating each new product, <br class="hidden xl:block">
            from the patent to its official release. <br class="hidden xl:block">
        </p>
    </div>

    @if ($products->count() > 0)
        <div class="col-span-12 py-20 px-[30px] flex flex-col justify-center items-center">
            <div class="owl-carousel carousel_bottom mb-10">
                @foreach ($products as $product )
                    <livewire:components.card-product
                        wire:key="prod_{{ $product->id }}"
                        :product="$product"
                        :image="'SOXPro.png'"
                        :availableColors="$productColors[$product->id] ?? []"
                    />
                @endforeach
            </div>
        </div>
    @endif

    <div class="col-span-12 h-[1080px] grid grid-cols-12 grid-rows-6 relative bg-about_us_dev_4_mb xl:bg-about_us_dev_4 bg-fixed bg-cover bg-center bg-no-repeat"></div>
</div>


@push('scripts')
    <script>
        $(document).ready(function(){
            var carousel_top = new $(".carousel_top").owlCarousel({
                items: 3,
                margin: 30,
                loop: true,
                dots: false,
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
                dots: false,
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
