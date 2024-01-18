<div>
    <div class="bg-black py-10 text-3xl text-white font-extrabold text-center sm:text-5xl">
        ABMASSADORS
    </div>
    <div class="bg-white">
        <div class="owl-carousel ambassadors_carousel">
            @foreach ($ambassadors as $ambassador)
                <a href="{{ $ambassador['url'] }}" target="_blank" class="group relative flex justify-center bg-red-200 h-[760px] w-full bg-cover" style="background-image: url('{{ Vite::asset('resources/images/about_us/partnership/ambassadors/' . $ambassador['image'])}}')">
                    <div class="absolute inset-0 transition-all group-hover:bg-black/20"></div>
                    <p class="absolute bottom-5 text-xl text-white uppercase tracking-tight transition-all group-hover:bottom-8">
                        <span>{{ $ambassador['firstname'] }}</span>
                        <span class="font-extrabold">{{ $ambassador['lastname'] }}</span>
                    </p>
                </a>
            @endforeach
        </div>
    </div>
    <div class="bg-white py-36 px-4">
        <div class="mx-auto text-center">
            <h3 class="text-3xl md:text-4xl font-bold uppercase mb-8">Uniti nell'eccellenza, leader nel gioco.</h3>
            <p class="text-lg md:text-2xl">
                Le nostre collaborazioni brillano nel mosaico dei nostri successi.<br>
                Attraverso una rete selezionata di club e ambasciatori,<br>
                intrecciamo la nostra qualità a storie di spicco.<br>
                Qui, ogni atleta scopre il palcoscenico ideale per manifestare il suo genio.
            </p>
        </div>
    </div>
    <div class="bg-black py-10 text-3xl text-white font-extrabold text-center sm:text-5xl">
        PARTNERSHIPS
    </div>
    <div class="bg-white">
        <div class="mx-auto">
            <div class="grid grid-cols-2 gap-0.5 overflow-hidden sm:mx-0 sm:rounded-2xl lg:grid-cols-4">
                @foreach($partnerships as $partnership)
                    <a href="{{ $partnership['url'] }}" target="_blank" class="flex flex-col items-center p-4 hover:bg-gray-50">
                        <img class="aspect-square h-32 w-full object-contain shrink-0"
                             src="{{ Vite::asset('resources/images/about_us/partnership/logos/' . $partnership['image'])}}"
                             alt="{{ $partnership['title'] }}">
                        <span class="text-sm mt-2 text-center font-bold uppercase md:text-base">{{ $partnership['title'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-black py-10 text-4xl text-white font-titling text-center sm:text-5xl md:text-7xl">
        ENGINEERED BY ATHLETES FOR ATHLETES
    </div>
    <div class="relative w-full overflow-hidden sm:h-auto">
        <video class="w-full" autoplay loop muted
               src="{{ Vite::asset('resources/videos/GEARXPro_Recovery_V2_OFFICIAL.mp4')}}"></video>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            let ambassadors_carousel = new $(".ambassadors_carousel").owlCarousel({
                margin: 0,
                dots: false,
                loop: true,
                autoWidth: false,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                infinite: true,
                responsive : {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1440: {
                        items: 3
                    }
                }
            });
        });
    </script>
@endpush
