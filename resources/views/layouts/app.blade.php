<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @livewireStyles
</head>
<body class="font-sans antialiased bg-color-f3f7f9">
<div x-cloak x-data="{ sidebarOpen: false }">
    <div x-show="sidebarOpen" class="relative z-40 xl:hidden" role="dialog" aria-modal="true">
        <div x-show="sidebarOpen" class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

        <div class="fixed inset-0 flex z-40">
            <div x-show="sidebarOpen" class="relative flex-1 flex flex-col max-w-xs w-full bg-white">
                <div x-show="sidebarOpen" x-on:click="sidebarOpen = false" class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button"
                            class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <x-heroicon-o-x-mark class="w-6 h-6 text-white"></x-heroicon-o-x-mark>
                    </button>
                </div>

                <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" class="flex items-center flex-shrink-0 px-4">
                            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="{{ env('APP_NAME') }}"
                                 class="w-36 flex-shrink-0 h-auto">
                        </a>
                    </div>
                    @include('navigation-menu')
                </div>
                {{--                <div class="flex-shrink-0 flex bg-gray-700 p-4">--}}
                {{--                    <a href="{{ route('profile.edit') }}" class="flex-shrink-0 w-full group block">--}}
                {{--                        <div class="flex items-center">--}}
                {{--                            <div>--}}
                {{--                                <div class="inline-block h-8 w-8 bg-red-500 rounded-full"></div>--}}
                {{--                            </div>--}}
                {{--                            <div class="ml-3 w-full flex items-center justify-between">--}}
                {{--                                <div>--}}
                {{--                                    <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>--}}
                {{--                                    <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">Profilo</p>--}}
                {{--                                </div>--}}
                {{--                                <form method="POST" action="{{ route('logout') }}" x-data>--}}
                {{--                                    @csrf--}}
                {{--                                    <x-heroicon-o-arrow-left-on-rectangle @click.prevent="$root.submit();"--}}
                {{--                                                                          class="w-5 h-5 text-white"></x-heroicon-o-arrow-left-on-rectangle>--}}
                {{--                                </form>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            </div>

            <div class="flex-shrink-0 w-14">
                <!-- Force sidebar to shrink to fit close icon -->
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div x-data="{ open: $persist(true) }"
         x-init="$watch('open', (val) => val)">
        <div :class="{'hidden xl:flex xl:fixed xl:inset-y-0' : open}" class="relative xl:w-64 xl:flex-col">
            <div x-on:click="open = true"
                 x-show="!open"
                 class="absolute top-5">
                <div class="text-gray-800 p-1 rounded-r cursor-pointer bg-white hover:bg-gray-100">
                    <x-heroicon-m-chevron-right class="w-4 h-4"></x-heroicon-m-chevron-right>
                </div>
            </div>
            <div x-show="open" class="flex-1 flex flex-col min-h-0 bg-white">
                <div class="flex-1 flex flex-col py-2.5 overflow-y-auto">
                    <div class="flex items-center justify-between mt-2.5">
                        <a href="{{ route('dashboard') }}" class="flex items-center flex-shrink-0 px-4">
                            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="{{ env('APP_NAME') }}"
                                 class="w-36 flex-shrink-0 h-auto">
                        </a>
                        <div x-on:click="open = false"
                             class="text-gray-800 p-1 mr-2 rounded cursor-pointer hover:bg-gray-100">
                            <template x-if="open">
                                <x-heroicon-m-chevron-left class="w-4 h-4"></x-heroicon-m-chevron-left>
                            </template>
                        </div>
                    </div>
                    @include('navigation-menu')
                </div>
                {{--                <div class="flex-shrink-0 flex bg-gray-700 p-4">--}}
                {{--                    <a href="{{ route('profile.edit') }}" class="flex-shrink-0 w-full group block">--}}
                {{--                        <div class="flex items-center">--}}
                {{--                            <div>--}}
                {{--                                <div class="inline-block h-8 w-8 bg-red-500 rounded-full"></div>--}}
                {{--                            </div>--}}
                {{--                            <div class="ml-3 w-full flex items-center justify-between">--}}
                {{--                                <div>--}}
                {{--                                    <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>--}}
                {{--                                    <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">Profilo</p>--}}
                {{--                                </div>--}}
                {{--                                <form method="POST" action="{{ route('logout') }}" x-data>--}}
                {{--                                    @csrf--}}
                {{--                                    <x-heroicon-o-arrow-left-on-rectangle @click.prevent="$root.submit();"--}}
                {{--                                                                          class="w-5 h-5 text-white"></x-heroicon-o-arrow-left-on-rectangle>--}}
                {{--                                </form>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            </div>
        </div>
        <div :class="{'xl:pl-64' : open}" class="flex flex-col flex-1">
            <div
                class="sticky top-0 z-10 xl:hidden px-1 py-2 sm:px-4 bg-color-18181a flex justify-between items-center">
                <button x-on:click="sidebarOpen = true" type="button"
                        class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-color-b6b9bb hover:text-color-f3f7f9 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu -->
                    <x-heroicon-o-bars-3 class="w-6 h-6"></x-heroicon-o-bars-3>
                </button>
                @include('top-bar')
            </div>
            <main class="flex-1">
                {{-- Top Bar --}}
                <div class="hidden xl:block">
                    @include('top-bar')
                </div>
                <div>
                    <!-- Page Heading -->
                    @if (isset($title))
                        <div class="flex items-center justify-between p-8">
                            <h1 class="text-xl font-semibold text-color-18181a">
                                {{ $title }}
                            </h1>
                            @if(isset($actions))
                                <div class="flex items-center space-x-2">
                                    {{ $actions }}
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="p-8 pt-0">
                        <div>
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<x-notification></x-notification>
@stack('scripts')
@livewireScriptConfig
</body>
</html>
