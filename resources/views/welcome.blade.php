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

<div class="row mt-7">
    <div class="col-sm-4">
        <div class="card color mb-3">
            <img class="card-img-top" src="https://user-images.githubusercontent.com/48129117/69589950-a7222800-0fcc-11ea-97fa-ec40ab54f99e.jpeg" alt="Card image">
            <div class="card-body text-warning">
                <h5 class="color text-center">Coreção com QRcode.</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card border-dark mb-3">
            <img class="card-img-top" src="https://user-images.githubusercontent.com/48128957/69599472-e57b0f80-0feb-11ea-8789-1a4be517679a.png" alt="Card image">
            <div class="card-body text-dark">
                <h5 class="card-title text-center">Provas geradas em PDF ou DOC.</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card color mb-3">
            <img class="card-img-top" src="http://sindimetalcanoas.org.br/novo/wp-content/uploads/2019/04/como-elaborar-um-formulario-de-pesquisa.png" alt="Card image">
            <div class="card-body text-warning">
                <h5 class="color text-center">Questões com nives de dificuldade.</h5>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="mx-auto">
        <a class="p-3 mw-100 btn-lg btn btn-orange1" href="{{ action('QuestaoController@index') }}">Começar</a>
    </div>
</div>
@endsection