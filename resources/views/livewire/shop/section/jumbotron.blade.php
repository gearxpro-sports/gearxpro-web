<div class="bg-black relative">

    {{-- <div class="bg-black w-full h-[984px] grid grid-cols-12 grid-rows-6 gap-[30px]">
        <div class=" h-fit col-start-2 col-span-6 row-start-2">
            <h1 class="text-[73px] font-bold text-white leading-[86px] m-0 p-0">{{ __('shop.jumbotron.title') }}</h1>
            <p class="text-[21px] text-white w-2/3 my-[40px]">{{ __('shop.jumbotron.description') }}</p>
            <x-custom-button :text="__('shop.jumbotron.button')" :icon="'double_arrow_right'" :link="'/shop'" />
        </div>
    </div> --}}

    <div>
        <div class="customPrevBtn w-10 h-10 invert hover:translate-x-[-15px] duration-300 transition-all absolute left-9 top-[calc(50%-97px)] z-10">
            <x-icons name="chevron-left" class="w-full h-full" />
        </div>

        <div class="owl-carousel carousel_jumbotron">
            @foreach ($slides as $slide )
                <img src="{{ Vite::asset('resources/images/gear/'.$slide)}}" alt="">
            @endforeach
        </div>

        <button class="customNextBtn w-10 h-10 invert hover:translate-x-[15px] duration-300 transition-all absolute top-[calc(50%-97px)] right-9 z-10">
            <x-icons name="chevron-right" class="w-full h-full" />
        </button>
    </div>



    {{-- <div class="hidden md:block col-start-1 col-span-12 row-start-1 row-span-6 w-full h-full bg-black overflow-hidden">
        <video class="w-full scale-125" autoplay loop muted src="{{ Vite::asset('resources/videos/12_SOXPro.mp4')}}"></video>
    </div> --}}

</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            var carousel_jumbotron = new $(".carousel_jumbotron").owlCarousel({
                animateOut: 'slideOutLeft',
                animateIn: 'fadeIn',
                smartSpeed:1200,
                items: 1,
                margin: 0,
                loop: true,
                autoWidth: true,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplaySpeed: 3000,
                autoplayHoverPause: true,
                infinite: true,
            });

            $('.customNextBtn').click(function() {
                carousel_jumbotron.trigger('next.owl.carousel', [2000]);
            })

            $('.customPrevBtn').click(function() {
                carousel_jumbotron.trigger('prev.owl.carousel', [2000]);
            })
        });
    </script>
@endpush

