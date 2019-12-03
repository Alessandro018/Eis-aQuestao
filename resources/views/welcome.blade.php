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
                           <img class="card-img-top" src="https://www.gradepen.com/img/slider03.png" alt="Card image">
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
                             <img class="card-img-top" src="http://pw.blog.br/wp-content/uploads/2017/04/pdf.png" alt="Card image">
                             <br>
                             <br>
                             <h4 class="card-title text-center">Provas geradas em PDF.</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-auto">
                            <img class="card-img-top" src="http://portal.metodista.br/++theme++enade-2019-c-contagem/img/prova-contador.png"alt="Card image">
                              <br>
                              <br>
                              <h4 class="text-dark text-center">Questões com níveis de dificuldades.  
                              </h4>
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

  <!--   <div class="row mt-7">
        <div class="col-sm-4">
            <div class="card color mb-3">
                <img class="card-img-top" src="https://user-images.githubusercontent.com/48129117/69589950-a7222800-0fcc-11ea-97fa-ec40ab54f99e.jpeg" alt="Card image">
                <div class="card-body text-warning">
                    <h5 class="color text-center">Correção com QRcode.</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card color mb-3">
                <img class="card-img-top" src="https://t2.uc.ltmcdn.com/pt/images/6/4/1/img_como_criar_um_arquivo_pdf_online_15146_600.jpg" alt="Card image">
                <div class="card-body text-btn-orange">
                    <h5 class="card-title text-center">Provas geradas em PDF.</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card color mb-3">
                <img class="card-img-top" src="http://sindimetalcanoas.org.br/novo/wp-content/uploads/2019/04/como-elaborar-um-formulario-de-pesquisa.png" alt="Card image">
                <div class="card-body text-warning">
                    <h5 class="color text-center">Questões com níveis de dificuldades.</h5>
                </div>
            </div>
        </div>
    </div> -->

   <!--  <div class="row mt-5">
        <div class="mx-auto">
            <a class="p-3 mw-100 btn-lg btn btn-outline-primary" href="{{ action('QuestaoController@index') }}">Começar</a>
        </div>
    </div> -->
    @endsection