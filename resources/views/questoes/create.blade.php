@extends('layouts.app')
 
@section('content')
    
    <form action="{{ route('questoes.store') }}" method="POST">
    @csrf
       <div class="form-group">
            <label for="exampleFormControlTextarea1">Texto</label>
            <textarea class="form-control" cols="40" rows="10" id="exampleFormControlTextarea1" name="pergunta"
            placeholder="Pergunta" required></textarea>
        </div>
       <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text label-form">Nivel</label>
        </div>
        <select name="nivel" class="custom-select" required="" id="exampleFormControlSelect1">
  <option value="" selected="">Nível...</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select>
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
            @for ($i=0;$i<=4;$i++)
                <input type="radio" name="correta" value="correta{{$i+1}}">
                <label>{{$i+1}})</label>
                <textarea class="form-control" maxlength="255" name="alternativa{{$i+1}}" placeholder="Alternativa" required></textarea>
            @endfor
        </div>
        <input type="hidden" name="professor_id" value="{{ Auth::user()->id }}">
        <button type="submit" class="btn btn-primary">Inserir</button>
    </form>
@endsection