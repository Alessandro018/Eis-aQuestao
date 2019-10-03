@extends('questao.layout')
 
@section('content')
    <form action="{{ route('questao.store') }}" method="POST">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Questão</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pergunta"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Nível da questão</label>
            <select class="form-control" id="exampleFormControlSelect1" name="nivel">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">O nível é de no mínimo 1 e no máximo 5</small>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Disciplina</label>
            <select class="form-control" id="exampleFormControlSelect2" name="disciplina">
                <option>Desenvolvimento para web 1</option>
                <option>Projeto e prática 1</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">Disciplina em que a questão pertence</small>
        </div>
        <div class="form-group">
            <label>Tipo</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="aberta">
                <label class="form-check-label" for="inlineRadio1">Aberta</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="fechada">
                <label class="form-check-label" for="inlineRadio2">Fechada</label>
            </div>
            <input type="hidden" name="professor_id" value="1">
            <input type="hidden" name="disciplina_id" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection