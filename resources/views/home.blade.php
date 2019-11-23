@extends('layouts.app')

@section('content')
<!-- <h2>Periodo letivo</h2><br>
 --><div class="container">
    <div class="row">
        @foreach($professor_periodo as $key => $periodo)
       <!--  <div class="col" style="margin-left: 65px">
            <p><a href="">{{$periodo->ano}}.{{$periodo->semestre}}</a></p>
        </div> -->
        @if($key==4)
            <div class="w-100"></div>
        @endif
        @endforeach
    </div>
</div>
@endsection
