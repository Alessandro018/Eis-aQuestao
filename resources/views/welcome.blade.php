@extends('layouts.app')
            
@section('content')

<img class="d-block w-100" src="{{ asset('img/layout.png') }}" alt="Card image">
<h1 class="display-5 text-center mt-5">Saiba mais sobre o Eis a questão</h1>
<div class="feature-title">
    <p class="text-dark">O Eis a Questão é um sistema que possibilita a criação e correção automática de provas objetivas.</p>
</div>
<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="card-deck">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center text-dark"><strong>Correção com QRcode 
                    </strong></h5>
                </div>
                <div class="card-body">
                    <p class="text-dark">Correção automática de provas e gabaritos. Garante maior flexibilidade e praticidade para o professor na hora de corrigir as provas.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center text-dark"><strong>Provas geradas em PDF
                    </strong> </h5>
                </div>
                <div class="card-body">
                    <p class="text-dark">Desta maneira, o professor pode criar provas individuais com questões embaralhadas prontas para impressão.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header pt-2 pb-1">
                    <h5 class="mb-1 card-title text-center text-dark"><strong>Questões por níveis de dificuldade</strong></h5>
                </div>
                <div class="card-body">
                    <p class="text-dark">Através desta ferramenta, o professor pode criar provas contendo questões com vários níveis de dificuldade.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center text-dark"><strong>Banco de questões</strong></h5>
                </div>
                <div class="card-body">
                    <p class="text-dark">Permite que professores criem questões que ficarão armazenadas e poderão ser facilmente utilizadas para criação de novas provas.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection