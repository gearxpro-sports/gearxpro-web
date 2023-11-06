<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" href="https://use.typekit.net/fgj8iic.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css"/>

    <!-- Scripts -->
    @vite(
        [
            'resources/css/shop.css',
            'resources/css/owl.carousel.css',
            'resources/js/app.js',
            'resources/js/owl.carousel.min.js',
        ]
    )
    @stack('styles')
    @livewireStyles
</head>
<body class="font-sans text-gray-900 antialiased">
<div>
    <livewire:shop.navigation/>

    <div>
        {{ $slot }}
    </div>

    <x-section.footer/>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<x-notification></x-notification>
@stack('scripts')
@livewireScriptConfig
@livewire('wire-elements-modal')
</body>
</html>
