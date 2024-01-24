<footer class="bg-color-010101" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div>
                <img class="h-7 invert" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="{{ env('APP_NAME') }}">
                <div class="text-sm text-white mt-6">
                    <p>Gearxpro Sports co. Limited</p>
                    <p>Flat 7, Blk b, 23/f Hoover Industrial Building, Kwai Cheon</p>
                    <p>SK4120284663</p>
                </div>
            </div>
            <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                <div class="col-span-2 grid grid-cols-2 gap-8 md:col-span-1">
                    <div>
                        <h3 class="text-sm font-semibold leading-6 text-white uppercase">Products</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('shop.index', ['country_code' => session('country_code'), 'categoryId' => $category->id]) }}" class="text-sm leading-6 text-white">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-0">
                        <h3 class="text-sm font-semibold leading-6 text-white uppercase">My account</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            @foreach($account as $item)
                                <li>
                                    <a href="{{ route($item['route'], ['country_code' => session('country_code')]) }}" class="text-sm leading-6 text-white">{{ $item['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-span-2 md:col-span-1 md:grid md:grid-cols-1 md:gap-8 mt-8 md:mt-0">
                    <div>
                        <h3 class="text-sm font-semibold leading-6 text-white uppercase">Distributors</h3>
                        <div class="mt-6">
                            <p class="text-white text-sm">Are you a distributor? Contact us</p>
                            <a class="text-white text-sm mt-6 block underline" href="mailto:distributors@gearxpro-sports.com">distributors@gearxpro-sports.com</a>
                        </div>
                        <div class="flex space-x-6 mt-6">
                            <a href="https://www.facebook.com/gearxprosportsofficial">
                                <x-icons class="w-5 h-5 text-white hover:text-white/80" name="facebook" />
                            </a>
                            <a href="https://www.linkedin.com/company/gearxpro-sports/">
                                <x-icons class="w-5 h-5 text-white hover:text-white/80" name="linkedin" />
                            </a>
                            <a href="https://www.youtube.com/@gearxprosports5301">
                                <x-icons class="w-5 h-5 text-white hover:text-white/80" name="youTube" />
                            </a>
                            <a href="https://www.instagram.com/gearxpro_sports/">
                                <x-icons class="w-5 h-5 text-white hover:text-white/80" name="instagram" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-20 md:flex md:items-center md:justify-between">
            <p class="mt-8 mb-4 text-center text-xs leading-5 text-white md:mb-0 md:mt-0">Copyright &copy; {{ now()->format('Y') }}  |  GEARXPRO SPORTS CO. LIMITED</p>
            <div class="flex justify-center md:justify-end gap-[25px] text-xs font-medium text-white whitespace-nowrap">
                <a href="">Privacy policy</a>
                <a href="">Returns & refounds</a>
                <a href="">Cookie</a>
            </div>
        </div>
    </div>
</footer>
