<div class="bg-color-f2f0eb px-[39px] py-[70px]">
    <h1 class="text-[73px] font-bold text-color-18181a leading-[86px]">{{__('shop.products.title')}}</h1>
    <p class="text-[33px] font-semibold text-color-18181a leading-[40px] mt-[14px] mb-[38px]">{{__('shop.products.description')}}</p>

    <div id="action"
        @class([
            'px-[51px] py-[32px] z-50 bg-color-f2f0eb w-fit rounded-md flex items-center mb-[30px]',
            $filter ? '!shadow-none' : 'sticky top-10',
        ])
    >
        <livewire:components.filter-button />

        <div class="flex gap-[14px] ml-[30px]">
            @foreach ($categories as $key => $category )
                <livewire:components.section-button wire:key="{{$category.$key}}" :selected="$selectedCategory" :index="$key" :name="$category" />
            @endforeach
        </div>
    </div>

    <div class="relative flex">
        <div class="px-[51px] py-[32px] absolute right-0 top-[-142px]">
            <livewire:components.select label="{{__('shop.products.order')}}" :selected="$selectedOrder" :options="$orders" />
        </div>

        @if ($filter)
            <div class="z-50 min-w-[298px] ml-[51px] mr-[82px]">
                <div class="w-full pb-5 flex justify-between items-center border-b border-color-18181a">
                    <h4 class="text-[21px] font-semibold leading-[25px] text-color-18181a ">120 risultati</h4>
                    <span wire:click="clearFilter" class="text-[12px] font-medium leading-[15px] text-color-6c757d">Rimuovi filtri x</span>
                </div>

                <div class="w-full h-[1000px] overflow-y-auto scrollBar">
                    @foreach ($categoriesFilter as $name => $listProducts )
                        <livewire:components.dropdown :name="$name" :options="$listProducts" />
                    @endforeach

                    <livewire:components.dropdown-color :options="$colors" />
                    <livewire:components.dropdown-size :options="$sizes" />
                </div>
            </div>
        @endif

        <div class="flex flex-wrap gap-[21px] relative">
            @foreach ($products as $key => $product )
                <livewire:components.card-product wire:key="{{$key}}"
                    :slug="$product->slug"
                    :image="'SOXPro.png'"
                    :name="$product->name"
                    :description="$product->main_desc"
                    :availableColor="$product->has_variants"
                    :price="$product->price"
                />
            @endforeach
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
