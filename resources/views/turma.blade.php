@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <h2>Minhas turmas</h2>
    <div class="form-group">
        <div class="row justify-content-start">
            <div class="col-sm-6 offset-sm-6">
                <a class="btn btn-secondary float-right w-25 text-white" data-toggle="modal" data-target="#confirm">+ Importar dados</a>
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
                                            <option selected disabled>Selecione o curso</option>
                                        </select>
                                        <label>Período letivo</label>
                                        <select class="form-control" name="periodo_letivo" required>
                                            <option selected disabled>Selecione</option>
                                        @foreach($periodos_letivos as $periodo_letivo)
                                            <option value="{{$periodo_letivo->id}}">{{$periodo_letivo->ano}}.{{$periodo_letivo->semestre}}</option>
                                        @endforeach
                                        </select>
                                        <label>Turno</label>
                                        <select class="form-control" name="turno">
                                            <option selected disabled>Selecione</option>
                                            <option value="Manhã">Manhã</option>
                                            <option value="Tarde">Tarde</option>
                                            <option value="Noite">Noite</option>
                                        </select>
                                        <br>
                                        <label>Selecione o arquivo</label>
                                        <input name="file" class="form-control-file" type="file" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Importar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <label>Nome do aluno: </label>
                <input type="text" class="form-control" name="nome" placeholder="" required>
            </div>
            <div class="col-sm-3">
                <label>Matrícula: </label>
                <input type="text" class="form-control" name="matricula" placeholder="" required>
            </div>
            <div class="col-sm-3">
                <label>Curso: </label>
                <select class="form-control" name="curso">
                    <option disabled selected>Todos</option>
                    @foreach($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-sm-3">
                <label>Turno</label>
                <select class="form-control" name="turno">
                    <option selected disabled>Selecione</option>
                    <option value="Manhã">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Disciplina: </label>
                <select class="form-control" name="disciplina">
                    <option value="" disabled selected>Todos</option>
                    @foreach($disciplinas as $disciplina)
                        <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <label>Período letivo: </label>
                <select class="form-control" name="periodo_letivo">
                <option selected disabled>Todos</option>
                    @foreach($periodos_letivos as $periodo_letivo)
                        <option value="{{$periodo_letivo->id}}">{{$periodo_letivo->ano}}.{{$periodo_letivo->semestre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row justify-content-center m-3">
            <div class="col-2">
                <a class="btn btn-success" href="">Buscar</a>
            </div>
            <div class="col-2">
                <a style="color:#fff;" class="btn btn-info" href="">Limpar filtros</a>
            </div>
        </div>
    </div>
    <table class="table table-sm text-center mt-5">
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
                <td>{{$turma->materia}}</td>
                <td>{{$turma->ano}}.{{$turma->semestre}}</td>
                <td>{{$turma->turno}}</td>
                <td><a class="btn btn-secondary" href="">Detalhe</a></td>
            </tr>
        @endforeach
    </table>
    {{ $turmas->links() }}
@endsection