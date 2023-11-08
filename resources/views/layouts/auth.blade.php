<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') - {{ config('app.name', 'GearXPro') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/auth.css', 'resources/js/auth.js'])
</head>
<body class="antialiased text-color-6c757d">
<div class="grid grid-cols-1 bg-white h-full min-h-screen lg:grid-cols-3 lg:bg-color-dee2e6 2xl:grid-cols-4">
    <div class="bg-white flex w-full max-w-xl mx-auto items-center justify-center">
        <div class="w-full p-10 2xl:p-20">
            <x-auth-session-status class="mb-12 text-center" :status="session('status')"/>
            <x-application-logo class="mx-auto mb-12"/>
            @yield('content')
        </div>
    </div>
    <div class="bg-cover bg-right hidden lg:block lg:col-span-2 2xl:col-span-3"
         style="background-image: url({{ Vite::asset('resources/images/gear/slide_jumbotron1.jpg')}})"></div>
</div>
</body>
</html>
