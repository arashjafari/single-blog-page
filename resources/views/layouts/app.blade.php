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
</head>

<body class="bg-gray-100">

    <div class="h-80 max-w-screen-2xl overflow-hidden">
        <div class="header-bg bottom-0 top-0 opacity-50 h-80 -z-10 fixed -left-2/4 -right-2/4 ease-in-out">
        </div>
        <div class="header-bg header-bg-2 bottom-0 top-0 opacity-50 h-80 -z-10 fixed -left-2/4 -right-2/4 ease-in-out">
        </div>
        <div class="header-bg header-bg-3 bottom-0 top-0 opacity-50 h-80 -z-10 fixed -left-2/4 -right-2/4 ease-in-out">
        </div>
    </div>

    <div class="-mt-80 w-full h-60">
        <div class="w-3/4 mx-auto my-0 shadow-xl">
            <div class="h-52 relative bg-teal-600">

                <h2 class="font-bold text-3xl leading-tight absolute ml-12 top-2/4 text-gray-800">
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
    </div>
</body>

</html>