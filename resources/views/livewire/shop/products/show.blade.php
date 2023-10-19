<div class="bg-color-f2f0eb p-[39px] grid grid-cols-12 gap-[30px]">
    {{-- image --}}
    <div class="col-span-7 h-[1104px] overflow-y-auto scrollBar flex flex-col gap-4 pb-4">
        @if ($format == 'short')
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
            <span class=" text-[17px] leading-[28px] text-color-6c757d">SOXPro</span>
            <h1 class="text-[33px] font-semibold leading-[40px] text-color-18181a">SOXPro Trekking</h1>
            <p class="text-[21px] font-medium leading-[38px] text-color-18181a">€ 29,00 - € 35,00</p>
        </div>

        {{-- format --}}
        <div class="mt-[50px]">
            <p class=" text-[15px] font-medium leading-[19px] text-color-18181a">ALTEZZA GAMBA</p>

            <div class="w-[353px] h-[58px] flex justify-between bg-color-edebe5 px-[6px] py-[5px] rounded-md mt-5">
                <button wire:click="changeFormat('short')" @class(['px-5 h-full text-[15px] bg-transparent rounded-md font-medium leading-[19px] text-color-6c757d',
                    $format == 'short' ? '!bg-color-18181a !text-white' : '',
                ])>Metà polpaccio</button>
                <button wire:click="changeFormat('long')" @class(['px-5 h-full text-[15px] bg-transparent rounded-md font-medium leading-[19px] text-color-6c757d',
                    $format == 'long' ? '!bg-color-18181a !text-white' : '',
                ])>Sopra il polpaccio</button>
            </div>
        </div>

        {{-- color --}}
        <div class="mt-10">
            <p class=" text-[15px] font-medium leading-[19px] text-color-18181a">COLORE</p>

            <div class="flex items-center gap-4 mt-5">
                @foreach ($colors as $color )
                    <div wire:click="selectColor('{{$color['code']}}')"
                        @class(['w-[62px] h-[62px] rounded-full border border-color-e0e0df p-1 flex items-center justify-between',
                        $selectedColor == $color['code'] ? '!border-color-18181a' : '',
                    ])>
                    @if ($format == 'short')
                        <div class="w-full h-full rounded-full shadow-md overflow-hidden flex items-center justify-between">
                            <img class="scale-150" src="{{ Vite::asset($color['image-short'])}}" alt="">
                        </div>
                        @else
                        <div class="w-full h-full rounded-full shadow-md overflow-hidden flex items-center justify-between">
                            <img class="scale-150" src="{{ Vite::asset($color['image-long'])}}" alt="">
                        </div>
                    @endif
                    </div>
                @endforeach
            </div>
        </div>

        {{-- taglia --}}
        <div class="mt-10">
            <p class=" text-[15px] font-medium leading-[19px] text-color-18181a">TAGLIA</p>

            <div class="flex flex-wrap items-center gap-[18px] mt-5">
                @foreach ($sizes as $size )
                    <div wire:click="selectSize('{{ $size }}')" class="w-[48px] h-[46px] bg-color-edebe5 border border-color-e0e0df rounded-sm flex items-center justify-center">
                        <span class="text-[13px] font-medium leading-[16px] text-color-6c757d uppercase">{{$size}}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- quantita --}}
        <div class="mt-10">
            <p class="text-[15px] font-medium leading-[19px] text-color-18181a">QUANTITÀ</p>

            <div class="w-[185px] h-[48px] rounded-md flex items-center border border-color-b6b9bb mt-5 shadow-shadow-2">
                <div wire:click="removeProduct" class="w-[60px] h-full flex items-center justify-center bg-transparent border-r border-color-b6b9bb">
                    <x-heroicon-o-minus class="h-5 w-5"></x-heroicon-o-minus>
                </div>
                <div class="w-[65px] h-full flex items-center justify-center text-[13px] font-medium leading-[16px] text-color-18181a">{{ $quantity }}</div>
                <div wire:click="addProduct" class="w-[60px] h-full flex items-center justify-center bg-transparent border-l border-color-b6b9bb">
                    <x-heroicon-o-plus class="h-5 w-5"></x-heroicon-o-plus>
                </div>
            </div>
        </div>

        {{-- actions --}}
        <div class="mt-[30px]">
            <livewire:components.button :wireAction="'payForLink'" :text="'Paga con link'" :icon="'arrow-right-xl'" :color="'#33DDB3'" />
            <div class="w-[438px] relative p-6">
                <div class="h-[1px] bg-color-6c757d w-full"></div>
                <span class="absolute top-[15px] left-[calc(50%-36px)] px-[10px] bg-color-f2f0eb text-[13px] font-medium leading-[16px] text-color-6c757d">oppure</span>
            </div>
            <livewire:components.button :wireAction="'addToCart'" :text="'Aggiungi al carrello'" :icon="'bag'" :color="'#FF7F6E'" />
        </div>

        {{-- other --}}
        <div class="mt-[26px] ">
            <p class="text-[15px] font-medium leading-[19px] text-color-18181a uppercase">COD:  N / A</p>
            <p class="mt-5 mb-[15px] text-[15px] font-medium leading-[19px] text-color-18181a">VALUTA</p>

            <livewire:components.select-money :selected="$selectedMoney" :options="['(€) Euro','($) Dollaro']" />

            <div class="mt-10 flex items-center gap-2">
                <span class="text-[15px] font-medium leading-[19px] text-color-18181a uppercase">GUIDA ALLE TAGLIE</span>
                <img src="{{ Vite::asset('resources/images/icons/metro.svg')}}" alt="">
            </div>
        </div>
    </div>

    {{-- info product --}}
    <div x-data="handler()" class="col-start-3 col-span-8 h-[631px] mt-[65px]">
        {{-- section button --}}
        <div class="w-full h-[58px] rounded-md bg-color-edebe5 flex items-center gap-[10px] mb-[50px]">
            <template x-for="tab in tabs" :key="tab">
                <button x-text="tab" x-on:click="currentTab = tab"
                    :class="tab == currentTab ? '!bg-color-18181a !text-white' : ''"
                    class="w-[235px] h-[48px] rounded-md bg-transparent flex items-center justify-center text-[15px] font-medium leading-[19px] text-color-6c757d capitalize"
                >
                </button>
            </template>
        </div>

        <template x-if="currentTab == '{{$product}}'">
            <p class="text-[13px] leading-[24px] text-color-323a46">
                La SOXPro Trekking Sock è la nuova calza sportiva grip progettata da GEARXPro Sports per soddisfare al meglio le esigenze degli atleti. SOXPro Trekking è essenzialmente dedicato agli escursionisti e agli amanti delle avventure all’aria aperta, ma adatto anche a tutte le attività sportive all’aria aperta.

                La novità assoluta è l’introduzione della tecnologia GRIP:IN (nel mondo del trekking), che unita alla composizione multimateriale della calza, riduce il rischio di distorsioni e lo stress delle articolazioni, garantendo maggiore stabilità, velocità e precisione. L’innovativa struttura della calza è stata studiata per garantire il massimo comfort anche per escursioni impegnative e di più giorni: un supporto ottimale che, a partire dalla pianta del piede, è in grado di favorire il benessere di tutto il corpo durante l’intera prestazione sportiva. Libero di muoversi, saltare e cambiare direzione su qualsiasi superficie: un perfetto connubio tra comfort e performance che permetterà all’atleta di prendere pieno possesso del corpo.

                Ispirandoci alla Kinetic Chain, abbiamo progettato una calza in grado di facilitare gli atleti in tutti i movimenti dinamici e complessi, in termini di prevenzione degli infortuni e miglioramento delle prestazioni attraverso comfort, stabilità e precisione. Oggi, soprattutto tra i professionisti, siamo arrivati all’idea che il piede abbia davvero bisogno di essere all’interno di una calza grip che non solo non deve permettere di scivolare, ma deve essere comoda e perfettamente aderente al tipo di scarpa utilizzata. Libertà di movimento, traspirabilità, stabilità, rinforzo in punti particolari, comfort e il giusto grip sono le parole essenziali per fare la scelta giusta.

                Il massimo supporto alla caviglia è garantito dall’X-Cage, parte che costituisce l’intera zona della caviglia, grazie alla sua composizione multimateriale e alla presenza di fasce di rinforzo strategiche, diminuisce drasticamente il rischio di distorsioni e lo stress delle articolazioni. Un vero e proprio supporto per la caviglia dell’atleta che permette una significativa riduzione del carico muscolare e un’ottimizzazione del dispendio energetico durante tutta la durata dell’attività.

                Grazie al ridotto scivolamento tra il piede e la scarpa, il sistema nervoso centrale riduce la necessità di attivare le unità motorie. Inoltre, l’azione Grip: IN sul tallone previene le vesciche causate dallo scivolamento della calza sulla pelle umida. Il perfetto mix di fasce contenitive e elastici traspiranti, unito alla presenza della tecnologia Grip: IN, aiuterà l’atleta nella corretta postura e ridurrà lo stress fisico dovuto ai micro-movimenti. Il rinforzo totale del piede, dal tallone alla punta, è garantito dalla presenza di una leggera spugna a 360 gradi che, oltre a prevenire la formazione di vesciche, assicura il massimo comfort proteggendo le parti più sensibili del piede. La microtecnologia Cushion, estesa a tutta la pianta del piede, garantisce un importante assorbimento degli urti.
            </p>
        </template>

        <template x-if="currentTab == 'caratteristiche'">
            <div class="flex flex-wrap gap-10">
                <div class="w-[calc(50%-40px)]">
                    <h5 class=" text-[13px] font-semibold leading-[24px] text-color-323a46 uppercase">DISPOSITIVO MEDICO CLASSE 1</h5>
                    <p class=" text-[13px] leading-[24px] text-color-323a46">Prevenzione degli infortuni dovuti a un ridotto stress sulle articolazioni e al risparmio muscolare.</p>
                </div>
                <div class="w-[calc(50%-40px)]">
                    <h5 class=" text-[13px] font-semibold leading-[24px] text-color-323a46 uppercase">DISPOSITIVO MEDICO CLASSE 1</h5>
                    <p class=" text-[13px] leading-[24px] text-color-323a46">Prevenzione degli infortuni dovuti a un ridotto stress sulle articolazioni e al risparmio muscolare.</p>
                </div>
            </div>
        </template>

        <template x-if="currentTab == 'vantaggi'">
            <div class="flex gap-[31px]">
                <div class="w-[530px]">
                    <ul class="list-disc pl-[18px]">
                        <li class="text-[13px] font-medium leading-[24px] text-color-323a46 pb-[18px]">Massima stabilità</li>
                        <li class="text-[13px] font-medium leading-[24px] text-color-323a46 pb-[18px]">Massima stabilità</li>
                        <li class="text-[13px] font-medium leading-[24px] text-color-323a46 pb-[18px]">Massima stabilità</li>
                    </ul>
                </div>
                <div class="grow flex items-center justify-center overflow-hidden">
                    <img src="{{ Vite::asset('resources/images/vantaggi-img.png')}}" alt="">
                </div>
            </div>
        </template>

        <template x-if="currentTab == 'tecnicita'">
            <div>
                <div class="mb-[30px]">
                    <h5 class="text-[13px] font-semibold leading-[24px] text-color-323a46 uppercase">CATENA CINETICA</h5>
                    <p class=" text-[13px] leading-[24px] text-color-323a46">Ispirandoci alla Kinetic Chain, una sequenza coordinata di attivazione, mobilizzazione e stabilizzazione dei segmenti corporei per produrre un’attività dinamica, abbiamo progettato una calza in grado di facilitare gli atleti in tutti i movimenti dinamici e complessi, in termini di prevenzione degli infortuni e miglioramento delle prestazioni attraverso comfort, stabilità e precisione. Il perfetto mix di fasce contenitive e elastici traspiranti, unito alla presenza della tecnologia Grip: IN, aiuterà l’atleta nella corretta postura e ridurrà lo stress fisico dovuto ai micro-movimenti.</p>
                </div>
                <div class="mb-[30px]">
                    <h5 class="text-[13px] font-semibold leading-[24px] text-color-323a46 uppercase">CATENA CINETICA</h5>
                    <p class=" text-[13px] leading-[24px] text-color-323a46">Ispirandoci alla Kinetic Chain, una sequenza coordinata di attivazione, mobilizzazione e stabilizzazione dei segmenti corporei per produrre un’attività dinamica, abbiamo progettato una calza in grado di facilitare gli atleti in tutti i movimenti dinamici e complessi, in termini di prevenzione degli infortuni e miglioramento delle prestazioni attraverso comfort, stabilità e precisione. Il perfetto mix di fasce contenitive e elastici traspiranti, unito alla presenza della tecnologia Grip: IN, aiuterà l’atleta nella corretta postura e ridurrà lo stress fisico dovuto ai micro-movimenti.</p>
                </div>
            </div>
        </template>

        <template x-if="currentTab == 'istruzioni di lavaggio'">
            <div>
                <div class="h-[55px] px-9 flex items-center gap-3 border-b border-color-b6b9bb even:bg-color-edebe5">
                    <img src="{{ Vite::asset('resources/images/icons/lav-mano.svg')}}" alt="">
                    <img src="{{ Vite::asset('resources/images/icons/gradi.svg')}}" alt="">
                    <p class=" text-[13px] leading-[24px] text-color-323a46">Lavarli in acqua fredda a mano o al massimo a 30° in lavatrice</p>
                </div>
                <div class="h-[55px] px-9 flex items-center gap-3 border-b border-color-b6b9bb even:bg-color-edebe5">
                    <img src="{{ Vite::asset('resources/images/icons/no-cand.svg')}}" alt="">
                    <p class=" text-[13px] leading-[24px] text-color-323a46">Non usare candeggina</p>
                </div>
                <div class="h-[55px] px-9 flex items-center gap-3 border-b border-color-b6b9bb even:bg-color-edebe5">
                    <img src="{{ Vite::asset('resources/images/icons/asciug.svg')}}" alt="">
                    <p class=" text-[13px] leading-[24px] text-color-323a46">Asciugare solo all’aria aperta</p>
                </div>
                <div class="h-[55px] px-9 flex items-center gap-3 border-b border-color-b6b9bb even:bg-color-edebe5">
                    <img src="{{ Vite::asset('resources/images/icons/no-hot.svg')}}" alt="">
                    <p class=" text-[13px] leading-[24px] text-color-323a46">Non esporre al calore</p>
                </div>
            </div>
        </template>
    </div>
</div>

@push('scripts')
    <script>
        function handler() {
            return {
                currentTab: @json($product),
                tabs: [
                    @json($product),
                    'caratteristiche',
                    'vantaggi',
                    'tecnicita',
                    'istruzioni di lavaggio'
                ]
            }
        }
    </script>
@endpush
