<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')

        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="flex flex-col justify-center min-h-screen bg-gray-50">
        <div class="flex w-full">
            @include('layouts.navbar')
        </div>

        <div class="flex-grow items-center justify-center bg-gray-200">
            <div class="flex flex-col justify-around">
                @yield('body')
            </div>
        </div>
        <div class="bg-black flex items-center justify-center">
            <div class="flex w-full justify-around text-white py-4 px-8 justify-between">
                <div class="ml-4 text-left">
                    © 2021 Todos los Derechos Reservados.
                </div>

                <div class="mr-4 text-right">
                    Matagalpa, Nicaragua.
                </div>
            </div>
        </div>
    </div>


    @livewireScripts
</body>

</html>
