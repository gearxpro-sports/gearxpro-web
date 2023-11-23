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
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(
            [
                'resources/css/shop.css',
                'resources/js/app.js',
            ]
        )

        @stack('styles')
        @livewireStyles
    </head>
    <body class="antialiased xl:h-[100vh] bg-color-f2f0eb">
        <livewire:shop.header-checkout />

        <div class="flex justify-center px-4 xl:px-0 mt-32">
            <div class="w-[594px] xl:h-[580px] mt-20 xl:mt-0 bg-color-edebe5 py-10 xl:py-0 xl:pt-[70px] px-4 xl:px-[88px] flex flex-col items-center rounded-md">
                <x-icons class="w-20 h-20 text-color-0c9d87 " name="check_confirm" />
                <h2 class="text-xl xl:text-[33px] font-semibold leading-[40px] text-color-18181a mt-10 xl:mt-0 mb-[25px]">{{ __('shop.confirm.title') }}</h2>
                <p class="text-sm font-medium leading-[21px] text-color-6c757d mb-[60px] text-center">{{ __('shop.confirm.message') }}</p>
                <a href="/shop" class="relative flex items-center justify-center h-[48px] w-fit px-[40px] rounded-md bg-color-18181a border border-color-18181a group">
                    <span class="z-10 text-[15px] font-semibold text-white leading-[19px] group-hover:text-color-18181a">{{ __('shop.confirm.button') }}</span>
                    <div class="h-full absolute top-0 left-0 w-0 bg-white group-hover:animate-line group-hover:w-full rounded-md"></div>
                </a>
            </div>
        </div>
        @stack('scripts')
        @livewireScriptConfig
        @livewire('wire-elements-modal')
    </body>
</html>

