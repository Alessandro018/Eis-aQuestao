@extends('layouts.app')
@section('content')
    <h2>Detalhe da turma</h2>
    <div class="form-group">
        <table class="table table-sm mt-3">
            <tr>
                <th>Professores</th>
                <th>Curso</th>
                <th>Disciplina</th>
                <th>Periodo letivo</th>
                <th>turno</th>
            </tr>
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