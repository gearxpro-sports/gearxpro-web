<div class="bg-color-f2f0eb py-8 h-fit xl:px-10 xl:py-20">

    <div id="title" class="px-4 xl:px-0">
        <h1 class="text-3xl xl:text-7xl font-bold text-color-18181a">{{__('shop.products.title')}}</h1>
        <p class="text-sm xl:text-4xl font-semibold text-color-18181a mt-3.5 xl:mb-9">{{__('shop.products.description')}}</p>
    </div>

    <div>
        <div class="lg:hidden mt-4 px-4">
            {{-- Mobile Filters --}}
            <x-slide-over>
                <x-slot:trigger>
                    <button
                        @class([
                            'px-4 py-2 font-semibold rounded-md bg-color-18181a text-white text-sm hover:opacity-80',
                        ])
                    >
                        {{ __('shop.products.button_filter_on') }}
                    </button>
                </x-slot:trigger>
                <div>
                    <div class="flex items-center justify-between">
                        <h4 class="text-xl font-semibold text-color-18181a ">{{ $products->count() }} {{ trans_choice('shop.products.results', $products->count()) }}</h4>
                        @if ($selectedCategory || $selectedColorId || $selectedSizeId)
                            <div wire:click.prevent="clearFilters"
                                 class="flex items-center space-x-1 text-xs font-medium text-color-6c757d hover:cursor-pointer">
                                <span>{{ __('shop.products.remove_filters') }}</span>
                                <x-icons name="x-close" class="text-color-6c757d w-1.5 h-1.5"></x-icons>
                            </div>
                        @endif
                    </div>
                    <!-- Mobile Categories -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root">
                            <button x-on:click="open = !open" type="button"
                                    class="flex w-full items-center justify-between py-3 text-sm text-gray-400 hover:text-gray-500">
                                <span class="font-medium text-gray-900">{{__('shop.products.category')}}</span>
                                <div class="ml-6 flex items-center">
                                    <x-icons name="plus" x-show="!open" class="h-3 w-3"></x-icons>
                                    <x-icons name="minus" x-show="open" x-cloak class="h-3 w-3"></x-icons>
                                </div>
                            </button>
                        </h3>
                        <div x-show="open" x-cloak class="pt-4" id="filter-category">
                            <div class="flex flex-wrap items-center gap-4">
                                @foreach ($categories as $key => $category )
                                    <button wire:key="cat_{{ $key}}"
                                            wire:click="selectCategory({{ $category->id }})"
                                        @class([
                                        'inline-flex items-center rounded-md bg-color-18181a px-2 py-1 text-white text-sm font-medium ring-1 ring-inset ring-gray-500/10 hover:opacity-80',
                                         'bg-white !text-color-18181a hover:!opacity-100' => $selectedCategory && ($selectedCategory->id === $category->id || $selectedCategory->parent_id === $category->id)
                                    ])
                                    >
                                        {{ $category->name }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Colors -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root">
                            <button x-on:click="open = !open" type="button"
                                    class="flex w-full items-center justify-between py-3 text-sm text-gray-400 hover:text-gray-500">
                                <span class="font-medium text-gray-900">{{__('shop.products.color')}}</span>
                                <div class="ml-6 flex items-center">
                                    <x-icons name="plus" x-show="!open" class="h-3 w-3"></x-icons>
                                    <x-icons name="minus" x-show="open" x-cloak class="h-3 w-3"></x-icons>
                                </div>
                            </button>
                        </h3>
                        <div x-show="open" x-cloak class="pt-4" id="filter-color">
                            <div class="flex flex-wrap items-center gap-4">
                                @foreach ($productAttributes[2]->first()->terms->pluck('color', 'id') as $id => $color )
                                    @php
                                        $colors = explode(',', $color);
                                    @endphp
                                    @if(count($colors) > 1)
                                        <button
                                            class="cursor-pointer h-8 w-8 rounded-full p-0.5 focus:outline-none ring-transparent ring ring-offset-2 ring-offset-color-f2f0eb"
                                            @style([
                                                "background: linear-gradient(135deg, $colors[0] 50%, $colors[1] 50%)",
                                                '--tw-ring-color: '.$colors[0] => $id === $selectedColorId
                                            ])
                                            wire:click="selectColors('{{ $id }}')"
                                        >
                                        </button>
                                    @else
                                        <button
                                            class="cursor-pointer h-8 w-8 rounded-full p-0.5 focus:outline-none ring-transparent ring ring-offset-2 ring-offset-color-f2f0eb"
                                            @style([
                                                'background-color : '.$color,
                                                '--tw-ring-color: '.$color => $id === $selectedColorId
                                            ])
                                            wire:click="selectColors('{{ $id }}')"
                                        >
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Sizes -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root">
                            <!-- Expand/collapse section button -->
                            <button x-on:click="open = !open" type="button"
                                    class="flex w-full items-center justify-between py-3 text-sm text-gray-400 hover:text-gray-500">
                                <span class="font-medium text-gray-900">{{__('shop.products.size')}}</span>
                                <div class="ml-6 flex items-center">
                                    <x-icons name="plus" x-show="!open" class="h-3 w-3"></x-icons>
                                    <x-icons name="minus" x-show="open" x-cloak class="h-3 w-3"></x-icons>
                                </div>
                            </button>
                        </h3>
                        <div x-show="open" x-cloak class="pt-4" id="filter-size">
                            <div class="flex flex-wrap items-center gap-4">
                                <div class="flex flex-wrap items-center gap-4 px-1 py-5">
                                    @foreach ($productAttributes[3]->first()->terms->pluck('value', 'id') as $id => $size )
                                        <button
                                            wire:click="selectSizes('{{ $id }}')"
                                            @class([
                                                'w-12 h-11 bg-color-edebe5 border border-color-e0e0df rounded flex items-center justify-center text-sm font-medium uppercase cursor-pointer hover:bg-color-18181a hover:text-white',
                                                '!bg-color-18181a !text-white' => $id === $selectedSizeId
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
            </x-slide-over>
        </div>
        <div class="hidden lg:block lg:mt-4 md:px-4 xl:px-0">
            @foreach ($categories as $key => $category )
                <button
                    wire:key="cat_{{ $key}}"
                    wire:click="selectCategory({{ $category->id }})"
                    @class([
                        'px-4 py-2 font-semibold rounded-md bg-color-18181a text-white text-sm hover:opacity-80',
                         'bg-white !text-color-18181a hover:!opacity-100' => $selectedCategory && ($selectedCategory->id === $category->id || $selectedCategory->parent_id === $category->id)
                    ])
                >
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
        <section class="pb-24 pt-6">
            <div class="flex gap-0 xl:gap-8">
                <!-- Desktop Filters -->
                <div class="hidden pl-4 w-[320px] shrink-0 lg:block xl:pl-0">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xl font-semibold text-color-18181a ">{{ $products->count() }} {{ trans_choice('shop.products.results', $products->count()) }}</h4>
                        @if ($selectedCategory || $selectedColorId || $selectedSizeId)
                            <div wire:click.prevent="clearFilters"
                                 class="flex items-center space-x-1 text-xs font-medium text-color-6c757d hover:cursor-pointer">
                                <span>{{ __('shop.products.remove_filters') }}</span>
                                <x-icons name="x-close" class="text-color-6c757d w-1.5 h-1.5"></x-icons>
                            </div>
                        @endif
                    </div>
                    <!-- Desktop Colors -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root">
                            <button x-on:click="open = !open" type="button"
                                    class="flex w-full items-center justify-between py-3 text-sm text-gray-400 hover:text-gray-500">
                                <span class="font-medium text-gray-900">{{__('shop.products.color')}}</span>
                                <div class="ml-6 flex items-center">
                                    <x-icons name="plus" x-show="!open" class="h-3 w-3"></x-icons>
                                    <x-icons name="minus" x-show="open" x-cloak class="h-3 w-3"></x-icons>
                                </div>
                            </button>
                        </h3>
                        <div x-show="open" x-cloak class="pt-4" id="filter-color">
                            <div class="flex flex-wrap items-center gap-4">
                                @foreach ($productAttributes[2]->first()->terms->pluck('color', 'id') as $id => $color )
                                    @php
                                        $colors = explode(',', $color);
                                    @endphp
                                    @if(count($colors) > 1)
                                        <button
                                            class="cursor-pointer h-8 w-8 rounded-full p-0.5 focus:outline-none ring-transparent ring ring-offset-2 ring-offset-color-f2f0eb"
                                            @style([
                                                "background: linear-gradient(135deg, $colors[0] 50%, $colors[1] 50%)",
                                                '--tw-ring-color: '.$colors[0] => $id === $selectedColorId
                                            ])
                                            wire:click="selectColors('{{ $id }}')"
                                        >
                                        </button>
                                    @else
                                        <button
                                            class="cursor-pointer h-8 w-8 rounded-full p-0.5 focus:outline-none ring-transparent ring ring-offset-2 ring-offset-color-f2f0eb"
                                            @style([
                                                'background-color : '.$color,
                                                '--tw-ring-color: '.$color => $id === $selectedColorId
                                            ])
                                            wire:click="selectColors('{{ $id }}')"
                                        >
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Desktop Sizes -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
                        <h3 class="-my-3 flow-root">
                            <!-- Expand/collapse section button -->
                            <button x-on:click="open = !open" type="button"
                                    class="flex w-full items-center justify-between py-3 text-sm text-gray-400 hover:text-gray-500">
                                <span class="font-medium text-gray-900">{{__('shop.products.size')}}</span>
                                <div class="ml-6 flex items-center">
                                    <x-icons name="plus" x-show="!open" class="h-3 w-3"></x-icons>
                                    <x-icons name="minus" x-show="open" x-cloak class="h-3 w-3"></x-icons>
                                </div>
                            </button>
                        </h3>
                        <div x-show="open" x-cloak class="pt-4" id="filter-size">
                            <div class="flex flex-wrap items-center gap-4">
                                <div class="flex flex-wrap items-center gap-4 px-1 py-5">
                                    @foreach ($productAttributes[3]->first()->terms->pluck('value', 'id') as $id => $size )
                                        <button
                                            wire:click="selectSizes('{{ $id }}')"
                                            @class([
                                                'w-12 h-11 bg-color-edebe5 border border-color-e0e0df rounded flex items-center justify-center text-sm font-medium uppercase cursor-pointer hover:bg-color-18181a hover:text-white',
                                                '!bg-color-18181a !text-white' => $id === $selectedSizeId
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

                <!-- Product grid -->
                <div
                    id="cards" @class(["grid grid-cols-2 gap-3 w-full px-4 xl:px-0 sm:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-4"])>
                    @forelse ($products as $product )
                        <livewire:components.card-product
                            wire:key="prod_{{ $product->id }}"
                            :product="$product"
                            :availableColors="$productColors[$product->id] ?? []"/>
                    @empty
                        <div class="text-center py-7 col-span-full">
                            <h5 class="text-xl font-semibold">{{ __('shop.products.not_found') }}</h5>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</div>
