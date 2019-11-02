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
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Eis a Questão
                </a>
                <div class="flex-center position-ref full-height">
                    <div class="top-right links" style="float:right;padding: 10px;">
                        @if(Auth::check())
                            @if (Route::has('questoes.index'))
                                <a href="{{ action('ImportEstudanteController@index') }}" style="padding-right:10px">Importar estudantes</a>
                                <a href="{{ action('ProvaController@index') }}" style="padding-right:10px">Criar prova</a>
                                <a href="{{ action('QuestaoController@create') }}" style="padding-right:10px">Cadastrar questão</a>     
                                <a href="{{ action('QuestaoController@index') }}">Questões</a>
                            @endif
                            <a href="{{ route('logout') }}" style="padding-left:10px">Sair</a>
                        @endif
                        @if(!Auth::check())
                            <a href="{{ route('login') }}">Login</a>
                        @endif
                    </div>
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
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 info">
                    <h5>Information</h5>
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
