@extends('layouts.app')
 
@section('content')


<h3 class="text-center mt-4">Minhas questões</h3>
<div class="container">
<div class="row justify-content-start">
<div class="col-sm-6 offset-sm-6">
	<button type="button" class="btn btn-lg float-right btn-orange" data-toggle="modal" data-target="#exampleModalLong">+ Criar questão</button>
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
			
		<form action="{{ route('questoes.store') }}" id="questao" method="POST" >
		@csrf
		<div class="form-group">
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
				<label class="input-group-text label-form">Nivel</label>
				</div>
				<select name="nivel" class="custom-select" required="" id="exampleFormControlSelect1">
					<option selected="" disabled="">Nível...</option>
					<option value="1">Fácil</option>
					<option value="2">Médio</option>
					<option value="3">Difícil</option>
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
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Texto</label>
				<textarea class="form-control" id="pergunta" cols="40" rows="3" maxlength="2000" name="pergunta"
				placeholder="Pergunta" required></textarea>
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Alternativas</label>
				<input type="hidden" name="tipo" value="fechada">
				@for ($i=0;$i<=4;$i++)
					<div class="input-group mt-2">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<input type="radio" name="correta"  aria-label="Radio button for following text input" value="correta{{$i+1}}">
							</div>
						</div>
						<textarea class="form-control" maxlength="255" name="alternativa{{$i+1}}" aria-label="Text input with radio button"  placeholder="Alternativa {{$i+1}}" required ></textarea>
					</div>
				@endfor
			</div>
			<div class="modal-footer border-0">
				<input type="hidden" name="situacao" value="1">
				<input type="hidden" name="professor_id" value="{{ Auth::user()->id }}">
				<button type="submit" class="btn btn-orange">Criar</button>
				<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
			</div>
		</form>
		</div>
		</div>
	</div>
	</div>
</div>
</div>
<form action="{{ route('questoes') }}" method="POST">
	@csrf
	<div id="curso" class="row align-items-center">
		<div class="col-sm-3">
			<label>Curso: </label>
			<select class="form-control" name="curso">
				<option selected disabled value="">Selecione</option>
				@foreach($cursos as $curso)
					<option value="{{$curso->id}}">{{$curso->nome}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-sm-3">
			<label>Disciplina: </label>
			<select class="form-control" name="disciplina">
				<option  value="">Selecione</option>
				@foreach($disciplinas as $disciplina)
					<option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-sm-3">
			<label>Nível: </label>
			<select class="form-control" name="nivel">
				<option value="">Selecione</option>
				<option value="1">Fácil</option>
				<option value="2">Médio</option>
				<option value="3">Difícil</option>
			</select>
		</div>
	</div>
	<div class="row align-items-center">
		<div class="col-sm-3">
				<label>Autor:</label>
				<input type="text" class="form-control" maxlength="50" name="autor" >
			</div>
			<div class="col-sm-6">
				<label>Pesquisa livre: </label>
				<input type="text" class="form-control" maxlength="1000" name="search" >
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

		@if ($message = Session::get('warning'))
			<div class="alert alert-warning text-center w-50">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ $message }}
			</div>
		@endif
	</div>
	</div>
	<div class="container">
	<table class="table table-sm mt-4 text-center">
	<thead class="thead-dark">
		<tr>
			<th>Pergunta</th>
			<th>Disciplina</th>
			<th>Nível</th>
			<th>Autor</th>
			<th>Situação</th>
			<th>Ação</th>
		</tr>

		@foreach ($questoes as $questao)
			@if($questao->situacao=='Desabilitado')
				<tr class="text-secondary">
			@else
				<tr>
			@endif
					<td>{{ $questao->pergunta }}</td>
					<td>{{ $questao->nome }}</td>
					<td>
						@if($questao->nivel==1)
							Fácil
						@endif
						@if($questao->nivel==2)
							Médio
						@endif
						@if($questao->nivel==3)
							Difícil
						@endif
					</td>
					<td>{{ $questao->nome_professor }}</td>
					<td>{{ $questao->situacao }}</td>
					<td>
						<form action="{{ action('QuestaoController@desabilitar') }}" method="POST">
							<a class="btn btn-secondary" href="{{ action('QuestaoController@edit',$questao->id) }}">Editar</a>
							@csrf
							@method('PUT')
							<input type="hidden" value="{{$questao->id}}" name="id">
							@if($questao->situacao =='Habilitado')
								<input type="hidden" value="Desabilitado" name="situacao">
								<button type="submit" class="btn btn-dark">Desabilitar</button>
							@else
								<input type="hidden" value="Habilitado" name="situacao">
								<button type="submit" class="btn btn-orange">Habilitar</button>
							@endif
						</form>		
					</td>
				</tr>
		@endforeach
	</table>
	<div class="row justify-content-center text-center mx-auto w-25">
		@if(isset($request))
			{{ $questoes->appends($request)->links() }}
		@else
			{{ $questoes->links() }}
		@endif
	</div>
	</div>
@endsection