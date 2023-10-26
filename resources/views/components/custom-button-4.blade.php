@props(['text', 'icon', 'width' => ''])

<button type="submit"
    @class(["h-[48px] bg-color-ff7f6e rounded-md flex justify-between items-center border border-transparent hover:border-black group", $width])
>
    <div class="h-full flex items-center grow relative text-white group-hover:text-color-18181a">
        <span class="z-10 text-[15px] font-semibold pl-5">{{$text}}</span>
        <div class="h-full absolute top-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-l-md"></div>
    </div>
    <div class="h-full border-l border-white group-hover:border-black w-[47px] flex items-center justify-center group-hover:bg-white rounded-r-md">
        <img class="group-hover:invert" src="{{ Vite::asset('resources/images/icons/'.$icon.'.svg')}}" alt="">
    </div>
</button>
