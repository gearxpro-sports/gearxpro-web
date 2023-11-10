<div class="bg-color-f2f0eb px-[39px] py-[70px]">
    <h1 class="text-[73px] font-bold text-color-18181a leading-[86px]">{{__('shop.products.title')}}</h1>
    <p class="text-[33px] font-semibold text-color-18181a leading-[40px] mt-[14px] mb-[38px]">{{__('shop.products.description')}}</p>

    <div
        @class([
            'px-[51px] py-[32px] z-50 bg-color-f2f0eb w-full rounded-md flex items-center mb-[30px] cursor-pointer',
            $filtersOpen ? '!shadow-none' : 'sticky top-10',
        ])
    >
        <div wire:click="toggleFilters" class="w-[224px] h-[48px] bg-transparent rounded-md flex justify-between items-center border border-black hover:border-white group">
            <div class="h-full flex items-center grow relative group-hover:text-white">
                <span class="z-10 text-[15px] font-semibold m-auto pr-8">
                    @if ($filtersOpen)
                        {{__('shop.products.button_filter_off')}}
                    @else
                        {{__('shop.products.button_filter_on')}}
                    @endif
                </span>
                <div class="h-full absolute top-0 w-0 bg-black group-hover:animate-line group-hover:w-full rounded-l-md"></div>
            </div>
            <div class="h-full border-l border-black group-hover:border-white w-[47px] flex items-center justify-center group-hover:bg-black rounded-r-md">
                <div class="group-hover:invert">
                    <x-icons name="filter_products" />
                </div>
            </div>
        </div>

        <div class="flex gap-[14px] ml-[30px]">
            @if ($selectedCategory)
            <button wire:click="resetCategory" class="flex items-center space-x-2 px-[25px] h-[48px] bg-color-6c757d text-white text-[15px] font-semibold leading-[19px] rounded-md hover:opacity-80">
                <x-icons class="text-white" name="x-close" /> <span>Reset</span>
            </button>
            @endif
            @foreach ($categories as $key => $category )
                <button
                    wire:key="cat_{{ $key}}"
                    @if($selectedCategory !== $category->id) wire:click="selectCategory({{ $category->id }})" @endif
                    @class([
                        'px-[25px] h-[48px] text-[15px] font-semibold leading-[19px] rounded-md',
                         'bg-color-18181a text-white hover:bg-black' => $selectedCategory !== $category->id,
                         'bg-white text-color-18181a cursor-auto' => $selectedCategory === $category->id
                    ])
                >
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
        <div class="ml-auto px-[51px] py-[32px]">
            <livewire:components.select label="{{ __('shop.products.order') }}" :selected="$selectedOrder" :options="$orderOptions" />
        </div>
    </div>

    <div class="relative flex">
        @if ($filtersOpen)
            <div class="z-50 min-w-[298px] ml-[51px] mr-[82px]">
                <div class="w-full pb-5 flex justify-between items-center border-b border-color-18181a">
                    <h4 class="text-[21px] font-semibold leading-[25px] text-color-18181a ">120 risultati</h4>
                    <span wire:click="clearFilter" class="text-[12px] font-medium leading-[15px] text-color-6c757d">Rimuovi filtri x</span>
                </div>

                <div class="w-full h-[1000px] overflow-y-auto scrollBar">
                    @foreach ($categories as $category)
                        <livewire:components.dropdown-filter wire:key="cat_filter_{{ $category->id }}" :label="$category->name" :options="$category->children" />
                    @endforeach

                    <livewire:components.dropdown-color :options="$productAttributes[2]->first()->terms->pluck('color', 'id')" />
                    <livewire:components.dropdown-size :options="$productAttributes[3]->first()->terms->pluck('value', 'id')" />
                </div>
            </div>
        @endif
        <div class="w-full" wire:loading.class="opacity-25">
            @if($products->count() > 0)
                <div class="w-full grid grid-cols-4 gap-5 relative">
                    @foreach ($products as $product )
                        <livewire:components.card-product
                          wire:key="prod_{{ $product->id }}"
                          :slug="$product->slug"
                          :image="'SOXPro.png'"
                          :category="$product->categories->first()"
                          :name="$product->name"
                          :availableColors="$productColorCounts[$product->id] ?? null"
                          :price="$product->price"
                        />
                    @endforeach
                </div>
            @else
                <div class="p-10 bg-white text-center font-bold">Nessun prodotto trovato</div>
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
