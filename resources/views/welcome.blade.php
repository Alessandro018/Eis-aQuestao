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
                           <img class="card-img-top w-100" src="{{ asset('img/ifpe3.png') }}" alt="Card image">
                           <br>
                           <br>
                            <h4 class="text-dark text-center">Questões com níveis de dificuldades.  
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-auto">
                             <img class="card-img-top w-100" src="{{ asset('img/ifpe2.png') }}" alt="Card image">
                             <br>
                             <br>
                             <h4 class="text-dark text-center">Correção com QRcode.</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-auto">
                            <img class="card-img-top w-100" src="{{ asset('img/ifpe1.png') }}"alt="Card image">
                              <br>
                              <br>
                             <h4 class="card-title text-center">Provas geradas em PDF.</h4>
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