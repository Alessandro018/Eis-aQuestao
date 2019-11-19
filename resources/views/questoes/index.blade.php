@extends('layouts.app')
 
@section('content')

	@if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
<h2>Minhas Questões</h2>
<div class="row justify-content-start">
<div class="col-sm-6 offset-sm-6">
	<button type="button" class="btn btn-secondary float-right w-25" data-toggle="modal" data-target="#exampleModalLong">+ Criar Questão</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Inserir Questão</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			
		<form action="{{ route('questoes.store') }}" method="POST" >
		@csrf
		<div class="form-group">
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
				<label class="input-group-text label-form">Nivel</label>
				</div>
				<select name="nivel" class="custom-select" required="" id="exampleFormControlSelect1">
					<option selected="" disabled="">Nível...</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text label-form">Disciplina</label>
			</div>
			<select name="disciplina_id" class="custom-select" required="" id="exampleFormControlSelect2">
				<option disabled selected>Disciplina...</option>
					@foreach ($professor_disciplina as $disciplina)
						<option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
					@endforeach
			</select>
			</div>
				<label for="exampleFormControlTextarea1">Texto</label>
				<textarea class="form-control" cols="40" rows="3" maxlength="2000" name="pergunta"
				placeholder="Pergunta" required></textarea>
			<div class="form-group">
				<input type="hidden" name="tipo" value="fechada"> 
				@for ($i=0;$i<=4;$i++)
					<input type="radio" name="correta" value="correta{{$i+1}}">
					<label>{{$i+1}})</label>
					<textarea class="form-control" maxlength="255" name="alternativa{{$i+1}}" placeholder="Alternativa" required></textarea>
				@endfor
			</div>
			<input type="hidden" name="situacao" value="1">
			<input type="hidden" name="professor_id" value="{{ Auth::user()->id }}">
			<button type="submit" class="btn btn-primary">Salvar</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		</form>
		</div>
		</div>
	</div>
	</div>
</div>
</div>
	<div class="row align-items-center">
		<div class="col-sm-3">
			<label>Curso: </label>
			<select class="form-control" name="curso">
				<option value="">Todos</option>
			</select>
		</div>
		<div class="col-sm-3">
			<label>Disciplina: </label>
			<select class="form-control" name="disciplina">
				<option value="">Todos</option>
			</select>
		</div>
		<div class="col-sm-3">
			<label>Nivel</label>
			<select class="form-control" name="nivel">
				<option value="todos">Todos</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
		</div>
	</div>
	<div class="row align-items-center">
		<div class="col-sm-3">
				<label>Autor:</label>
				<input type="text" class="form-control" name="autor" >
			</div>
			<div class="col-sm-6">
				<label>Pesquisa livre: </label>
				<input type="text" class="form-control" name="search" >
			</div>
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
	<table class="table table-sm mt-4 text-center">
		<tr>
			<th>Pergunta</th>
			<th>Disciplina</th>
			<th>Nível</th>
			<th>Autor</th>
			<th>Situação</th>
			<th>Ação</th>
		</tr>

		@foreach ($questoes as $questao)
		<tr>
			<td>{{ $questao->pergunta }}</td>
			<td>{{ $questao->nome }}</td>
			<td>{{ $questao->nivel }}</td>
			<td>{{ $questao->nome_professor }}</td>
			<td>{{ $questao->situacao }}</td>
			<td>
				<form action="{{ action('QuestaoController@desabilitar') }}" method="POST">
					<a class="btn btn-primary" href="{{ action('QuestaoController@edit',$questao->id) }}">Editar</a>
					@csrf
					@method('PUT')
					<input type="hidden" value="{{$questao->id}}" name="id">
					@if($questao->situacao =='Habilitado')
						<input type="hidden" value="Desabilitado" name="situacao">
						<button type="submit" class="btn btn-danger">Desabilitar</button>
					@else
						<input type="hidden" value="Habilitado" name="situacao">
						<button type="submit" class="btn btn-success">Habilitar</button>
					@endif
				</form>		
			</td>
		</tr>
		@endforeach
	</table>
{{ $questoes->onEachSide(5)->links() }}
	
@endsection