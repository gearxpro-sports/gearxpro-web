<div class="w-full h-[947px] bg-white pt-[60px] pb-[70px] px-[0px] overflow-hidden pl-[39px]">
    <h2 class="text-[33px] font-bold leading-[86px]">{{ __('shop.carousel-top.title') }}</h2>

    <div class="owl-carousel carousel_top">
        @foreach ($categories as $category )
            <x-card-top title="{{$category['name']}}" description="{{$category['description']}}" image="gear/{{$category['image']}}"/>
        @endforeach
    </div>

</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            var carousel_top = new $(".carousel_top").owlCarousel({
                items: 4,
                margin: 30,
                loop: true,
                autoWidth: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                infinite: true,
            });
        });
    </script>
@endpush
