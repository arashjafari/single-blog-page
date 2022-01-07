<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aloware - Single page blog') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-100">

    <header class="text-center p-7">
        <h2 class="font-extrabold text-3xl text-gray-800 leading-tight">
            {{ $header ?? '' }}
        </h2>
    </header>

    <div id="app">
        {{ $slot }}
    </div>
</body>

</html>