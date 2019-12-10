@extends('layouts.app')
            
@section('content')

<img class="d-block w-100" src="{{ asset('img/layout.png') }}" alt="Card image">
<h1 class="display-5 text-center mt-5">Características do Eis a Questão</h1>
<div class="feature-title">
    <p>O Eis a Questão é um sistema que possibilita a criação e correção automática de provas objetivas.</p>
</div>
<div class="container mt-5">
  <div class="row justify-content-md-center">
    <div class="col col-lg-4 mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="color text-center text-dark">Correção com QRcode.</h5>
            </div>
            <div class="card-body">
                <p>Correção automática de provas e gabaritos. Garante maior flexibilidade e praticidade para o professor na hora de corrigir as provas. </p>
            </div>
        </div>
    </div>
    <div class="col col-lg-7 ml-3">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title text-center text-dark">Provas geradas em PDF.</h5>
            </div>
            <div class="card-body">
                <p>Desta maneira, o professor pode criar provas individuais com questões embaralhadas prontas para impressão.</p>
            </div>
        </div>
    </div>
    <div class="col col-lg-5 mt-3 ml-5">
        <div class="card ml-5">
            <div class="card-header">
                <h5 class="color text-center text-dark">Questões por níveis de dificuldade.</h5>
            </div>
            <div class="card-body">
                <p>Através desta ferramenta, o professor pode criar provas contendo questões com vários níveis de dificuldade.</p>
            </div>
        </div>
    </div>
    <div class="row mt-4 ml-3">
    <div class="col col-lg-6 ml-5">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title text-center text-dark">Banco de Questões</h5>
            </div>
            <div class="card-body">
                <p>Permite que professores criem questões que ficarão armazenas e poderão ser facilmente utilizadas para criação de novas provas.</p>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection