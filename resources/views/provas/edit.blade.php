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
    <form action="{{ route('prova.update', $prova->id) }}" method="POST" style="width: 60%; margin: auto;">
        @csrf
        @method('PUT')
        <div class="form-group">
            <h4>
                Editar prova
            </h4>
            <div>
                <label class="mt-2">Curso</label>
                <select class="form-control" name="curso" required>
                    <option selected value="{{$curso_id->id}}">{{$curso_id->nome}}</option>
                        @foreach($cursos as $curso)
                            @if($curso_id->id != $curso->id)
                                <option value="{{$curso->id}}">{{$curso->nome}}</option>
                            @endif
                        @endforeach
                </select>
                <label class="mt-2">Turma</label>
                <select class="form-control" name="turma_id" required>
                    <option selected value="{{$turma->id}}" >{{$turma->disciplinas}} - {{$turma->ano}}.{{$turma->semestre}} | {{$turma->turno}}</option>
                        @foreach($turmas as $value)
                            @if($value->id != $turma->id)
                                <option value="{{$value->id}}" >{{$value->nome}} - {{$value->ano}}.{{$value->semestre}} | {{$value->turno}}</option>
                            @endif
                        @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label>Quantidade de questões</label>
                <div class="row">
                    <div class="col-sm">
                        <label>Nível 1</label>
                        <input type="number" class="form-control" name="questoes_nivel_1" value="{{$prova->questoes_nivel_1}}" min="0" max="50" required>
                    </div>
                    <div class="col-sm">
                        <label>Nível 2</label>
                        <input type="number" class="form-control" name="questoes_nivel_2" value="{{$prova->questoes_nivel_2}}" min="0" max="50" required>
                    </div><div class="col-sm">
                        <label>Nível 3</label>
                        <input type="number" class="form-control" name="questoes_nivel_3" value="{{$prova->questoes_nivel_3}}" min="0" max="50" required>
                    </div>
                </div>
            </div>
            <div class="form-group mt-2">
                <label>Cabeçalho</label>
                <textarea class="w-100" name="cabecalho" style="resize:none;border-radius: 4px;">{{$prova->cabecalho}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
@endsection