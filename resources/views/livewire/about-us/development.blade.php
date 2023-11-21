<div class="bg-black grid grid-cols-12">
    <div class="col-span-12 h-[984px] bg-about_us_dev_1 bg-top bg-no-repeat relative">
        <h2 class="w-full z-10 absolute top-[50%] text-4xl leading-10 font-bold text-white text-center">
            products are designed with professional expertise <br>
            under the watchful eye of professionals <br>
            in the apparel and sportswear industry. <br>
        </h2>
    </div>

    <div class="col-span-12 h-[1080px] relative bg-about_us_dev_2 bg-fixed bg-cover bg-center bg-no-repeat"></div>

    <div class="h-[100vh] col-span-12 flex items-center justify-center py-52">
        <h2 class="text-4xl text-center font-medium text-white leading-10">
            We constantly invest in our creative areas <br>
            to guarantee increasingly cutting-edge products through the identification <br>
            of unique production techniques, aware of the importance <br>
            of continuous innovation to keep up in a constantly evolving market. <br>
        </h2>
    </div>

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

    <div class="col-span-12 h-[1080px] bg-about_us_dev_3 bg-fixed bg-cover bg-center bg-no-repeat flex items-center justify-center">
        <p class="z-10 text-4xl font-medium text-white leading-10  text-center">
            The key to our success is completed by the <br>
            ability to manage and control the entire process <br>
            of creating each new product, <br>
            from the patent to its official release. <br>
        </p>
    </div>

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

    <div class="col-span-12 h-[1080px] grid grid-cols-12 grid-rows-6 relative bg-about_us_dev_4 bg-fixed bg-cover bg-center bg-no-repeat"></div>
</div>


@push('scripts')
    <script>
        $(document).ready(function(){
            var carousel_top = new $(".carousel_top").owlCarousel({
                items: 3,
                margin: 30,
                loop: true,
                dots: false,
                autoWidth: false,
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
                autoWidth: false,
                autoplay: false,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                infinite: true,
            });
        });
    </script>
@endpush
