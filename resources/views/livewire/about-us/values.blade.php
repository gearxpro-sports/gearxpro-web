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

<div class="z-10 relative w-full h-[100vh] overflow-y-auto">
    <div class="bg-about_us_10 invisible"></div>
    <div class="bg-about_us_11 invisible"></div>
    <div class="bg-about_us_12 invisible"></div>
    <div class="bg-about_us_13 invisible"></div>
    <div class="bg-about_us_14 invisible"></div>

    <div class="bg-about_us_10_mb invisible"></div>
    <div class="bg-about_us_11_mb invisible"></div>
    <div class="bg-about_us_12_mb invisible"></div>
    <div class="bg-about_us_13_mb invisible"></div>
    <div class="bg-about_us_14_mb invisible"></div>

    <div id="pagepiling">
        <div class="section relative grid grid-cols-12 grid-rows-6 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-[100vh] bg-about_us_10_mb xl:bg-about_us_10 bg-center bg-cover bg-no-repeat"></div>

            <div class="z-10 row-start-2 xl:row-start-4 col-start-2 col-span-10 pt-14 xl:pt-10">
                <h3 class="text-center text-2xl xl:text-[59px] font-bold leading-10 xl:leading-[124px] tracking-[0px] text-white mb-3">Uniqueness, Integrity, Environment and Respect.</h3>
                <p class="text-center text-lg xl:text-[44px] xl:leading-[1px] tracking-[0px] text-white">Our values are clear and govern our work.</p>
            </div>
        </div>

        @foreach ($slides as $slide )
            <x-slide_values bg_image="{{$slide['image']}}" title="{{$slide['title']}}" text="{{$slide['text']}}" />
        @endforeach

        {{-- <div class="section relative grid grid-cols-12 grid-rows-6">
            <div @class(["absolute top-0 left-0 w-full h-[100vh] bg-center bg-cover bg-no-repeat bg-about_us_11_mb xl:bg-about_us_11"])></div>

            <div class="z-10 col-span-12 xl:col-span-6 row-span-6 px-4 xl:pl-[92px] xl:pt-[13px] overflow-hidden">
                <h3 style="word-spacing: 100vw" class="text-[120px] xl:text-[285px] font-extrabold leading-[111px] xl:leading-[227px]  tracking-[-3px] uppercase text-white mb-5">uni que ness</h3>
                <p class="xl:pl-5 text-xl xl:text-[29px] font-medium leading-[35px] tracking-[2px] text-white">
                    We value our diverse workforce.
                    Convinced that uniqueness is a strength,
                    we strive to maintaining a working climate
                    that promotes the growth and well-being
                    of our employees by stimulating
                    boldness and creativity.
                </p>
            </div>
        </div>

        <div class="section relative grid grid-cols-12 grid-rows-6">
            <div @class(["absolute top-0 left-0 w-full h-[100vh] bg-center bg-cover bg-no-repeat bg-about_us_12_mb xl:bg-about_us_12"])></div>

            <div class="action z-10 col-span-12 xl:col-span-6 row-span-6 px-4 xl:pl-[92px] xl:pt-[13px] overflow-hidden">
                <h3 style="word-spacing: 100vw" class="text-[120px] xl:text-[285px] font-extrabold leading-[111px] xl:leading-[227px]  tracking-[-3px] uppercase text-white mb-5">int egr ity</h3>
                <p class="xl:pl-5 text-xl xl:text-[29px] font-medium leading-[35px] tracking-[2px] text-white">
                    We operate in an honestly and transparently
                    by providing our customers with clear
                    and accurate communication about our
                    products and manufacturing activities.
                </p>
            </div>
        </div>

        <div class="section relative grid grid-cols-12 grid-rows-6">
            <div @class(["absolute top-0 left-0 w-full h-[100vh] bg-center bg-cover bg-no-repeat bg-about_us_13_mb xl:bg-about_us_13"])></div>

            <div class="action z-10 col-span-12 xl:col-span-6 row-span-6 px-4 xl:pl-[92px] xl:pt-[13px] overflow-hidden">
                <h3 style="word-spacing: 100vw" class="text-[120px] xl:text-[285px] font-extrabold leading-[111px] xl:leading-[227px]  tracking-[-3px] uppercase text-white mb-5">envi ron ment</h3>
                <p class="xl:pl-5 text-xl xl:text-[29px] font-medium leading-[35px] tracking-[2px] text-white">
                    We are staunch allies of environmenta sustainability,
                    in line with the goalsd the 2030 Agenda promoted
                    by the UN
                    We promote sustainable production models that
                    adopt the best possible practicesfor Waste reduction
                    and respec€for the environment.
                </p>
            </div>
        </div>

        <div class="section relative grid grid-cols-12 grid-rows-6">
            <div @class(["absolute top-0 left-0 w-full h-[100vh] bg-center bg-cover bg-no-repeat bg-about_us_14_mb xl:bg-about_us_14"])></div>

            <div class="action z-10 col-span-12 xl:col-span-6 row-span-6 px-4 xl:pl-[92px] xl:pt-[13px] overflow-hidden">
                <h3 style="word-spacing: 100vw" class="text-[120px] xl:text-[285px] font-extrabold leading-[111px] xl:leading-[227px]  tracking-[-3px] uppercase text-white mb-5">re spe ct</h3>
                <p class="xl:pl-5 text-xl xl:text-[29px] font-medium leading-[35px] tracking-[2px] text-white">
                    We approach the market with
                    absolute loyalty, taking into
                    account our corporate philosophy
                    which is based on respect for others,
                    from colleagues to stakeholders.
                </p>
            </div>
        </div> --}}
    </div>
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

    <script>
        var action = document.getElementsByClassName('action');

        window.onscroll = function(e) {
            if (this.oldScroll > this.scrollY) {
                for (let i = 0; i < action.length; i++) {
                    action[i].classList.remove("pt-[135px]", "xl:pt-[50px]");
                }
            } else {
                for (let i = 0; i < action.length; i++) {
                    action[i].classList.add("pt-[135px]", "xl:pt-[50px]");
                }
            }
            this.oldScroll = this.scrollY;
        }
    </script>
@endpush
