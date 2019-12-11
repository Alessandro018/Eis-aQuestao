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
                @for ($i=1; $i<=3; $i++)
                    @if ($questao->nivel == $i)
                        <option value="{{$i}}" selected>
                            @if($i==1)
                                Fácil
                            @endif
                            @if($i==2)
                                Médio
                            @endif
                            @if($i==3)
                                Díficil
                            @endif
                        </option>
                    @else
                        @if($i==1)
                            <option value="{{$i}}">
                                Fácil
                            </option>
                        @endif
                        @if($i==2)
                            <option value="{{$i}}">
                                Médio
                            </option>
                        @endif
                        @if($i==3)
                            <option value="{{$i}}">
                                Díficil
                            </option>
                        @endif
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
                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            @if ($alternativa->correta ==1)
                                <input type="radio" name="correta"  aria-label="Radio button for following text input" value="correta{{$key+1}}">
                            @else
                                <input type="radio" name="correta" checked aria-label="Radio button for following text input" value="correta{{$key+1}}">
                            @endif
                            </div>
                        </div>
                        <textarea class="form-control" maxlength="255" name="alternativa{{$key+1}}" aria-label="Text input with radio button"  placeholder="Alternativa {{$key+1}}" required >{{$alternativa->resposta}}</textarea>
                    </div>
                @endforeach
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <input type="hidden" name="professor_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-orange">Salvar</button>
            <a class="btn btn-outline-dark" href="{{ route('questoes.index') }}">Cancelar</a>
        </div>

    </form>
@endsection