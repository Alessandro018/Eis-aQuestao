@extends('layouts.app')
 
@section('content')
    
    <form action="{{ route('questoes.store') }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Questão</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" maxlength="255" name="pergunta"
            placeholder="Máximo de 255 caractéres" required></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Nível da questão</label>
            <select class="form-control" id="exampleFormControlSelect1" name="nivel" required>
                <option disabled selected>Selecione</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">O nível é de no mínimo 1 e no máximo 3</small>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Disciplina</label>
            <select class="form-control" id="exampleFormControlSelect2" name="disciplina_id" required>
                <option disabled selected>Selecione</option>
                @foreach ($professor_disciplina as $disciplina)
                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                @endforeach
            </select>
            <small id="emailHelp" class="form-text text-muted">Disciplina em que a questão pertence</small>
        </div>
        <div class="form-group">
            <input type="hidden" name="tipo" value="fechada"> 
            <?php
                $letras=['A','B','C','D','E'];
            ?>
            @foreach ($letras as $letra)
                <input type="radio" name="correta" value="correta{{$letra}}">
                <label>{{$letra}})</label>
                <textarea class="form-control" maxlength="255" name="alternativa{{$letra}}"
            placeholder="Máximo de 255 caractéres" required></textarea>
            @endforeach
        </div>
        <input type="hidden" name="professor_id" value="1">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection