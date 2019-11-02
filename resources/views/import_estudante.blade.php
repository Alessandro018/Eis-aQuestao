@extends('layouts.app')

@section('content')
<div class="container">

   @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('/import_estudante/import') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <table class="table">
                <tr>
                    <td width="40%" align="right"><label>Padrão da planilha nome, email, matrícula.</label><span class="form-text text-muted">.xls ou .xslx   </span></td></td>
                    <td width="30">
                        <input type="file" name="file">
                    </td>
                    <td width="30%" align="left">
                        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                    </td>
                </tr>
                <tr>
                    <td width="40%" align="right"></td>
                    <td width="30">
                    <td width="30%" align="left"></td>
                </tr>
            </table>
        </div>
    </form>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Estudantes</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Matrícula</th>
                    </tr>
                        @foreach($data as $row)
                    <tr>
                        <td>{{ $row->nome }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->matricula }}</td>
                    </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
