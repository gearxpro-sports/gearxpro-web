<div class="bg-black relative overflow-hidden">

    <div class="relative w-full h-[667px] px-4 pt-11 bg-texture grid grid-cols-4 gap-[10px] xl:hidden">
        <div class="h-fit col-start-1 col-span-4 z-10">
            <h1 class="text-[30px] font-bold text-white leading-[40px] m-0 p-0">{{ __('shop.jumbotron.title') }}</h1>
            <p class="text-[14px] text-white mt-[20px]">{{ __('shop.jumbotron.description') }}</p>
        </div>

        <img class="col-span-4 absolute right-[-50px] bottom-20 scale-110" src="{{Vite::asset('resources/images/prodotto_slider.png')}}" alt="">

        <div class="col-start-1 col-span-4 pt-20 z-10">
            <x-custom-button :text="__('shop.jumbotron.button')" :icon="'double_arrow_right'" :link="'/shop'" width="w-full" />
        </div>
    </div>

    <div class="hidden xl:block">
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
                items: 1,
                margin: 0,
                loop: true,
                autoWidth: false,
                autoplay: true,
                autoplayTimeout: 8000,
                autoplayHoverPause: false,
                infinite: true,
                touchDrag  : false,
                mouseDrag  : false
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

