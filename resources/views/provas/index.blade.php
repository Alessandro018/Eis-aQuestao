@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <form action="{{ action('ProvaController@store') }}" method="POST">
        @csrf
        <h2>Criar prova</h2><br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm">
                    <label>Disciplina</label>
                    <select class="custom-select" name="disciplina_id" required>
                        <option selected disabled>Selecione</option>
                        @foreach ($professor_disciplina as $disciplina)
                            <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                        @endforeach
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Disciplina em que deseja criar a prova</small>
                </div>
                <div class="col-sm">
                    <label>Cabeçalho</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" maxlength="255" name="cabecalho" placeholder="Cabeçalho" required></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Quantidade de questões</label>
            <div class="row">
                <div class="col-sm">
                    <label>Nível 1</label>
                    <input type="number" class="form-control" name="nivel1" value="0" min="0" max="5" required>
                </div>
                <div class="col-sm">
                    <label>Nível 2</label>
                    <input type="number" class="form-control" name="nivel2" value="0" min="0" max="5" required>
                </div><div class="col-sm">
                    <label>Nível 3</label>
                    <input type="number" class="form-control" name="nivel3" value="0" min="0" max="5" required>
                </div>
            </div>
            <small id="emailHelp" class="form-text text-muted">Máximo de 5 questões por nível</small>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <input type="hidden"  name="professor_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-primary">Criar prova</button>
        </div>
    </form>
    
@endsection