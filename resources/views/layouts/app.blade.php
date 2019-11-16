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
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-header nav-fill">
            <div class="w-25 navbar-brand">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Eis a Questão
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="w-50 navbar-collapse collapse order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav nav-header-pills mr-auto justify-content-center w-100">    
                    @if(Auth::check())
                        @if (Route::has('questoes.index'))
                            <li class="nav-item"><a class="nav-link" href="{{ action('ProvaController@index') }}">Criar prova</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ action('QuestaoController@create') }}">Cadastrar questão</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ action('TurmaController@index') }}">Turmas</a></li>
                        @endif
                    @endif
                </ul>
            </div>

            <div class="navbar-collapse collapse w-25 order-3 dual-collapse2">
                <ul class="navbar-nav nav-header-pills ml-auto">
                    @if(Auth::check() && Route::has('questoes.index'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Sair</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                    @endif
                </ul>
            </div>
        </nav>

        <main class="py-4" style="width: 90%; margin: auto;">
            @yield('content')
        </main>
    </div>
    <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Iniciar</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Sobre nós</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Suporte</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 info">
                    <h5>Informações</h5>
                    <p> Lorem ipsum dolor amet, consectetur adipiscing elit. Etiam consectetur aliquet aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>
                </div>
            </div>
        </div>
        <div class="second-bar">
           <div class="container">
                <h2 class="logo"><a href="#"> LOGO </a></h2>
                <div class="social-icons">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
