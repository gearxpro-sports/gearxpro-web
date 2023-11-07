<div class="w-full h-[1002px] bg-black pt-[60px] pb-[70px] pl-[39px]">
    <h2 class="text-[33px] font-bold leading-[86px] text-white">{{ __('shop.carousel-bottom.title') }}</h2>

    <div class="owl-carousel carousel_bottom">
        <x-card-bottom image="Recovery-Long-T_1.svg" title="Recovery" description="Collant Lunghi Di Recupero" color="1" price="55,00"/>
        <x-card-bottom image="Recovery-Long-T_1.svg" title="Recovery" description="Collant Lunghi Di Recupero" color="1" price="55,00"/>
        <x-card-bottom image="Recovery-Long-T_1.svg" title="Recovery" description="Collant Lunghi Di Recupero" color="1" price="55,00"/>
        <x-card-bottom image="Recovery-Long-T_1.svg" title="Recovery" description="Collant Lunghi Di Recupero" color="1" price="55,00"/>
    </div>

    <div class="mt-[40px] flex item gap-5">
        <button class="customPrevBtn">
            <img src="{{ Vite::asset('resources/images/icons/round_arrow.svg')}}" alt="">
        </button>
        <button class="customNextBtn">
            <img src="{{ Vite::asset('resources/images/icons/round_arrow_active.svg')}}" alt="">
        </button>
    </div>

</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            var carousel_bottom = new $(".carousel_bottom").owlCarousel({
                items: 3,
                margin: 30,
                loop: false,
                autoWidth: false,
                autoplay: false,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                infinite: false,
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
