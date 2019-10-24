@extends('layouts.app')

@section('content')

    <form action="">
        @csrf
        <h2>Criar prova</h2><br>
        <div class="form-group">
            <label>Disciplina</label>
            <select class="custom-select" name="" @change="onChange($event)" v-model="selected" required>
                <option selected disabled>Selecione</option>
                @foreach ($professor_disciplina as $disciplina)
                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                @endforeach
            </select>
            <small id="emailHelp" class="form-text text-muted">Disciplina em que deseja criar a prova</small>
       
    </form>
    
@endsection