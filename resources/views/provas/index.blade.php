@extends('layouts.app')

@section('content')
    <form enctype="multipart/form-data" method="POST">
        @csrf
        <h3 class="text-center mt-4">Minhas provas</h3>
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-sm-6 offset-sm-6">
                    <button type="button" data-action-text="Criar" data-action="{{ action('ProvaController@store') }}" class="criar_prova btn btn-lg float-right btn-orange" data-toggle="modal" data-target="#confirm">+ Criar prova</button>
                </div>
            </div>
    </form>
    <div class="modal fade" id="confirm">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="prova" method="POST">
                    @csrf
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
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
                                    <label>Fáceis</label>
                                    <input type="number" class="form-control" name="questoes_nivel_1" value="0" min="0" max="50" required>
                                </div>
                                <div class="col-sm">
                                    <label>Médias</label>
                                    <input type="number" class="form-control" name="questoes_nivel_2" value="0" min="0" max="50" required>
                                </div><div class="col-sm">
                                    <label>Difíceis</label>
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
                        <button type="submit" class="action_btn btn btn-orange">Criar</button>
                        <button type="button" class="btn btn-outline-dark " data-dismiss="modal" class="btn btn-default">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <form action="{{ route('prova') }}" method="POST">
    @csrf
        <div id="prova" class="form-group">
            <div class="row justify-content-start">
                <div class="col-sm-3">
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
                <div class="col-sm-3">
                    <label>Período letivo: </label>
                    <select class="form-control" name="periodo_letivo">
                    <option selected disabled>Selecione</option>
                        @foreach($periodos_letivos as $periodo_letivo)
                            <option value="{{$periodo_letivo->id}}">{{$periodo_letivo->ano}}.{{$periodo_letivo->semestre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>                    
                <div class="row justify-content-center m-3">
                    <div class="col-2">
                        <button class="btn btn-orange" type="submit">Buscar</button>
                    </div>
                    <div class="col-2">
                        <input class="btn btn-secondary" type="reset" value="Limpar filtros">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row justify-content-center mt-5">
        @if ($errors->any())
            <div class="alert alert-danger text-center w-50">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="mb-n1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
    <div class="container">
    <table class="table table-sm mt-4 text-center">
    <thead class="thead-silver">
		<tr>
			<th>Disciplina</th>
			<th>Período letivo</th>
			<th>Turno</th>
            <th>Data de criação</th>
            <th>Ação</th>
		</tr>

		@foreach ($provas as $prova)
		<tr>
			<td>{{ $prova->nome }}</td>
			<td>{{ $prova->ano }}.{{ $prova->semestre }}</td>
			<td>{{ $prova->turno }}</td>
			<td>{{ $prova->created_at }}</td>
            <td>
                <form action="{{ action('ProvaController@generate', $prova->id) }}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-orange2" value="Gerar prova">
                </form>
                <form class="mt-2" action="{{ action('ProvaController@destroy',$prova->id) }}" method="POST">
					@csrf
                    @method('DELETE')
                        <button type="button" class="editar_prova btn btn-secondary" 
                            data-action-text="Atualizar" 
                            data-action="{{ action('ProvaController@update', $prova->id) }}" 
                            data-toggle="modal" 
                            data-target="#confirm"
                            data-questoes-1="{{$prova->questoes_nivel_1}}"
                            data-questoes-2="{{$prova->questoes_nivel_2}}"
                            data-questoes-3="{{$prova->questoes_nivel_3}}"
                            data-curso-id="{{$prova->turma->disciplina->curso_id}}"
                            data-turma-id="{{$prova->turma_id}}"
                        >Editar</button>
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#confirm_{{ $prova->id }}">Excluir</button>

                        <div class="modal fade" id="confirm_{{ $prova->id }}" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-body" style="">
                                        Tem certeza que deseja excluir a prova?
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
         @if(isset($request))
			{{ $provas->appends($request)->links() }}
		@else
			{{ $provas->links() }}
		@endif
    </div>
    </div>
@endsection