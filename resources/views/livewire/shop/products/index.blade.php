<div class="bg-color-f2f0eb px-10 py-20">
    <h1 class="text-7xl font-bold text-color-18181a">{{__('shop.products.title')}}</h1>
    <p class="text-4xl font-semibold text-color-18181a mt-3.5 mb-9">{{__('shop.products.description')}}</p>

    <div
        @class([
            'px-12 py-8 z-50 bg-color-f2f0eb w-full rounded-md flex items-center mb-8 cursor-pointer',
            $filtersOpen ? '!shadow-none' : 'sticky top-10',
        ])
    >
        <div wire:click="toggleFilters" class="w-56 h-12 bg-transparent rounded-md flex justify-between items-center border border-black hover:border-white group">
            <div class="h-full flex items-center grow relative group-hover:text-white">
                <span class="z-10 font-semibold m-auto pr-8">
                    @if ($filtersOpen)
                        {{__('shop.products.button_filter_off')}}
                    @else
                        {{__('shop.products.button_filter_on')}}
                    @endif
                </span>
                <div class="h-full absolute top-0 w-0 bg-black group-hover:animate-line group-hover:w-full rounded-l-md"></div>
            </div>
            <div class="h-full border-l border-black group-hover:border-white w-12 flex items-center justify-center group-hover:bg-black rounded-r-md">
                <div class="group-hover:invert">
                    <x-icons name="filter_products" />
                </div>
            </div>
        </div>

        <div class="flex gap-3.5 ml-7">
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
        <div class="ml-auto px-12 py-8">
            <livewire:components.select label="{{ __('shop.products.order') }}" :selected="$selectedOrder" :options="$orderOptions" />
        </div>
    </div>

    <div class="relative flex">
        @if ($filtersOpen)
            <div class="z-50 min-w-72 ml-12 mr-20">
                <div class="w-full pb-5 flex justify-between items-center border-b border-color-18181a">
                    <h4 class="text-xl font-semibold text-color-18181a ">{{ $products->count() }} {{ __('shop.products.results') }}</h4>
                    @if ($selectedCategory || $selectedColors || $selectedSizes)
                    <a href="#" wire:click.prevent="clearFilters" class="text-xs font-medium text-color-6c757d">{{ __('shop.products.remove_filters') }} x</a>
                    @endif
                </div>

                <div class="w-full h-[1000px] overflow-y-auto scrollBar">

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
                        <div @click="opened = !opened" class="flex justify-between items-center pb-4 border-b border-color-e0e0df cursor-pointer">
                            <h5 class="font-medium text-color-18181a uppercase">{{__('shop.products.color')}}</h5>
                            <span class="invisible transition-all duration-300 ease-out opacity-20" :class="opened && '!visible !opacity-100'">
                                <x-icons name="minus_menu" />
                            </span>
                        </div>

                        <div class="h-0 transition-all duration-1000 ease-out overflow-hidden" :class="opened && '!h-fit overflow-visible'">
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
                        <div @click="opened = !opened" class="flex justify-between items-center pb-4 border-b border-color-e0e0df cursor-pointer">
                            <h5 class="font-medium text-color-18181a uppercase">{{__('shop.products.size')}}</h5>
                            <span class="invisible transition-all duration-300 ease-out opacity-20" :class="opened && '!visible !opacity-100'">
                                <x-icons name="minus_menu" />
                            </span>
                        </div>

                        <div class="h-0 transition-all duration-1000 ease-out overflow-hidden" :class="opened && '!h-fit overflow-visible'">
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
        @endif
        <div class="w-full" wire:loading.class="opacity-25">
            @if($products->count() > 0)
                <div class="w-full grid grid-cols-4 gap-5 relative">
                    @foreach ($products as $product )
                        <livewire:components.card-product
                          wire:key="prod_{{ $product->id }}"
                          :product="$product"
                          :image="'SOXPro.png'"
                          :availableColors="$productColors[$product->id] ?? []"
                        />
                    @endforeach
                </div>
            @else
                <div class="p-10 bg-white text-center font-bold">{{ __('shop.products.not_found') }}</div>
            @endif
        </div>
    </div>
</div>

{{-- @push('scripts')
    <script>
        var scrollPosition = window.scrollY;
        var actionContainer = document.getElementById('action');

        window.addEventListener('scroll', function() {
            scrollPosition = window.scrollY;

            if (scrollPosition >= 300) {
                actionContainer.classList.add('shadow-lg')
            } else {
                actionContainer.classList.remove('shadow-lg')
            }
        })
    </script>
@endpush --}}
