<div class="bg-black w-full h-[984px] bg-texture grid grid-cols-12 grid-rows-6 gap-[30px]">

    <div class="h-fit col-start-2 col-span-6 row-start-2">
        <h1 class="text-[73px] font-bold text-white leading-[86px] m-0 p-0">{{ __('shop.jumbotron.title') }}</h1>
        <p class="text-[21px] text-white w-2/3 my-[40px]">{{ __('shop.jumbotron.description') }}</p>
        <x-custom-button :text="__('shop.jumbotron.button')" :icon="'double_arrow_right'" :link="'/'" />
    </div>

    <div class="col-start-1 col-span-12 row-start-1">
        <img src="{{ Vite::asset('resources/images/product.svg')}}" alt="">
    </div>
</div>
