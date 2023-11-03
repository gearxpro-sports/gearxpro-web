<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.typekit.net/fgj8iic.css">

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
    <body class="font-sans bg-color-f2f0eb text-gray-900 antialiased">
        <div>
            <livewire:shop.navigation />

            <div>
                {{ $slot }}
            </div>

        </div>
        @stack('scripts')
        @livewireScriptConfig
        @livewire('wire-elements-modal')
    </body>
</html>
