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


    <div class="w-3/4 mx-auto my-0 shadow-xl">
        <div class="h-52 relative bg-neutral-400">

            <h2 class="font-bold text-3xl leading-tight absolute ml-12 top-2/4">
                {{ $header ?? '' }}
            </h2>
        </div>

        <div class="bg-white">
            <div class="px-24 py-6 text-justify">
                {{ $content ?? '' }}
            </div>
        </div>
    </div>

    <div id="app">
        {{ $slot }}
    </div>
</body>

</html>