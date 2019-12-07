    @extends('layouts.app')
            
    @section('content')

<img class="d-block w-100" src="{{ asset('img/layout.png') }}" alt="Card image">
<div class="container mt-5">
  <div class="row justify-content-md-center">
    <div class="col col-lg-4 mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="color text-center">Correção com QRcode.</h5>
            </div>
            <div class="card-body text-dark">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat ullam fugit debitis nesciunt, eaque repudiandae molestiae dolorem blanditiis repellendus, distinctio aut. Eius facere reiciendis officiis. Hic, assumenda, sed. Iste!</p>
            </div>
        </div>
    </div>
    <div class="col col-lg-7 ml-3">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title text-center">Provas geradas em PDF.</h5>
            </div>
            <div class="card-body text-dark">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae non expedita quaerat fuga rem inventore totam hic, aut facere ad. Quod nemo blanditiis ex tempore iure sapiente vel deserunt unde?</p>
            </div>
        </div>
    </div>
    <div class="col col-lg-5 mt-3 ml-5">
        <div class="card ml-5">
            <div class="card-header">
                <h5 class="color text-center">Questões por níveis de dificuldades.</h5>
            </div>
            <div class="card-body text-dark">
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea ullam, praesentium illo eum corrupti doloremque fugit saepe aspernatur nisi amet nulla, dolorem voluptate porro maiores labore quis sit repellendus laboriosam.</p>
            </div>
        </div>
    </div>
</div>

    @endsection