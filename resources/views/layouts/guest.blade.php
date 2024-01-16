<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-favicon />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css"/>

    <!-- Scripts -->
    @vite(
        [
            'resources/css/shop.css',
            'resources/css/owl.carousel.css',
            'resources/css/pagepiling.min.css',
            'resources/js/app.js',
            'resources/js/owl.carousel.min.js',
        ]
    )
    @stack('styles')
    @livewireStyles
    @stack('head_scripts')
</head>
<body class="text-gray-900 antialiased bg-color-010101">
<div>
    <livewire:shop.navigation />

    <div>
        {{ $slot }}
    </div>

    <livewire:shop.section.footer />
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
<x-notification></x-notification>
@livewireScriptConfig
@livewire('wire-elements-modal')
@stack('scripts')

<script type="text/javascript">
    window.omnisend = window.omnisend || [];
    omnisend.push(["accountID", '{{ env('OMNISEND_STORE_ID') }}']);
    omnisend.push(["track", "$pageViewed"]);
    !function(){var e=document.createElement("script");
        e.type="text/javascript",e.async=!0,
            e.src="https://omnisnippet1.com/inshop/launcher-v2.js";
        var t=document.getElementsByTagName("script")[0];
        t.parentNode.insertBefore(e,t)}();
</script>
</body>
</html>
