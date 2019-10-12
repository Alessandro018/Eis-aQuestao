    <h1>Listagem dos Períodos letivos</h1>

<div class="container">
    @if($periodos)
	    @foreach($periodos as $periodo)
	        <div>
	            {{$periodo->ano}}
	            {{$periodo->semestre}}
	        </div>
	    @endforeach
    @endif
</div>