<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Single page blog') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <x-fav-icon />
</head>

<body class="bg-gray-100 font-serif">

    <div class="h-40 md:h-80 max-w-screen-2xl overflow-hidden">
        <div class="header-bg bottom-0 top-0 opacity-50 h-40 md:h-80 -z-10 fixed -left-2/4 -right-2/4 ease-in-out">
        </div>
        <div
            class="header-bg header-bg-2 bottom-0 top-0 opacity-50 h-40 md:h-80 -z-10 fixed -left-2/4 -right-2/4 ease-in-out">
        </div>
        <div
            class="header-bg header-bg-3 bottom-0 top-0 opacity-50 h-40 md:h-80 -z-10 fixed -left-2/4 -right-2/4 ease-in-out">
        </div>
    </div>

    <div class="-mt-40 md:-mt-80 w-full h-60">
        <div id="app">
            <router-view />
        </div>
    </div>
</body>

</html>