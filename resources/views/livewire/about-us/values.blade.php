{{-- <div class="grid grid-cols-2 gap-x-7">
    <div class="col-span-2 grid grid-cols-2 grid-rows-6 h-[984px] bg-about_us_values_1 bg-fixed bg-cover bg-center bg-no-repeat relative">
        <div class="absolute top-0 left-0 w-full h-full bg-black/50"></div>
        <h1 class="z-10 col-span-1 row-start-3 pl-32 text-7xl font-bold text-white">I nostri valori sono chiari e presidiano il nostro lavoro.</h1>
    </div>

    <div class="col-span-2 grid grid-cols-2 grid-rows-6 h-[1080px] bg-about_us_values_2 bg-fixed bg-cover bg-center bg-no-repeat relative">
        <div class="absolute top-0 left-0 w-full h-full bg-black/70"></div>

        <div class="col-span-1 row-start-3 row-span-3 flex flex-col justify-between">
            <div class="z-10 px-32">
                <h3 class="text-5xl font-bold text-white mb-3">Unicità</h3>
                <p class="text-xl leading-9 text-white">Apprezziamo la nostra eterogenea forza lavoro. Convinti che l’unicità sia un punto di forza, ci impegniamo a mantenere un clima di lavoro che promuova la crescita ed il benessere dei nostri collaboratori stimolando l’audacia e la creatività.</p>
            </div>
            <div class="z-10 px-32">
                <h3 class="text-5xl font-bold text-white mb-3">Integrità</h3>
                <p class="text-xl leading-9 text-white">Operiamo in modo onesto e trasparente fornendo ai nostri clienti una comunicazione chiara ed accurata sui nostri prodotti e sulle nostre attività produttive.</p>
            </div>
        </div>

        <div class="col-span-1 row-start-3 row-span-3 flex flex-col justify-between">
            <div class="z-10 px-32">
                <h3 class="text-5xl font-bold text-white mb-3">Ambiente</h3>
                <p class="text-xl leading-9 text-white">Apprezziamo la nostra eterogenea forza lavoro. Convinti che l’unicità sia un punto di forza, ci impegniamo a mantenere un clima di lavoro che promuova la crescita ed il benessere dei nostri collaboratori stimolando l’audacia e la creatività.</p>
            </div>
            <div class="z-10 px-32">
                <h3 class="text-5xl font-bold text-white mb-3">Rispetto</h3>
                <p class="text-xl leading-9 text-white">Ci rivolgiamo al mercato con assoluta lealtà tenendo conto della nostra filosofia aziendale che si fonda sul rispetto del prossimo, dai colleghi agli stakeholder.</p>
            </div>
        </div>
    </div>

    <div class="col-span-2 grid grid-cols-2 grid-rows-6 h-[1080px] bg-about_us_values_3 bg-fixed bg-cover bg-center bg-no-repeat relative">
        <div class="absolute top-0 left-0 w-full h-full bg-black/50"></div>
        <h1 class="z-10 col-span-2 row-start-3 px-32 pt-24 text-6xl leading-[76px] font-bold text-white">
            L’unicità, l’integrità, l’ambiente ed il rispetto: sono questi i nostri valori chiari che ispirano la nostra cultura aziendale e che ci aiutano ogni giorno a mantenere alti standard etici, sociali e di qualità in ogni nostra attività.
        </h1>
    </div>
</div> --}}

<div id="pagepiling">
    <div class="section relative grid grid-cols-12 grid-rows-6">
        <div class="absolute top-0 left-0 w-full h-[100vh] bg-about_us_10 bg-center bg-cover bg-no-repeat"></div>

        <div class="z-10 row-start-4 col-start-2 col-span-10 pt-10">
            <h3 class="text-center text-[59px] font-bold leading-[124px] tracking-[0px] text-white mb-3">Uniqueness, Integrity, Environment and Respect.</h3>
            <p class="text-center text-[44px] leading-[1px] tracking-[0px] text-white">Our values are clear and govern our work.</p>
        </div>
    </div>

    @foreach ($slides as $slide )
        <x-slide_values bg_image="{{$slide['image']}}" title="{{$slide['title']}}" text="{{$slide['text']}}" />
    @endforeach
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pagePiling.js/1.5.6/jquery.pagepiling.min.js"
            integrity="sha512-FcXc9c211aHVJEHxoj2fNFeT8+wUESf/4mUDIR7c31ccLF3Y6m+n+Wsoq4dp2sCnEEDVmjhuXX6TfYNJO6AG6A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pagePiling.js/1.5.6/jquery.pagepiling.js"
            integrity="sha512-5d8vqNar4es3c5P8GOy4SzaFJKEIIjDJhoaO/akcn/u+Ynj5gukMF7FgG1AEAPSIDVjEeFh+dpT6j42s6vxCkg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#pagepiling').pagepiling({
                menu: null,
                direction: 'vertical',
                verticalCentered: false,
                sectionsColor: [],
                anchors: [],
                scrollingSpeed: 700,
                easing: 'swing',
                loopBottom: false,
                loopTop: false,
                css3: true,
                navigation: false,
                normalScrollElements: null,
                normalScrollElementTouchThreshold: 5,
                touchSensitivity: 5,
                keyboardScrolling: true,
                sectionSelector: '.section',
                animateAnchor: false,

                //events
                onLeave: function(index, nextIndex, direction){},
                afterLoad: function(anchorLink, index){},
                afterRender: function(){},
            });
        });
    </script>
@endpush
