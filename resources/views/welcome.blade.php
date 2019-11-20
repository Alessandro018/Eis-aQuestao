@extends('layouts.app')
        
@section('content')

<div id="carouselExampleControls" class="carousel slide p-5" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner img-car">
        <div class="carousel-item active">
            <div class="carousel-caption">
                <h2 class="text-dark"></h2>
            </div>
            <img src="{{ asset('img/ifpe1.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <div class="carousel-caption">
                <h2 class="text-dark">Diminua o tempo para elaboração de avaliações, reutilizando suas questões cadastradas, ou selecionando questões do banco de questões.</h2>
            </div>
            <img src="{{ asset('img/ifpe2.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <div class="carousel-caption">
                <h2 class="text-dark">Imprima tipos diferentes de provas embaralhando questões e alternativas.</h2>
            </div>
            <img src="{{ asset('img/ifpe3.png') }}" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next"  href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container p-5">
  <div class="row justify-content-start">
    <div class="col">
        <h1 class="text-center">Crie suas avaliações. É fácil e rápido! Gere provas diferentes para cada aluno.</h1>
        <a href=""></a>
    </div>
  </div>
</div>
@endsection