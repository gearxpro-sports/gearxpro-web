@if ($products->count() > 0)
    <div class="w-full xl:h-[1002px] bg-black pt-5 pb-10 xl:pt-[60px] xl:pb-[70px] pl-4 xl:pl-[39px]">
        {{-- TODO: Bestseller => decommentare riga --}}
{{--        <h2 class="text-2xl xl:text-[33px] font-bold leading-[86px] text-white">{{ __('shop.carousel-bottom.title') }}</h2>--}}
        {{-- TODO: Bestseller => eliminare riga --}}
        <h2 class="text-2xl xl:text-[33px] font-bold leading-[86px] text-white">{{ __('supply.recap.table.title') }}</h2>

        <div class="owl-carousel carousel_bottom">
            @foreach ($products as $product)
                <x-card-bottom
                    :product="$product"
                    :colors="$productColors[$product->id] ?? []"
                />
            @endforeach
        </div>

        <div class="mt-[40px] hidden xl:flex gap-5 ">
            <button class="customPrevBtn">
                <x-icons name="round_arrow" />
            </button>
            <button class="customNextBtn">
                <x-icons name="round_arrow_active" />
            </button>
        </div>

    </div>
    @else
    <div></div>
@endif

@push('scripts')
    <script>
        $(document).ready(function(){
            var carousel_bottom = new $(".carousel_bottom").owlCarousel({
                items: 3,
                margin: 30,
                dots: false,
                loop: true,
                autoWidth: true,
                autoplay: false,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                infinite: true,
            });

            $('.customNextBtn').click(function() {
                carousel_bottom.trigger('next.owl.carousel', [2000]);
            })

            $('.customPrevBtn').click(function() {
                carousel_bottom.trigger('prev.owl.carousel', [2000]);
            })
        });
    </script>
@endpush
