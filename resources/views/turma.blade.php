@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
    <h3 class="text-center mt-4">Minhas turmas</h3>
    <div class="form-group">
        <div class="row justify-content-start">
            <div class="col-sm-6 offset-sm-6">
            <button type="button" class="btn btn-lg float-right btn-orange" data-toggle="modal" data-target="#confirm">+ Importar dados</button>
                <div class="modal fade" id="confirm">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <form action="{{ action('TurmaController@store') }}" id="import" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <h4>
                                        Importar dados
                                    </h4>
                                    <div>
                                        <label>Curso</label>
                                        <select class="form-control" name="curso" required>
                                            <option selected disabled>Selecione</option>
                                            @foreach($cursos as $curso)
                                                <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                            @endforeach
                                        </select>
                                        <label>Disciplina</label>
                                        <select class="form-control" name="disciplina" disabled required>
                                            <option selected>Selecione o curso</option>
                                        </select>
                                        <label>Período letivo</label>
                                        <select class="form-control" name="periodo_letivo" required>
                                            <option selected disabled>Selecione</option>
                                        @foreach($periodos_letivos as $periodo_letivo)
                                            <option value="{{$periodo_letivo->id}}">{{$periodo_letivo->ano}}.{{$periodo_letivo->semestre}}</option>
                                        @endforeach
                                        </select>
                                        <label>Turno</label>
                                        <select class="form-control" name="turno" required>
                                            <option selected disabled>Selecione</option>
                                            <option value="Manhã">Manhã</option>
                                            <option value="Tarde">Tarde</option>
                                            <option value="Noite">Noite</option>
                                        </select>
                                        <br>
                                        <label>Selecione um arquivo</label>
                                        <span class="text-info">.xlsx</span>
                                        <input name="file" class="form-control-file" type="file" required accept=".xls,.xlsx">
                                        <span>Com: <span class="text-info">nome | email | matrícula</span> dos estudantes.</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-orange">Importar</button>
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="turma" action="{{ route('turma') }}" method="POST">
    @csrf
        <div class="form-group">
            <div class="row justify-content-start">
                <div class="col-sm-2">
                    <label>Curso: </label>
                    <select class="form-control" name="curso">
                        <option disabled selected>Selecione</option>
                        @foreach($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <label>Disciplina: </label>
                    <select class="form-control" name="disciplina">
                        <option value="" disabled selected>Selecione</option>
                        @foreach($disciplinas as $disciplina)
                            <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-sm-2">
                    <label>Turno: </label>
                    <select class="form-control" name="turno">
                        <option selected disabled>Selecione</option>
                        <option value="Manhã">Manhã</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noite">Noite</option>
                    </select>
                </div>
                
                <div class="col-sm-2">
                    <label>Período letivo: </label>
                    <select class="form-control" name="periodo_letivo">
                    <option selected disabled>Selecione</option>
                        @foreach($periodos_letivos as $periodo_letivo)
                            <option value="{{$periodo_letivo->id}}">{{$periodo_letivo->ano}}.{{$periodo_letivo->semestre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-md-center mt-3 text-center">
                <div class="col-sm-2">
                    <button class="btn btn-orange" type="submit">Buscar</button>
                </div>
                <div class="col-sm-2">
                    <input class="btn btn-secondary" type="reset" value="Limpar filtros">
                </div>
            </div>
        </div>
    </form>

    <table class="table table-sm mt-5 text-center">
    <thead class="thead-dark">
        <tr>
            <th>Curso</th>
			<th>Disciplina</th>
			<th>Período letivo</th>
            <th>Turno</th>
			<th>Situação</th>
		</tr>
        @foreach($turmas as $turma)
            <tr>
                <td>{{$turma->curso}}</td>
                <td>{{$turma->disciplina}}</td>
                <td>{{$turma->ano}}.{{$turma->semestre}}</td>
                <td>{{$turma->turno}}</td>
                <td>
                   <form action="{{ action('TurmaController@detalhe') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{$turma->id}}" name="id">
                            <button type="submit" class="btn btn-secondary">Detalhes</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="row justify-content-center text-center mx-auto w-25">
        @if(isset($request))
			{{ $turmas->appends($request)->links() }}
		@else
			{{ $turmas->links() }}
		@endif
    </div>
    </div>    
@endsection