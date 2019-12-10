@extends('layouts.app')
            
@section('content')

<img class="d-block w-100" src="{{ asset('img/layout.png') }}" alt="Card image">
<h1 class="display-5 text-center mt-5">Características do Eis a Questão</h1>
<div class="feature-title">
    <p>O Eis a Questão é um sistema que possibilita a criação e correção automática de provas objetivas.</p>
</div>
<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="card-deck">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center text-dark">Correção com QRcode.</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat ullam fugit debitis nesciunt, eaque repudiandae molestiae dolorem blanditiis repellendus, distinctio aut. Eius facere reiciendis officiis. Hic, assumenda, sed. Iste!</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center text-dark">Provas geradas em PDF.</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae non expedita quaerat fuga rem inventore totam hic, aut facere ad. Quod nemo blanditiis ex tempore iure sapiente vel deserunt unde?</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header pt-2 pb-1">
                    <h5 class="mb-1 card-title text-center text-dark">Questões por níveis de dificuldades.</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea ullam, praesentium illo eum corrupti doloremque fugit saepe aspernatur nisi amet nulla, dolorem voluptate porro maiores labore quis sit repellendus laboriosam.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center text-dark">Banco de Questões</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Permite que professores criem questões que ficarão armazenas e poderão ser facilmente utilizadas para criação de novas provas.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection