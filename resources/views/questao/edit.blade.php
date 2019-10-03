@extends('questao.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar questao</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questao.index') }}"> Voltar</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('questao.update',$questao->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Questão:</strong>
                    <textarea class="form-control" name="pergunta" rows="3">{{ $questao->pergunta }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Nível da questão</label>
                <select class="form-control" id="exampleFormControlSelect1" name="nivel">
                    <option>{{ $questao->nivel }}</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">O nível é de no mínimo 1 e no máximo 5</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Disciplina</label>
                <select class="form-control" id="exampleFormControlSelect2" name="disciplina_id">
                    <option>1</option>
                    <option>2</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Disciplina em que a questão pertence</small>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <label>Tipo</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">Aberta</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">Fechada</label>
            </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <input type="hidden" name="professor_id" value="1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection