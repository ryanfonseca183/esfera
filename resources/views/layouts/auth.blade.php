<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>

    </style>
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="row flex-column vh-100 justify-content-center align-items-center">
                <div class="col-auto">
                    <img src="{{ asset('img/logotipo.png') }}" alt="" class="mb-3">
                </div>
                <div class="col-lg-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
