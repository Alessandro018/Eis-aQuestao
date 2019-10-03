@extends('questao.layout')
 
@section('content')
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
				<td>{{ $questao->disciplina_id }}</td>
				<td>
                <form action="{{ route('questao.destroy',$questao->id) }}" method="POST">
   
                
    
                    <a class="btn btn-primary" href="{{ route('questao.edit',$questao->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
        			<button type="submit" class="btn btn-danger">Deletar</button>
					</form>
				</td>
			</tr>
			@endforeach
	</table>
	{!! $questoes->links() !!}
@endsection