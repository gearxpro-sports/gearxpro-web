<div class="bg-color-f2f0eb">
    <div class="p-[39px] grid grid-cols-12 gap-[30px]">
        {{-- image --}}
        <div class="col-span-7 h-[1104px] overflow-y-auto scrollBar flex flex-col gap-4 pb-4">
            @if ($selectedLength == 1)
                {{-- Corto --}}
                <img src="{{ Vite::asset('resources/images/SOXPro-1.png')}}" alt="">
                <img src="{{ Vite::asset('resources/images/SOXPro-2.png')}}" alt="">
                <img src="{{ Vite::asset('resources/images/SOXPro-3.png')}}" alt="">
            @else
                <img src="{{ Vite::asset('resources/images/SOXPro-1-long.png')}}" alt="">
                <img src="{{ Vite::asset('resources/images/SOXPro-2-long.png')}}" alt="">
            @endif
        </div>

        {{-- options --}}
        <div class="col-span-5 col-start-8 py-10">
            {{-- detail --}}
            <div>
                {{--                <span class="text-[17px] leading-[28px] text-color-6c757d">{{$product->name}}</span>--}}
                <h1 class="text-[33px] font-semibold leading-[40px] text-color-18181a">{{$product->name}}</h1>
                <p class="text-[21px] font-medium leading-[38px] text-color-18181a">@money($product->price)</p>
            </div>

            @if($selectedLength || $selectedColor || $selectedSize)
                <x-primary-button type="button" wire:click="resetAll()" class="mt-10">Resetta selezione</x-primary-button>
            @endif

            <div class="w-full max-w-md mt-10 space-y-10">
                @if($allLengths)
                    <div wire:key="lengths" class="space-y-5">
                        <p class="text-sm font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.products.height_leg')}}</p>
                        <div>
                            <div
                                class="grid grid-cols-2 gap-x-1 rounded-md p-1 text-center text-xs font-semibold leading-5 ring-1 ring-inset ring-gray-200 bg-color-edebe5">
                                @foreach($allLengths as $id => $length)
                                    @if(in_array($id, array_keys($lengths)))
                                        <div
                                            wire:key="length-{{$id}}"
                                            wire:click="setLength({{ $id }})"
                                            @class([
                                            'cursor-pointer h-14 text-sm flex items-center justify-center rounded-md px-2.5 py-1',
                                            $selectedLength == $length['id'] ? 'bg-color-18181a text-white' : 'text-color-6c757d'])
                                        >
                                            <span>{{ $length['value'] }}</span>
                                        </div>
                                    @else
                                    <div
                                        wire:key="length-{{$id}}"
                                        wire:click="resetAll('length', {{ $id }})"
                                        @class([
                                        'opacity-10 pointer-events-none h-14 text-sm flex items-center justify-center rounded-md px-2.5 py-1',
                                        $selectedLength == $length['id'] ? 'bg-color-18181a text-white' : 'text-color-6c757d'])
                                    >
                                        <span>{{ $length['value'] }}</span>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if($allColors)
                    <div wire:key="colors" class="space-y-5">
                        <p class="text-sm font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.products.color')}}</p>
                        <div>
                            <div class="flex flex-wrap items-center gap-4">
                                @foreach($allColors as $id => $color)
                                    @if(in_array($id, array_keys($colors)))
                                        <div
                                            wire:key="color-{{$id}}"
                                            wire:click="setColor({{ $color['id'] }})"
                                            @class([
                                                'flex-shrink-0 cursor-pointer h-12 w-12 relative flex items-center justify-center rounded-full p-0.5 focus:outline-none ring-transparent',
                                                $selectedColor == $color['id'] ? 'ring ring-offset-2' : 'ring-2'])
                                            style="background-color: {{ $color['color'] }}; --tw-ring-color: {{$color['color']}}"
                                        >
                                        </div>
                                    @else
                                    <div
                                        wire:key="color-{{$id}}"
                                        wire:click="resetAll('color', {{ $id }})"
                                        @class([
                                            'flex-shrink-0 opacity-10 pointer-events-none h-12 w-12 relative flex items-center justify-center rounded-full p-0.5 focus:outline-none ring-transparent',
                                            $selectedColor == $color['id'] ? 'ring ring-offset-2' : 'ring-2'])
                                        style="background-color: {{ $color['color'] }}; --tw-ring-color: {{$color['color']}}"
                                    >
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if($allSizes)
                    <div wire:key="sizes" class="space-y-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-color-18181a uppercase">{{__('shop.products.size')}}</p>
                            <div class="flex items-center space-x-2">
                                <span
                                    class="text-xs font-medium text-color-18181a uppercase">{{__('shop.options.size_guide')}}</span>
                                <img src="{{ Vite::asset('resources/images/icons/metro.svg')}}" class="w-5" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-3 gap-3 sm:grid-cols-4">
                                @foreach($allSizes as $id => $size)
                                    @if(in_array($id, array_keys($sizes)))
                                        <div
                                            wire:key="size-{{$id}}"
                                            wire:click="setSize({{ $size['id'] }})"
                                            @class([
                                                'cursor-pointer flex items-center justify-center rounded-md border py-3 px-3 text-sm font-medium uppercase sm:flex-1 focus:outline-none',
                                                $selectedSize == $size['id'] ? 'bg-color-18181a text-white' : 'border-gray-200 bg-color-edebe5 text-gray-900 hover:bg-color-18181a hover:text-white'])
                                        >
                                            <span id="size-choice-0-label">{{ $size['value'] }}</span>
                                        </div>
                                    @else
                                    <div
                                        wire:key="size-{{$id}}"
                                        wire:click="resetAll('size', {{ $id }})"
                                        @class([
                                            'opacity-10 pointer-events-none flex items-center justify-center rounded-md border py-3 px-3 text-sm font-medium uppercase sm:flex-1 focus:outline-none',
                                            $selectedSize == $size['id'] ? 'bg-color-18181a text-white' : 'border-gray-200 bg-color-edebe5 text-gray-900 hover:bg-color-18181a hover:text-white'])
                                    >
                                        <span id="size-choice-0-label">{{ $size['value'] }}</span>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- quantita --}}
            <div class="mt-10">
                <p class="text-sm font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.products.amount')}}</p>

                <div
                    class="w-[185px] h-[48px] rounded-md flex items-center border border-color-b6b9bb mt-5 shadow-shadow-2">
                    <div wire:click="removeProduct"
                         class="w-[60px] h-full flex items-center justify-center bg-transparent border-r border-color-b6b9bb">
                        <x-heroicon-o-minus class="h-5 w-5"></x-heroicon-o-minus>
                    </div>
                    <div
                        class="w-[65px] h-full flex items-center justify-center text-[13px] font-medium leading-[16px] text-color-18181a">{{ $quantity }}</div>
                    <div wire:click="addProduct"
                         class="w-[60px] h-full flex items-center justify-center bg-transparent border-l border-color-b6b9bb">
                        <x-heroicon-o-plus class="h-5 w-5"></x-heroicon-o-plus>
                    </div>
                </div>
            </div>

            {{-- actions --}}
            <div class="mt-[30px]">
                <livewire:components.button :wireAction="'payForLink'" :text="__('shop.button.pay_link')"
                                            :icon="'arrow-right-xl'" :color="'#33DDB3'"/>
                <div class="w-[438px] relative p-6">
                    <div class="h-[1px] bg-color-6c757d w-full"></div>
                    <span
                        class="absolute top-[15px] left-[calc(50%-36px)] px-[10px] bg-color-f2f0eb text-[13px] font-medium leading-[16px] text-color-6c757d">{{__('shop.options.or')}}</span>
                </div>
                <livewire:components.button :wireAction="'addToCart'" :text="__('shop.button.add_to_cart')"
                                            :icon="'bag'" :color="'#FF7F6E'"/>
            </div>

            {{-- other --}}
            <div class="mt-[26px] ">
                <p class="text-sm font-medium leading-[19px] text-color-18181a uppercase">COD: N / A</p>
                <p class="mt-5 mb-[15px] text-sm font-medium leading-[19px] text-color-18181a uppercase">{{__('shop.options.currency')}}</p>

                <livewire:components.select-money :selected="$selectedMoney" :options="$currency"/>
            </div>
        </div>

        {{-- info product --}}
        <div x-data="handler()" class="col-start-3 col-span-8 mt-[65px]">
            {{-- section button --}}
            <div class="w-full h-[58px] rounded-md bg-color-edebe5 flex items-center gap-[10px] mb-[50px]">
                <template x-for="tab in tabs" :key="tab">
                    <button x-text="tab" x-on:click="currentTab = tab"
                            :class="tab == currentTab ? '!bg-color-18181a !text-white' : ''"
                            class="w-[235px] h-[48px] rounded-md bg-transparent flex items-center justify-center text-sm font-medium leading-[19px] text-color-6c757d capitalize"
                    >
                    </button>
                </template>
            </div>

            <template x-if="currentTab == '{{$product->name}}'">
                <p class="text-[13px] leading-[24px] text-color-323a46">
                    La SOXPro Trekking Sock è la nuova calza sportiva grip progettata da GEARXPro Sports per soddisfare
                    al meglio le esigenze degli atleti. SOXPro Trekking è essenzialmente dedicato agli escursionisti e
                    agli amanti delle avventure all’aria aperta, ma adatto anche a tutte le attività sportive all’aria
                    aperta.

                    La novità assoluta è l’introduzione della tecnologia GRIP:IN (nel mondo del trekking), che unita
                    alla composizione multimateriale della calza, riduce il rischio di distorsioni e lo stress delle
                    articolazioni, garantendo maggiore stabilità, velocità e precisione. L’innovativa struttura della
                    calza è stata studiata per garantire il massimo comfort anche per escursioni impegnative e di più
                    giorni: un supporto ottimale che, a partire dalla pianta del piede, è in grado di favorire il
                    benessere di tutto il corpo durante l’intera prestazione sportiva. Libero di muoversi, saltare e
                    cambiare direzione su qualsiasi superficie: un perfetto connubio tra comfort e performance che
                    permetterà all’atleta di prendere pieno possesso del corpo.

                    Ispirandoci alla Kinetic Chain, abbiamo progettato una calza in grado di facilitare gli atleti in
                    tutti i movimenti dinamici e complessi, in termini di prevenzione degli infortuni e miglioramento
                    delle prestazioni attraverso comfort, stabilità e precisione. Oggi, soprattutto tra i
                    professionisti, siamo arrivati all’idea che il piede abbia davvero bisogno di essere all’interno di
                    una calza grip che non solo non deve permettere di scivolare, ma deve essere comoda e perfettamente
                    aderente al tipo di scarpa utilizzata. Libertà di movimento, traspirabilità, stabilità, rinforzo in
                    punti particolari, comfort e il giusto grip sono le parole essenziali per fare la scelta giusta.

                    Il massimo supporto alla caviglia è garantito dall’X-Cage, parte che costituisce l’intera zona della
                    caviglia, grazie alla sua composizione multimateriale e alla presenza di fasce di rinforzo
                    strategiche, diminuisce drasticamente il rischio di distorsioni e lo stress delle articolazioni. Un
                    vero e proprio supporto per la caviglia dell’atleta che permette una significativa riduzione del
                    carico muscolare e un’ottimizzazione del dispendio energetico durante tutta la durata dell’attività.

                    Grazie al ridotto scivolamento tra il piede e la scarpa, il sistema nervoso centrale riduce la
                    necessità di attivare le unità motorie. Inoltre, l’azione Grip: IN sul tallone previene le vesciche
                    causate dallo scivolamento della calza sulla pelle umida. Il perfetto mix di fasce contenitive e
                    elastici traspiranti, unito alla presenza della tecnologia Grip: IN, aiuterà l’atleta nella corretta
                    postura e ridurrà lo stress fisico dovuto ai micro-movimenti. Il rinforzo totale del piede, dal
                    tallone alla punta, è garantito dalla presenza di una leggera spugna a 360 gradi che, oltre a
                    prevenire la formazione di vesciche, assicura il massimo comfort proteggendo le parti più sensibili
                    del piede. La microtecnologia Cushion, estesa a tutta la pianta del piede, garantisce un importante
                    assorbimento degli urti.
                </p>
            </template>

            <template x-if="currentTab == '{{__('shop.products.characteristics')}}'">
                <div class="flex flex-wrap gap-10">
                    <div class="w-[calc(50%-40px)]">
                        <h5 class=" text-[13px] font-semibold leading-[24px] text-color-323a46 uppercase">DISPOSITIVO
                            MEDICO CLASSE 1</h5>
                        <p class=" text-[13px] leading-[24px] text-color-323a46">Prevenzione degli infortuni dovuti a un
                            ridotto stress sulle articolazioni e al risparmio muscolare.</p>
                    </div>
                    <div class="w-[calc(50%-40px)]">
                        <h5 class=" text-[13px] font-semibold leading-[24px] text-color-323a46 uppercase">DISPOSITIVO
                            MEDICO CLASSE 1</h5>
                        <p class=" text-[13px] leading-[24px] text-color-323a46">Prevenzione degli infortuni dovuti a un
                            ridotto stress sulle articolazioni e al risparmio muscolare.</p>
                    </div>
                </div>
            </template>

            <template x-if="currentTab == '{{__('shop.products.advantages')}}'">
                <div class="flex gap-[31px]">
                    <div class="w-[530px]">
                        <ul class="list-disc pl-[18px]">
                            <li class="text-[13px] font-medium leading-[24px] text-color-323a46 pb-[18px]">Massima
                                stabilità
                            </li>
                            <li class="text-[13px] font-medium leading-[24px] text-color-323a46 pb-[18px]">Massima
                                stabilità
                            </li>
                            <li class="text-[13px] font-medium leading-[24px] text-color-323a46 pb-[18px]">Massima
                                stabilità
                            </li>
                        </ul>
                    </div>
                    <div class="grow flex items-center justify-center overflow-hidden">
                        <img src="{{ Vite::asset('resources/images/vantaggi-img.png')}}" alt="">
                    </div>
                </div>
            </template>

            <template x-if="currentTab == '{{__('shop.products.technicality')}}'">
                <div>
                    <div class="mb-[30px]">
                        <h5 class="text-[13px] font-semibold leading-[24px] text-color-323a46 uppercase">CATENA
                            CINETICA</h5>
                        <p class=" text-[13px] leading-[24px] text-color-323a46">Ispirandoci alla Kinetic Chain, una
                            sequenza coordinata di attivazione, mobilizzazione e stabilizzazione dei segmenti corporei
                            per produrre un’attività dinamica, abbiamo progettato una calza in grado di facilitare gli
                            atleti in tutti i movimenti dinamici e complessi, in termini di prevenzione degli infortuni
                            e miglioramento delle prestazioni attraverso comfort, stabilità e precisione. Il perfetto
                            mix di fasce contenitive e elastici traspiranti, unito alla presenza della tecnologia Grip:
                            IN, aiuterà l’atleta nella corretta postura e ridurrà lo stress fisico dovuto ai
                            micro-movimenti.</p>
                    </div>
                    <div class="mb-[30px]">
                        <h5 class="text-[13px] font-semibold leading-[24px] text-color-323a46 uppercase">CATENA
                            CINETICA</h5>
                        <p class=" text-[13px] leading-[24px] text-color-323a46">Ispirandoci alla Kinetic Chain, una
                            sequenza coordinata di attivazione, mobilizzazione e stabilizzazione dei segmenti corporei
                            per produrre un’attività dinamica, abbiamo progettato una calza in grado di facilitare gli
                            atleti in tutti i movimenti dinamici e complessi, in termini di prevenzione degli infortuni
                            e miglioramento delle prestazioni attraverso comfort, stabilità e precisione. Il perfetto
                            mix di fasce contenitive e elastici traspiranti, unito alla presenza della tecnologia Grip:
                            IN, aiuterà l’atleta nella corretta postura e ridurrà lo stress fisico dovuto ai
                            micro-movimenti.</p>
                    </div>
                </div>
            </template>

            <template x-if="currentTab == '{{__('shop.products.wash')}}'">
                <div>
                    <div
                        class="h-[55px] px-9 flex items-center gap-3 border-b border-color-b6b9bb even:bg-color-edebe5">
                        <img src="{{ Vite::asset('resources/images/icons/lav-mano.svg')}}" alt="">
                        <img src="{{ Vite::asset('resources/images/icons/gradi.svg')}}" alt="">
                        <p class=" text-[13px] leading-[24px] text-color-323a46">Lavarli in acqua fredda a mano o al
                            massimo a 30° in lavatrice</p>
                    </div>
                    <div
                        class="h-[55px] px-9 flex items-center gap-3 border-b border-color-b6b9bb even:bg-color-edebe5">
                        <img src="{{ Vite::asset('resources/images/icons/no-cand.svg')}}" alt="">
                        <p class=" text-[13px] leading-[24px] text-color-323a46">Non usare candeggina</p>
                    </div>
                    <div
                        class="h-[55px] px-9 flex items-center gap-3 border-b border-color-b6b9bb even:bg-color-edebe5">
                        <img src="{{ Vite::asset('resources/images/icons/asciug.svg')}}" alt="">
                        <p class=" text-[13px] leading-[24px] text-color-323a46">Asciugare solo all’aria aperta</p>
                    </div>
                    <div
                        class="h-[55px] px-9 flex items-center gap-3 border-b border-color-b6b9bb even:bg-color-edebe5">
                        <img src="{{ Vite::asset('resources/images/icons/no-hot.svg')}}" alt="">
                        <p class=" text-[13px] leading-[24px] text-color-323a46">Non esporre al calore</p>
                    </div>
                </div>
            </template>
        </div>
    </div>

    {{-- carousel --}}
    <div class="col-span-12 pb-[100px] mt-5">
        <div class="mx-[89px] border-t-2 border-color-18181a shadow-shadow-4 mb-[50px]"></div>

        <div class="relative">
            <h2 class="px-[39px] mb-[27px] text-[33px] font-semibold leading-[40px] text-color-18181a">{{__('shop.most_purchased_title')}}</h2>

            <div class="pl-[39px] group-custom-button">
                <button
                    class="customPrevBtn w-[76px] h-[76px] rounded-full bg-white shadow-md hidden group-custom-button-hover:flex justify-center items-center absolute top-[calc(50%-97px)] z-10 hover:border">
                    <img class="rotate-180" src="{{ Vite::asset('resources/images/icons/arrow-left-button.svg')}}"
                         alt="">
                </button>

                {{--                <div wire:ignore class="owl-carousel carousel_most_purchased">--}}
                {{--                    @foreach ($mostPurchased as $key => $prod )--}}
                {{--                        <x-card-purchased--}}
                {{--                            :key="$key"--}}
                {{--                            :image="$prod['image']"--}}
                {{--                            :name="$prod['name']"--}}
                {{--                            :description="$prod['description']"--}}
                {{--                            :availableColor="$prod['availableColor']"--}}
                {{--                            :price="$prod['price']"--}}
                {{--                        />--}}
                {{--                    @endforeach--}}
                {{--                </div>--}}

                <button
                    class="customNextBtn w-[76px] h-[76px] rounded-full bg-white shadow-md hidden group-custom-button-hover:flex justify-center items-center absolute top-[calc(50%-97px)] right-[39px] z-10 hover:border">
                    <img src="{{ Vite::asset('resources/images/icons/arrow-left-button.svg')}}" alt="">
                </button>
            </div>

        </div>
    </div>

    {{-- modalInfoCart --}}
    <livewire:modals.cart/>
</div>

@push('scripts')
    <script>
        function handler() {
            return {
                currentTab: @json($product->name),
                tabs: [
                    @json($product->name),
                    @json(__('shop.products.characteristics')),
                    @json(__('shop.products.advantages')),
                    @json(__('shop.products.technicality')),
                    @json(__('shop.products.wash'))
                ]
            }
        }
    </script>

    <script>
        $(document).ready(function () {
            var carousel = new $(".carousel_most_purchased").owlCarousel({
                items: 4,
                margin: 15,
                loop: true,
                autoWidth: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                infinite: true,
            });

            $('.customNextBtn').click(function () {
                carousel.trigger('next.owl.carousel', [2000]);
            })

            $('.customPrevBtn').click(function () {
                carousel.trigger('prev.owl.carousel', [2000]);
            })
        });
    </script>
@endpush
