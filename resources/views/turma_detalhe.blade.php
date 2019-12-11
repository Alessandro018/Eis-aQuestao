@extends('layouts.app')
@section('content')
    <h2>Detalhe da turma</h2>
    <div class="form-group">
        <table class="table table-sm mt-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Professores</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Disciplina</th>
                    <th scope="col">Periodo letivo</th>
                    <th scope="col">turno</th>
                </tr>
            </thead>
                <tr>
                <td>
                @foreach($professores as $professor)
                    {{$professor->nome}} 
                @endforeach
                </td>
                    <td>{{$detalhes->first()->curso}}</td>
                    <td>{{$detalhes->first()->disciplina}}</td>
                    <td>{{$detalhes->first()->ano}}.{{$detalhes->first()->semestre}}</td>
                    <td>{{$detalhes->first()->turno}}</td>
                </tr>
        </table>
    </div>
    <h2>Estudantes</h2>
    <div class="form-group">
        <table class="table table-sm mt-3">
            <tr>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Email</th>

            </tr>
            @foreach($detalhes as $detalhe)
                <tr>
                    <td>{{$detalhe->nome}}</td>
                    <td>{{$detalhe->matricula}}</td>
                    <td>{{$detalhe->email}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="nav justify-content-center">
    </div>
@endsection