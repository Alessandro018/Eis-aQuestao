<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Eis-a-Questao</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
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
                            <a href="" style="padding-right:10px">Criar prova</a>
                            <a href="{{ action('QuestaoController@create') }}" style="padding-right:10px">Cadastrar questao</a>     
                            <a href="{{ action('QuestaoController@index') }}">Questoes</a>
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
