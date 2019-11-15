@extends('layouts.app')
 
@section('content')
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button>

<!-- Modal -->
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
        
      <form action="{{ route('questoes.store') }}" method="POST" style="width: 60%; margin: auto;">
    @csrf
       <div class="form-group">
            <label for="exampleFormControlTextarea1">Texto</label>
            <textarea class="form-control" cols="40" rows="3" maxlength="2000" name="pergunta"
            placeholder="Pergunta" required></textarea>
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
        <div class="form-group">
            <input type="hidden" name="tipo" value="fechada"> 
            @for ($i=0;$i<=4;$i++)
                <input type="radio" name="correta" value="correta{{$i+1}}">
                <label>{{$i+1}})</label>
                <textarea class="form-control" maxlength="255" name="alternativa{{$i+1}}" placeholder="Alternativa" required></textarea>
            @endfor
        </div>
        <input type="hidden" name="professor_id" value="{{ Auth::user()->id }}">
        <button type="submit" class="btn btn-primary">Inserir</button>
    </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	
@endsection