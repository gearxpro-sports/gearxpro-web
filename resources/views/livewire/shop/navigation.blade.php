<nav x-data="{ open: false }" class="z-50 w-full sticky top-0 xl:relative">
    <!-- Header -->
    <div class="h-[36px] bg-color-19181d flex justify-center items-center border-b-color-707070">
        <p class="text-white font-medium text-[13px] leading-4">
            {{ __('shop.header')}}
        </p>
    </div>

    <!-- Navigation Menu -->
    <div class="mx-auto px-[16px] xl:px-[39px] bg-white">
        <div class="flex justify-between items-center h-[70px] xl:h-[60px]">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('home', ['country_code' => session('country_code')]) }}">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="" class="w-[122px] xl:w-auto">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden xl:flex">
                <div class="hidden space-x-10 sm:-my-px sm:ml-10 sm:flex items-center">
                    <x-nav-link :href="route('home', ['country_code' => session('country_code')])" :active="request()->routeIs('home')">
                        {{ __('shop.navigation.home') }}
                    </x-nav-link>

                    <x-nav-link :href="route('shop.index', ['country_code' => session('country_code')])" :active="request()->routeIs('shop.*')">
                        {{ __('shop.navigation.shop') }}
                    </x-nav-link>

                    <x-nav-link :href="route('about_us.whoWeAre', ['country_code' => session('country_code')])" :active="request()->routeIs('about_us.whoWeAre')">
                        {{ __('shop.navigation.about_us') }}
                    </x-nav-link>

                    <x-nav-link :href="route('about_us.values', ['country_code' => session('country_code')])" :active="request()->routeIs('about_us.values')">
                        {{ __('shop.navigation.values') }}
                    </x-nav-link>

                    <x-nav-link :href="route('about_us.development', ['country_code' => session('country_code')])" :active="request()->routeIs('about_us.development')">
                        {{ __('shop.navigation.production') }}
                    </x-nav-link>

                    {{-- <x-custom-dropdown title="{{ __('shop.navigation.about_us') }}" :active="request()->routeIs('about_us.*')" :options="$about_us"/>--}}

                    <x-nav-link :href="route('home', ['country_code' => session('country_code')])" :active="request()->routeIs('dashboard')">
                        {{ __('shop.navigation.journal') }}
                    </x-nav-link>

                    {{--<x-custom-dropdown title="{{ __('shop.navigation.assistance') }}" :active="request()->routeIs('assistance.*')" :options="[]"/>--}}
                </div>
            </div>

            {{-- Action button --}}
            <div class="flex items-center gap-[27px]">
                <div class="flex items-center space-x-[27px]">
                    {{-- user and cart --}}
                    <div :class="{'hidden': open, 'block': ! open}" class="flex items-center space-x-[27px]">
                        <div class="flex space-x-[22px]">
                            <div>
                                @auth
                                    <div class="relative">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="flex flex-col items-start">
                                                    <span class="hidden xl:block text-lg font-medium text-color-b6b9bb">{{ Auth::user()->fullname }}</span>
                                                    <x-icons class="xl:hidden" name="account" />
                                                    {{-- <span class="xl:hidden text-lg font-medium text-color-b6b9bb">{{ Auth::user()->initial_letters }}</span> --}}
                                                </button>
                                            </x-slot>

                                            <x-slot name="content">
                                                @hasanyrole([App\Models\User::RESELLER, App\Models\User::SUPERADMIN])
                                                <x-dropdown-link href="{{ route('dashboard') }}">
                                                    {{ __('dashboard.title') }}
                                                </x-dropdown-link>
                                                @endrole

                                                @if (request()->route()->getName() != 'customer.profile')
                                                    <x-dropdown-link href="{{ route('customer.profile') }}">
                                                        {{ __('Profile') }}
                                                    </x-dropdown-link>
                                                @else
                                                    <x-dropdown-link href="{{ route('home', ['country_code' => session('country_code')]) }}">
                                                        {{ __('Home') }}
                                                    </x-dropdown-link>
                                                @endif

                                                <div class="border-t border-gray-100"></div>

                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}" x-data>
                                                    @csrf

                                                    <x-dropdown-link href="{{ route('logout') }}"
                                                                    @click.prevent="$root.submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                        <x-icons name="account" />
                                    </a>
                                @endauth
                            </div>
                        </div>

                        <a href="{{ route('shop.cart', ['country_code' => session('country_code')]) }}" class="relative">
                            @if ($cart?->items->count() > 0)
                                <div
                                    class="absolute top-[-9px] right-[-13px] w-5 h-5 bg-color-ff7f6e rounded-full text-white flex items-center justify-center text-[11px] font-semibold leading-[14px]">{{$cart->items->count()}}</div>
                            @endif
                            <x-icons name="shopping-bag" />
                        </a>
                    </div>

                    {{-- country and language --}}
                    <div class="hidden xl:flex items-center gap-[27px]">
                        @if(!auth()->check() || auth()->user()->hasRole(\App\Models\User::SUPERADMIN))
                        <a href="{{ route('splash') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-color-18181a">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.893 13.393l-1.135-1.135a2.252 2.252 0 01-.421-.585l-1.08-2.16a.414.414 0 00-.663-.107.827.827 0 01-.812.21l-1.273-.363a.89.89 0 00-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 01-1.81 1.025 1.055 1.055 0 01-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 01-1.383-2.46l.007-.042a2.25 2.25 0 01.29-.787l.09-.15a2.25 2.25 0 012.37-1.048l1.178.236a1.125 1.125 0 001.302-.795l.208-.73a1.125 1.125 0 00-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 01-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 01-1.458-1.137l1.411-2.353a2.25 2.25 0 00.286-.76m11.928 9.869A9 9 0 008.965 3.525m11.928 9.868A9 9 0 118.965 3.525" />
                            </svg>
                        </a>
                        @endif
                        <livewire:shop.components.language-switch />
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center xl:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none focus:bg-none transition duration-150 ease-in-out">
                        <div :class="{'hidden': open, 'inline-flex': ! open }">
                            <x-icons name="hamburger" />
                        </div>
                        <div x-cloak :class="{'hidden': ! open, 'inline-flex': open }">
                            <x-icons name="x-close" />
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div x-cloak
        :class="{'fixed': open, 'hidden': ! open}"
        class="z-[100] h-[100vh] w-full max-w-[100vw] px-[16px] inset-0 overflow-auto scrollBar top-[96px] left-0 bg-white"
    >
        <div class="mt-5 mb-10">
            @auth
                <span class="text-lg font-medium text-color-b6b9bb">{{ Auth::user()->fullname }}</span>
            @else
                <x-custom-button :text="__('shop.navigation.login_register')" :icon="'account'" :link="'/shop/checkout'" width="!w-full" />
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="flex flex-col gap-6">
            <a href="{{ route('home', ['country_code' => session('country_code')]) }}" class="text-[17px] font-semibold leading-[20px] text-color-18181a">{{ __('shop.navigation.home') }}</a>
            <a href="{{ route('shop.index', ['country_code' => session('country_code')]) }}" class="text-[17px] font-semibold leading-[20px] text-color-18181a">{{ __('shop.navigation.shop') }}</a>
            <x-dropdown-mobile title="{{ __('shop.navigation.about_us') }}" :options="$about_us" />
            <a href="{{ route('shop.index', ['country_code' => session('country_code')]) }}" class="text-[17px] font-semibold leading-[20px] text-color-18181a">{{ __('shop.navigation.journal') }}</a>
            <x-dropdown-mobile title="{{ __('shop.navigation.assistance') }}" :options="[]" />
            <x-dropdown-mobile type="select" title="{{ session()->get('language', app()->getLocale()) }}" :options="$languages" />
         </div>
    </div>
</nav>
