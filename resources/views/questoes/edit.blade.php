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
    <form action="{{ route('questoes.update', $questao->id) }}" method="POST" style="width: 60%; margin: auto;">
        @csrf
        @method('PUT')
        <div class="form-group">
            <strong>Texto</strong>
            <textarea class="form-control" name="pergunta" rows="3" maxlength="2000"
            placeholder="Pergunta" required>{{ $questao->pergunta }}</textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text label-form">Nivel</label>
            </div>
            <select name="nivel" class="custom-select" required="" id="exampleFormControlSelect1">
                <option>{{ $questao->nivel }}</option>
                @for ($i=1; $i<=3; $i++)
                    @if ($questao->nivel != $i)
                        <option>{{ $i }}</option>
                    @endif
                @endfor
            </select>
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text label-form">Disciplina</label>
        </div>
        <select name="disciplina_id" class="custom-select" required="" id="exampleFormControlSelect2">
            @foreach($questao->professor->turmas_professor as $professores_disciplinas)
                @foreach($professores_disciplinas->turmas as $turmas)
                    @foreach($turmas->disciplinas as $disciplinas)
                        @if($questao->disciplina_id==$disciplinas->id)
                            <option value="{{ $disciplinas->id }}" selected>{{ $disciplinas->nome }}</option>
                            @else
                            <option value="{{ $disciplinas->id }}">{{ $disciplinas->nome }}</option>
                        @endif
                    @endforeach
                @endforeach
            @endforeach
            </select>
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
                placeholder="Alternativa" required >{{$alternativa->resposta}}</textarea>
                @endforeach
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <input type="hidden" name="professor_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>
@endsection