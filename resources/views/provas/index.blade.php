@extends('layouts.app')

@section('content')
    <form action="{{ action('ProvaController@store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <h2>Minhas provas</h2>
        <div class="form-group">
            <div class="row justify-content-start">
                <div class="col-sm-6 offset-sm-6">
                    <div class="modal fade" id="confirm">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <form action="{{ action('TurmaController@store') }}" id="prova" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <h4>
                                            Criar prova
                                        </h4>
                                        <div>
                                            <label class="mt-2">Curso</label>
                                            <select class="form-control" name="curso" required>
                                                <option selected disabled>Selecione</option>
                                                @foreach($cursos as $curso)
                                                    <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                                @endforeach
                                            </select>
                                            <label class="mt-2">Turma</label>
                                            <select class="form-control" name="turma_id" disabled required>
                                                <option selected>Selecione o curso</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>Quantidade de questões</label>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <label>Nível 1</label>
                                                    <input type="number" class="form-control" name="questoes_nivel_1" value="0" min="0" max="50" required>
                                                </div>
                                                <div class="col-sm">
                                                    <label>Nível 2</label>
                                                    <input type="number" class="form-control" name="questoes_nivel_2" value="0" min="0" max="50" required>
                                                </div><div class="col-sm">
                                                    <label>Nível 3</label>
                                                    <input type="number" class="form-control" name="questoes_nivel_3" value="0" min="0" max="50" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>Cabeçalho</label>
                                            <textarea class="w-100" name="cabecalho" style="resize:none;border-radius: 4px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="professor" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-success">Criar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-orange1 float-right w-25 text-black" data-toggle="modal" data-target="#confirm">Criar prova</a>
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
                        <a href="" class="btn btn-success">Buscar</a>
                    </div>
                    <div class="col-2">
                        <button type="reset" style="color:#fff;" class="btn btn-info">Limpar filtros</button>
                    </div>
                </div>
        </div>
    </form>
    <div class="row justify-content-center mt-5">
        @if ($errors->any())
            <div class="alert alert-danger text-center w-50">
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center w-50">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ $message }}
            </div>
        @endif
    </div>
    <table class="table table-sm mt-4 text-center">
		<tr>
			<th>Disciplina</th>
			<th>Período letivo</th>
			<th>Turno</th>
            <th>Data de criação</th>
		</tr>

		@foreach ($provas as $prova)
		<tr>
			<td>{{ $prova->nome }}</td>
			<td>{{ $prova->ano }}.{{ $prova->semestre }}</td>
			<td>{{ $prova->turno }}</td>
			<td>{{ $prova->created_at }}</td>
            <td>
                <form action="{{ action('ProvaController@destroy',$prova->id) }}" method="POST">
					@csrf
                    @method('DELETE')

                        <a href="{{ action('ProvaController@edit',$prova->id) }}" class="btn btn-primary">Editar</a>
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm_{{ $prova->id }}">Excluir</button>

                            <div class="modal fade" id="confirm_{{ $prova->id }}" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-body" style="">
                                            Tem certeza que deseja excluir a Prova?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
				</form>		
            </td>
		</tr>
		@endforeach
	</table>
    <div class="row justify-content-center text-center mx-auto w-25">
         {{ $provas->links() }}
    </div>
@endsection