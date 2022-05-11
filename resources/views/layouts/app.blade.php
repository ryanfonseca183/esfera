<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel')  }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <header class="d-flex justify-content-center align-items-center mb-5 bg-white shadow-sm py-3">
        <img src="{{ asset('img/logotipo.png') }}" alt="Página inicial" style="height: 75px">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <a href="{{ route('empresas.index') }}" class="nav-link fs-5 p-2">Inicio</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="/logout">
                    @csrf 
                    <button type="submit" class="btn nav-link p-2 fs-5 ms-2">Sair</button>
                </form>
            </li>
        </ul>
    </header>
    <main class="container py-4">
        
        @yield('content')
    </main>
    
    @if(session()->has('success') || session()->has('error'))
        <div class="toast-container position-fixed p-3 bottom-0 end-0">
            <div class="toast align-items-center text-white @if(session()->has('success')) bg-success @else bg-danger @endif border-0 b" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                <div class="toast-body">
                    {{ session()->get('success', session()->get('error')) }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
