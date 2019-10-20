@extends('layouts.app')
   
@section('content')  
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('questoes.update', $questao->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <strong>Questão:</strong>
            <textarea class="form-control" name="pergunta" rows="3" maxlength="255"
            placeholder="Máximo de 255 caractéres" required>{{ $questao->pergunta }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Nível da questão</label>
            <select class="form-control" id="exampleFormControlSelect1" name="nivel" required>
                <option>{{ $questao->nivel }}</option>
                @for ($i=1; $i<=3; $i++)
                    @if ($questao->nivel != $i)
                        <option>{{ $i }}</option>
                    @endif
                @endfor
            </select>
            <small id="emailHelp" class="form-text text-muted">O nível é de no mínimo 1 e no máximo 3</small>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Disciplina</label>
            <select class="form-control" id="exampleFormControlSelect2" name="disciplina_id" required>
            @foreach($questao->professor->disciplinas as $professores_disciplinas)
                @foreach($professores_disciplinas->nomes_disciplinas as $disciplinas)
                    @if($questao->disciplina_id==$disciplinas->id)
                        <option value="{{ $disciplinas->id }}" selected>{{ $disciplinas->nome }}</option>
                        @else
                        <option value="{{ $disciplinas->id }}">{{ $disciplinas->nome }}</option>
                    @endif
                @endforeach
            @endforeach
            </select>
            <small id="emailHelp" class="form-text text-muted">Disciplina em que a questão pertence</small>
        </div>
        <div class="form-group">
            <input type="hidden" name="tipo" value="fechada"> 
                @foreach ($questao->alternativas as $key => $alternativa)
                    @if ($alternativa->correta ==1)
                        <input type="radio" name="correta" value="correta{{$key+1}}" checked>
                    @else
                        <input type="radio" name="correta" value="correta{{$key+1}}">
                    @endif
                    <label>{{$key+1}})</label>
                    <textarea class="form-control" maxlength="255" name="alternativa{{$key+1}}"
                placeholder="Máximo de 255 caractéres" required >{{$alternativa->resposta}}</textarea>
                @endforeach
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <input type="hidden" name="professor_id" value="1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection