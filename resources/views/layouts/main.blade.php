<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    
</head>
<body>
    <div id="app" class="d-flex">
        @yield('content')
    </div>

</div>


    {{-- <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=ebb03979-afe5-486a-a1d3-3a34d598f19c" def></script> --}}

</body>
</html>
