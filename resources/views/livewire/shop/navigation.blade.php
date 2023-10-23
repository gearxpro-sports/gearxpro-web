<nav>
    <!-- Header -->
    <div class="h-[36px] bg-color-18181a flex justify-center items-center border-b-color-707070">
        <p class="text-white font-medium text-[13px] leading-4">
            {{ __('shop.header')}}
        </p>
    </div>

    <!-- Navigation Menu -->
    <div class="mx-auto px-[39px] bg-white">
        <div class="flex justify-between items-center h-[60px]">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('home') }}">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="flex">
                <div class="hidden space-x-10 sm:-my-px sm:ml-10 sm:flex items-center">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('shop.navigation.home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('shop.index')" :active="request()->routeIs('shop.*')">
                        {{ __('shop.navigation.shop') }}
                    </x-nav-link>

                    <x-custom-dropdown title="{{ __('shop.navigation.about_us') }}" :options='["opzione 1", "opzione 2", "opzione 3"]'/>

                    <x-nav-link :href="route('home')" :active="request()->routeIs('dashboard')">
                        {{ __('shop.navigation.journal') }}
                    </x-nav-link>

                    <x-custom-dropdown title="{{ __('shop.navigation.assistance') }}" :options='["opzione 1", "opzione 2", "opzione 3"]'/>
                </div>
            </div>

            {{-- Action --}}
            <div class="flex items-center space-x-[26px]">
                <div class="flex space-x-[22px]">
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                {{$user->firstname}}
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <img src="{{ Vite::asset('resources/images/icons/account.svg')}}" alt="">
                            </a>
                        @endauth
                    </div>
                    <div class="relative">
                        @if ($products)
                            <div class="absolute top-[-9px] right-[-13px] w-5 h-5 bg-color-ff7f6e rounded-full text-white flex items-center justify-center text-[11px] font-semibold leading-[14px]">{{$products}}</div>
                        @endif
                        <img src="{{ Vite::asset('resources/images/icons/shopping-bag.svg')}}" alt="">
                    </div>
                </div>

                <x-drop-language current="ita" :options='["eng", "fra", "deu", "esp"]'/>
            </div>
        </div>
    </div>
</nav>
