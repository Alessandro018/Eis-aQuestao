<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Eis-a-Questao</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Eis-a-Questao
                </a>
                <div class="flex-center position-ref full-height">
                    <div class="top-right links" style="float:right;padding: 10px;">
                        @if (Route::has('questoes.index'))
                            <a href="{{ route('questoes.create') }}" style="padding-right:10px">Cadastrar questao</a>
                        
                            <a href="{{ route('questoes.index') }}">Questoes</a>
                        @endif
                    </div>
                </div>
        </nav>

        <main class="py-4" style="width: 90%; margin: auto;">
            @yield('content')
        </main>
    </div>
</body>
</html>
