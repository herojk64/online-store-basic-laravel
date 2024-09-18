<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>{{ config('app.name') }}</title>

    <!-- Vite CSS -->
    @vite(['resources/css/app.css','resources/js/app.js'])

    @stack('styles')
    @livewireStyles

</head>
<body style="min-height: 100svh;display: grid;grid-auto-rows: auto 1fr auto;">
<x-partials._header />

<main>
    {{ $slot }} <!-- Content injected here -->
</main>

<x-partials._footer />
<x-toaster-hub />
<!-- Vite Scripts -->
@livewireScripts
@stack('js')
</body>
</html>
