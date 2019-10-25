@extends('layouts.app')

@section('content')

    <form action="">
        @csrf
        <h2>Criar prova</h2><br>
        <div class="form-group">
            <label>Disciplina</label>
            <select class="custom-select" name=""  @change="onChange($event)" v-model="selected" required>
                <option selected disabled>Selecione</option>
                @foreach ($professor_disciplina as $disciplina)
                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                @endforeach
            </select>
            <small id="emailHelp" class="form-text text-muted">Disciplina em que deseja criar a prova</small>
        </div>
        <div class="form-group">
            <label>Quantidade de questões</label>
            <div class="row">
                <div class="col-sm">
                    <label>Nível 1</label>
                    <input type="number" class="form-control" value="0"  @change="onChange($event)" v-model="nivel1" min="0" max="5" required>
                </div>
                <div class="col-sm">
                    <label>Nível 2</label>
                    <input type="number" class="form-control" value="0"  @change="onChange($event)" v-model="nivel2" min="0" max="5" required>
                </div><div class="col-sm">
                    <label>Nível 3</label>
                    <input type="number" class="form-control" value="0"  @change="onChange($event)" v-model="nivel3" min="0" max="5" required>
                </div>
            </div>
            <small id="emailHelp" class="form-text text-muted">Máximo de 5 questões por nível</small>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Criar prova</button>
        </div>
    </form>
    
@endsection