@extends('layouts.app')
 
@section('content')

	@if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

	<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModalLong">+ Criar Questão</button>

	<table class="table table-sm mt-4">
		<tr>
			<th>Pergunta</th>
			<th>Tipo</th>
			<th>Nível</th>
			<th>Disciplina</th>
			<th>Ações</th>
		</tr>

		<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>

		@foreach ($questoes as $questao)
		<tr>
			<td style="overflow: hidden;text-overflow: ellipsis;white-space: wrap;">{{ $questao->pergunta }}</td>
			<td>{{ $questao->tipo }}</td>
			<td>{{ $questao->nivel }}</td>
			<td>{{ $questao->nome }}</td>
			<td>	
			<form action="{{ action('QuestaoController@destroy',$questao->id) }}" id="delete" method="POST">
				<a class="btn btn-primary" href="{{ action('QuestaoController@edit',$questao->id) }}">Editar</a>
				@csrf
				@method('DELETE')
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm_{{ $questao->id }}">Excluir</button>
				
				<div class="modal fade" id="confirm_{{ $questao->id }}" role="dialog">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-body" style="">
								Tem certeza que deseja excluir essa questão?
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
{{ $questoes->links() }}
	
@endsection