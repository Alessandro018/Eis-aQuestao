@extends('questoes.layout')
   
@section('content')  
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('questoes.update', $questao->id) }}" method="POST">
        @csrf
        @method('PUT')
                <div class="form-group">
                    <strong>Questão:</strong>
                    <textarea class="form-control" name="pergunta" rows="3" maxlength="255"
                    placeholder="Máximo de 255 caractéres" required>{{ $questao->pergunta }}</textarea>
                </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Nível da questão</label>
                <select class="form-control" id="exampleFormControlSelect1" name="nivel" required>
                    <option>{{ $questao->nivel }}</option>
                    @for ($i=1; $i<=5; $i++)
                        @if ($questao->nivel != $i)
                            <option>{{ $i }}</option>
                        @endif
                    @endfor
                </select>
                <small id="emailHelp" class="form-text text-muted">O nível é de no mínimo 1 e no máximo 5</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Disciplina</label>
                <select class="form-control" id="exampleFormControlSelect2" name="disciplina_id" required>
                @foreach($questao->professor->disciplinas as $disciplina)
                    <option value="{{ $disciplina->id }}">{{ $disciplina->id }}</option>
                @endforeach
                </select>
                <small id="emailHelp" class="form-text text-muted">Disciplina em que a questão pertence</small>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Tipo</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo" value="aberta">
                        <label class="form-check-label" for="inlineRadio1">Aberta</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo" value="fechada">
                        <label class="form-check-label" for="inlineRadio2">Fechada</label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <input type="hidden" name="professor_id" value="1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection