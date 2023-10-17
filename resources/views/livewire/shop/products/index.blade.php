<div class="bg-color-f2f0eb px-[39px] py-[70px]">
    <h1 class="text-[73px] font-bold text-color-18181a leading-[86px]">{{__('shop.products.title')}}</h1>
    <p class="text-[33px] font-semibold text-color-18181a leading-[40px] mt-[14px]">{{__('shop.products.description')}}</p>

    <div class="px-[51px] py-[32px] mt-[38px] flex justify-between items-center">
        <div class="flex">
            <x-custom-button :text="__('shop.products.button_filter')" :icon="'icona_filtri'" :link="'/'" />

            <div class="flex gap-[14px] ml-[30px]">
                @foreach ($categories as $key => $category )
                    <livewire:components.section-button wire:key="{{$category.$key}}" :selected="$selectedCategory" :index="$key" :name="$category" />
                @endforeach
            </div>
        </div>

        <livewire:components.select label="{{__('shop.products.order')}}" :selected="$selectedOrder" :options="$orders" />
    </div>

    <div class="flex flex-wrap justify-between gap-y-6">
        <livewire:components.card-product :name="'SoXPro'" :description="'SOXPro Trekking - Green'" :availableColor="1" :price="'29,00 - € 35,00'" />
        <livewire:components.card-product :name="'SoXPro'" :description="'SOXPro Trekking - Green'" :availableColor="3" :price="'29,00 - € 35,00'" />
        <livewire:components.card-product :name="'SoXPro'" :description="'SOXPro Trekking - Green'" :availableColor="3" :price="'29,00 - € 35,00'" />
        <livewire:components.card-product :name="'SoXPro'" :description="'SOXPro Trekking - Green'" :availableColor="3" :price="'29,00 - € 35,00'" />
        <livewire:components.card-product :name="'SoXPro'" :description="'SOXPro Trekking - Green'" :availableColor="3" :price="'29,00 - € 35,00'" />
        <livewire:components.card-product :name="'SoXPro'" :description="'SOXPro Trekking - Green'" :availableColor="3" :price="'29,00 - € 35,00'" />
    </div>
</div>
