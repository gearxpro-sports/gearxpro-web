@props(['text', 'icon', 'link', 'width' => ''])

<a href="{{ $link }}" @class(["w-[224px] h-[48px] bg-white rounded-md flex justify-between items-center border border-black hover:border-white group", $width])>
    <div class="h-full flex items-center grow relative group-hover:text-white">
        <span class="z-10 ml-5 xl:ml-9 text-[15px] font-semibold">{{$text}}</span>
        <div class="h-full absolute top-0 w-0 bg-black group-hover:animate-line group-hover:w-full rounded-l-md"></div>
    </div>
    <div class="h-full border-l border-black group-hover:border-white w-[47px] flex items-center justify-center group-hover:bg-black rounded-r-md">
        <img class="group-hover:invert" src="{{ Vite::asset('resources/images/icons/'.$icon.'.svg')}}" alt="">
    </div>
</a>
