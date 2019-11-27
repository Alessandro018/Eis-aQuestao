@extends('layouts.app')
        
@section('content')

<div id="carouselExampleControls" class="row carousel slide p-5 mt-5" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner img-car">
        <div class="carousel-item active">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
                        <h2 class="text-dark text-center">Crie suas avaliações. É fácil e rápido! Gere provas diferentes para cada aluno.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
                        <h2 class="text-dark text-center">Diminua o tempo para elaboração de avaliações, reutilizando suas questões cadastradas, ou selecionando questões do banco de questões.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
                        <h2 class="text-dark text-center">Imprima tipos diferentes de provas embaralhando questões e alternativas.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next"  href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only pink">Next</span>
    </a>
</div>

@endsection