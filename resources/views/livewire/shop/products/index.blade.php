<div class="bg-color-f2f0eb py-8 h-fit xl:px-10 xl:py-20">

    <div id="title" class="px-4 xl:px-0">
        <h1 class="text-3xl xl:text-7xl font-bold text-color-18181a">{{__('shop.products.title')}}</h1>
        <p class="text-sm xl:text-4xl font-semibold text-color-18181a mt-3.5 xl:mb-9">{{__('shop.products.description')}}</p>
    </div>

    <div id="action"
        @class([
            'w-full max-h-[184px] py-5 px-4 xl:py-9 lg:w-fit xl:my-9 xl:px-12 z-20 bg-color-f2f0eb rounded-md flex lg:flex-row items-center cursor-pointer overflow-x-auto scrollBar',
            $filtersOpen ? '!shadow-none' : 'lg:sticky lg:top-28 xl:top-10', 'invisible lg:visible' => $products->count() < 1,
        ])
    >
        <div id="category" class="hidden lg:!hidden w-full items-start justify-between">
            <div>
                <h1 class="w-full bg-color-f2f0eb text-3xl font-bold mb-4 transition-all duration-300">{{$selectedCategory != null ? $selectedCategory->name : '' }}</h1>
                <p class="text-sm transition-all duration-300 font-semibold text-color-18181a mt-3.5 mb-3">{{__('shop.products.description')}}</p>
            </div>

            <button wire:click="resetCategory()" class="group">
                <x-icons name="arrow-right-xl" class="rotate-180 group-hover:translate-x-[-8px] duration-300 transition-all scale-150"/>
            </button>
        </div>

        <div wire:click="toggleFilters"
            @class(["w-full lg:w-fit xl:w-72 min-h-[44px] h-11 lg:h-12 bg-transparent rounded-md flex justify-between items-center border border-black hover:border-white group transition-all duration-300 lg:translate-y-0", 'hidden lg:flex' => !$selectedCategory])>
            <div class="h-full rounded-l-md bg-white lg:bg-transparent flex items-center grow relative group-hover:text-white">
                <span class="z-10 text-sm xl:text-base font-semibold xl:m-auto px-5 xl:pr-8">
                    @if ($filtersOpen)
                        {{__('shop.products.button_filter_off')}}
                    @else
                        {{__('shop.products.button_filter_on')}}
                    @endif
                </span>
                <div class="h-full absolute top-0 w-0 bg-black group-hover:animate-line group-hover:w-full rounded-l-md"></div>
            </div>
            <div class="h-full bg-white lg:bg-transparent border-l border-black group-hover:border-white w-12 flex items-center justify-center group-hover:bg-black rounded-r-md">
                <div class="group-hover:invert">
                    <x-icons name="filter_products" />
                </div>
            </div>
        </div>

        <div @class(["flex lg:pl-4 space-x-2 xl:gap-3.5 xl:ml-7", 'hidden lg:flex' =>$selectedCategory])>
            @foreach ($categories as $key => $category )
                <button
                    wire:key="cat_{{ $key}}"
                    wire:click="selectCategory({{ $category->id }})"
                    @class([
                        'px-6 h-12 font-semibold rounded-md bg-color-18181a text-white hover:opacity-80',
                         'bg-white !text-color-18181a hover:!opacity-100' => $selectedCategory && ($selectedCategory->id === $category->id || $selectedCategory->parent_id === $category->id)
                    ])
                >
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
    </div>

    <div class="relative flex gap-10">
        <div @class(["z-50 lg:z-40 h-screen max-w-0 xl:h-fit bg-color-f2f0eb overflow-auto xl:overflow-hidden scrollBar transition-all delay-150 duration-500 fixed lg:relative w-full inset-0", 'lg:min-w-[231px] max-w-[100%] lg:max-w-[360px] xl:ml-12 xl:mr-20' => $filtersOpen])>
            <div class="lg:hidden w-full bg-white py-5 flex justify-between items-center px-4 xl:px-0">
                <h4 class="text-xl font-semibold text-color-18181a ">{{__('shop.products.button_filter_off')}}</h4>
                <div wire:click="toggleFilters" class="p-2">
                    <x-icons name="x-close" />
                </div>
                {{-- @if ($selectedCategory || $selectedColors || $selectedSizes)
                <a href="#" wire:click.prevent="clearFilters" class="text-xs font-medium text-color-6c757d">{{ __('shop.products.remove_filters') }}</a>
                @endif --}}
            </div>

            <div class="hidden xl:flex w-full pb-5 justify-between items-center border-b border-color-18181a">
                <h4 class="text-xl font-semibold text-color-18181a ">{{ $products->count() }} {{ __('shop.products.results') }}</h4>
                @if ($selectedCategory || $selectedColors || $selectedSizes)
                <a href="#" wire:click.prevent="clearFilters" class="text-xs font-medium text-color-6c757d">{{ __('shop.products.remove_filters') }} x</a>
                @endif
            </div>

            {{-- SELECT ORDER MOBILE --}}
            <div x-data="{opened: false}" class="2xl:hidden w-full px-4 xl:px-0 pt-4">
                <div @click="opened = !opened" class="flex justify-between items-center pb-4 border-b border-color-e0e0df cursor-pointer">
                    <h5 class="font-medium text-color-18181a uppercase">{{__('shop.products.order')}}</h5>
                    <span class="invisible transition-all duration-300 ease-out opacity-20" :class="opened && '!visible !opacity-100'">
                        <x-icons name="minus_menu" />
                    </span>
                </div>

                <div class="max-h-0 transition-all duration-500 ease-in-out overflow-hidden" :class="opened && 'max-h-96'">
                    <div class="flex flex-col flex-wrap items-start gap-4 px-1 py-5">
                        @foreach ($orderOptions as $id => $option )
                            <button wire:click="$dispatch('selectColors', {{ $id }})"
                                @class(["grow py-4 text-sm font-medium text-color-18181a hover:text-color-323a46 flex items-center gap-4 group",
                                '!font-bold' => $id == $selectedOrder])
                            > <x-icons name="ellisse" />
                                {{$option}}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="w-full xl:h-[1000px] overflow-y-auto scrollBar px-4 xl:px-0">

                {{-- SUBCATEGORIES FILTERS --}}
                @if ($selectedCategory)
                    @php
                        $filterCategories = $this->selectedCategory ?
                            $this->categories->where('id', ($this->selectedCategory->parent_id !== null ? $this->selectedCategory->parent_id : $this->selectedCategory->id)) :
                            $this->categories
                        ;
                    @endphp
                    @foreach ($filterCategories as $filterCategory)
                        <div wire:key="cat_filter_{{ $category->id }}" class="w-full px-1 pt-4">
                            <div class="flex justify-between items-center pb-4 border-b border-color-e0e0df cursor-pointer">
                                <h5 class="font-medium text-color-18181a uppercase">{{ $filterCategory->name }}</h5>
                                <x-icons name="minus_menu" />
                            </div>
                            <div class="transition-all duration-1000 ease-out overflow-hidden">
                                <ul>
                                    @foreach ($filterCategory->children as $child )
                                        <li class="py-4 text-sm font-medium text-color-18181a hover:text-color-323a46 flex items-center gap-4 group">
                                            <x-icons name="ellisse" />
                                            <a
                                                wire:click.prevent="selectCategory({{ $child->id }})"
                                                href="#"
                                                @class([
                                                    'inline-block',
                                                    'font-bold py-2 px-4 bg-color-18181a text-white rounded' => $selectedCategory && $selectedCategory->id === $child->id
                                                ])
                                            >{{ $child->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif

                {{-- COLOR FILTERS --}}
                <div x-data="{opened: false}" class="w-full px-1 pt-4">
                    <div @click="opened = !opened" class="flex justify-between items-center pb-4 cursor-pointer">
                        <h5 class="font-medium text-color-18181a uppercase">{{__('shop.products.color')}}</h5>
                        <span class="invisible transition-all duration-300 ease-out opacity-20" :class="opened && '!visible !opacity-100'">
                            <x-icons name="minus_menu" />
                        </span>
                    </div>

                    <div class="max-h-0 border-b border-color-e0e0df transition-all duration-500 ease-in-out overflow-hidden" :class="opened && 'max-h-96'">
                        <div class="flex flex-wrap items-center gap-4 px-1 py-5">
                            @foreach ($productAttributes[2]->first()->terms->pluck('color', 'id') as $id => $color )
                                <button
                                    class="cursor-pointer h-8 w-8 rounded-full p-0.5 focus:outline-none ring-transparent ring ring-offset-2 ring-offset-color-f2f0eb"
                                    @style([
                                        'background-color : '.$color,
                                        '--tw-ring-color: '.$color => in_array($id, $selectedColors)
                                    ])
                                    wire:click="selectColors('{{ $id }}')"
                                >
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- SIZES FILTERS --}}
                <div x-data="{opened: false}" class="w-full px-1 pt-4">
                    <div @click="opened = !opened" class="flex justify-between items-center pb-4 cursor-pointer">
                        <h5 class="font-medium text-color-18181a uppercase">{{__('shop.products.size')}}</h5>
                        <span class="invisible transition-all duration-300 ease-out opacity-20" :class="opened && '!visible !opacity-100'">
                            <x-icons name="minus_menu" />
                        </span>
                    </div>

                    <div class="max-h-0 border-b border-color-e0e0df transition-all duration-500 ease-in-out overflow-hidden" :class="opened && 'max-h-96'">
                        <div class="flex flex-wrap items-center gap-4 px-1 py-5">
                            @foreach ($productAttributes[3]->first()->terms->pluck('value', 'id') as $id => $size )
                                <button
                                    wire:click="selectSizes('{{ $id }}')"
                                    @class([
                                        'w-12 h-11 bg-color-edebe5 border border-color-e0e0df rounded flex items-center justify-center text-sm font-medium uppercase cursor-pointer hover:bg-color-18181a hover:text-white',
                                        '!bg-color-18181a !text-white' => in_array($id, $selectedSizes)
                                    ])
                                >
                                    {{ $size }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="w-full relative lg:-ml-9" wire:loading.class="opacity-25">
            {{-- SELECT ORDER --}}
            <div class="hidden 2xl:block absolute top-[-120px] right-0">
                <div x-data="{opened: false}" class="flex gap-2 items-center">
                    <label class="text-[15px] font-medium text-color-6c757d">{{ __('shop.products.order') }}</label>
                    <div class="relative h-[48px] w-[206px]">
                        <button @click="opened = !opened" class="w-full h-full flex items-center justify-between bg-transparent border border-color-b6b9bb rounded-md px-[22px] text-[15px] font-medium leading-[19px] text-color-18181a capitalize">
                            {{ $orderOptions[$selectedOrder] }}
                            <div :class="opened && 'rotate-180'" class="transition-all duration-300">
                                <x-icons name="arrow-down" />
                            </div>
                        </button>

                        <ul :class="opened && '!h-fit border transition-all duration-300'"
                            class="w-full h-0 bg-white absolute mt-1 z-10 rounded-md overflow-hidden">
                            @foreach($orderOptions as $key => $option)
                            <li wire:click="selectOrder('{{ $key }}')"
                                @class([
                                    'px-3 py-2 cursor-pointer capitalize m-1',
                                    'bg-color-18181a/80 text-white' => $selectedOrder === $key,
                                    'hover:bg-color-18181a hover:text-white',
                                ])
                            >
                                {{ $option }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div id="cards" @class(["w-full px-4 xl:px-0 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 xl:gap-5 relative invisible",'lg:!grid-cols-3' => $filtersOpen, '!visible' => $products->count() > 0])>
                @foreach ($products as $product )
                    <livewire:components.card-product
                        wire:key="prod_{{ $product->id }}"
                        :product="$product"
                        :image="'SOXPro.png'"
                        :availableColors="$productColors[$product->id] ?? []"
                    />
                @endforeach
            </div>

            @if ($products->count() < 1)
                <div @class(["w-full xl:w-[calc(100%-80px)] fixed top-44 lg:top-80 xl:top-[496px] md:text-2xl p-10 bg-white text-center font-bold"])>
                    {{ __('shop.products.not_found') }}
                    <button wire:click="resetCategory()" class="group absolute top-4 right-4 lg:hidden">
                        <x-icons name="arrow-right-xl" class="rotate-180 scale-150"/>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var scrollPosition = window.scrollY;
        var actionContainer = document.getElementById('action');
        var containerCard = document.getElementById('cards');
        var title = document.getElementById('title');
        var category = document.getElementById('category');

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('morph.updated', ({el, component}) => {
                var selectedCategory = @this.selectedCategory ;
                if (selectedCategory && window.matchMedia("(max-width: 820px)").matches) {
                    window.scrollTo(0,0);
                    title.classList.add("hidden");
                    category.classList.add("!flex");
                    actionContainer.classList.add("fixed", "top-[106px]", "left-0", "flex-col", "!items-start", "rounded-none");
                    containerCard.classList.add("pt-[125px]","lg:pt-0");
                } else {
                    title.classList.remove("hidden");
                    actionContainer.classList.remove("fixed", "top-[106px]", "left-0", "flex-col", "!items-start", "rounded-none");
                    containerCard.classList.remove("pt-[125px]","lg:pt-0");
                }
            })
        });

        window.onscroll = function(e) {
            if (this.oldScroll > this.scrollY) {
                action.classList.remove('!max-h-[150px]')
                action.childNodes[3].classList.remove("translate-y-[-35px]");
            } else {
                if (@this.selectedCategory) {
                    action.classList.add('!max-h-[150px]', "transition-all", "duration-300")
                    action.childNodes[3].classList.add("translate-y-[-35px]");
                }
            }
            this.oldScroll = this.scrollY;
        }

        window.addEventListener('scroll', function() {
            scrollPosition = window.scrollY;

            if (scrollPosition >= 300) {
                actionContainer.classList.add('lg:shadow-md');
            } else {
                actionContainer.classList.remove('lg:shadow-md');
            }

            if (window.matchMedia("(max-width: 820px)").matches) {
                if (@this.selectedCategory == null) {
                    if (scrollPosition >= 100) {
                        console.log('si');
                        actionContainer.classList.add("fixed", "top-[105px]", "left-0", "shadow");
                        containerCard.classList.add("pt-[110px]","xl:pt-0");
                    }  else {
                        actionContainer.classList.remove("fixed", "top-[105px]", "left-0", "shadow");
                        containerCard.classList.remove("pt-[110px]", "xl:pt-0");
                    }
                }

                // if (@this.selectedCategory) {
                //     // console.log(action.childNodes[3]);
                //     action.childNodes[3].classList.add("translate-y-[-35px]", "transition-all", "duration-300")
                // }
            }
        });

    </script>
@endpush
