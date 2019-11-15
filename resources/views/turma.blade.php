@extends('layouts.app')

@section('content')
    <h2>Minhas turmas</h2>
    <div class="form-group">
        <div class="row justify-content-start">
            <div class="col-sm-6 offset-sm-6">
                <a style="" class="btn btn-secondary float-right w-25" href="">+ Importar dados</a>
            </div>
            <div class="col-sm-3">
                <label>Nome do aluno: </label>
                <input type="text" class="form-control" name="nome" placeholder="" required>
            </div>
            <div class="col-sm-3">
                <label>Matrícula: </label>
                <input type="text" class="form-control" name="matricula" placeholder="" required>
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
                <label>Período letivo: </label>
                <select class="form-control" name="periodo_letivo">
                    <option value="">Todos</option>
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
    <table class="table table-sm">
        <tr>
			<th>Matrícula</th>
			<th>Nome completo</th>
			<th>Disciplina</th>
			<th>Período letivo</th>
			<th>Situação</th>
		</tr>
        
    </table>
    
@endsection