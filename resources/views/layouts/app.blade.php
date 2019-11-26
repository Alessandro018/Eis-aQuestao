<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Eis a Questão</title>
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light nav-fill border border-left rounded">
            <div class="w-25 navbar-brand">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="img-logo" src="{{ asset('img/logo.png') }}">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse w-25 order-3 dual-collapse2">

                <ul class="navbar-nav nav-header-pills ml-auto">

                    @if(Auth::check())
                        @if (Route::has('questoes.index'))
                            <li class="nav-item"><a class="nav-link text-dark btn-light" href="{{ action('QuestaoController@index') }}">Questões</a></li>
                            <li class="nav-item"><a class="nav-link text-dark btn-light" href="{{ action('ProvaController@index') }}">Provas</a></li>
                            <li class="nav-item"><a class="nav-link text-dark btn-light" href="{{ action('TurmaController@index') }}">Turmas</a></li>
                        @endif
                    @endif

                    @if(Auth::check() && Route::has('questoes.index'))
                        <li class="nav-item"><a class="nav-link text-dark btn-light" href="{{ route('logout') }}">Sair</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link text-dark btn-orange" href="{{ route('login') }}">Entrar</a></li>
                    @endif
                </ul>
            </div>
        </nav>

        <main class="py-4" style="width: 90%; margin: auto;">
            @yield('content')
        </main>
    </div>
    <footer class="mt-5" id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5 class="link-color">Iniciar</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5 class="link-color">Sobre nós</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5 class="link-color">Suporte</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 info">
                    <h5 class="link-color">Informações</h5>
                    <p>Este sistema tem como propósito servir como uma plataforma para que os professores possam criar questões baseadas em níveis de dificuldades e gerar provas de forma aleatória.</p>
                </div>
            </div>
        </div>
        <div class="second-bar">
           <div class="container">
                <div class="logo">
                    <a href="#"><img class="w-25" src="">LOGO</a>
                </div>
                <div class="social-icons">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
</body>
</html>
