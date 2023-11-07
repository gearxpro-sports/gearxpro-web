<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>
		{{ $title ?? env('APP_NAME') }}
	</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
{{ $slot }}

@livewireScriptConfig
</body>
