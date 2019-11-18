@extends('layouts.app')
        
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-6 col-sm-4">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
              <img src="{{asset('img/ifpe1.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
              <img src="{{asset('img/ifpe2.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
              <img src="{{asset('img/ifpe3.png')}}" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
    <div class="col-6 col-sm-8">
      <h3><u>Crie suas avaliações. É fácil e rápido! Gere provas diferentes para cada aluno.
      </u></h3>
    <p>Elabore suas avaliações no nosso site e as corrija com seu smartphone. Esta é a idéia do Eis a Questão.</p>
    <p>Diminua o tempo para elaboração de avaliações, reutilizando suas questões cadastradas, ou selecionando questões do banco de questões.</p> Imprima tipos diferentes de provas embaralhando questões e alternativas.
    </div>
    <div class="col">
      <table class="table">
      <thead>
        <tr>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  </div>
</div>
@endsection

