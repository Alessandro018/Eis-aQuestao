@extends('questoes.layout')
 
@section('content')

	@if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

	<table class="table table-bordered">
		<tr>
			<th>Pergunta</th>
			<th>Tipo</th>
			<th>Nível</th>
			<th>Diciplina</th>
			<th>Action</th>
		</tr>
		@foreach ($questoes as $questao)
		<tr>
			<td>{{ $questao->pergunta }}</td>
			<td>{{ $questao->tipo }}</td>
			<td>{{ $questao->nivel }}</td>
			<td>{{ $questao->nome }}</td>
			<td>
			<form action="{{ action('QuestaoController@destroy',$questao->id) }}" method="POST">
				<a class="btn btn-primary" href="{{ action('QuestaoController@edit',$questao->id) }}">Editar</a>
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirm">Excluir</button>
				
				<!-- <div class="modal fade" id="confirm" role="dialog">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-body" style="">
								Tem certeza que deseja excluir essa questão? {{$questao->id}}
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" class="btn btn-default">Cancelar</button>
								<button type="submit" class="btn btn-danger">Excluir</button>
							</div>
						</div>
					</div>
				</div> -->
			</form>
			</td>
		</tr>
		@endforeach
	</table>
@endsection