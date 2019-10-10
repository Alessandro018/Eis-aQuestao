<?php

namespace App\Http\Controllers;

use App\Questao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestaoController extends Controller
{
    public function index()
    {
        $questoes = DB::table('questoes')
        ->join('disciplinas', 'disciplinas.id', '=', 'questoes.disciplina_id')
        ->select('questoes.*', 'disciplinas.nome')->get();

        return view('questoes.index', ['questoes' => $questoes]);
    }

    public function create()
    {   
        $professor_disciplina = DB::table('professores_disciplinas')
        ->join('disciplinas', 'disciplinas.id', '=', 'professores_disciplinas.disciplina_id')
        ->select('disciplinas.nome', 'disciplinas.id')
        ->where('professores_disciplinas.professor_id', 1)->get();
        return view('questoes.create', ['professor_disciplina' => $professor_disciplina]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pergunta' => 'required',
            'tipo' => 'required',
            'nivel' => 'required',
            'disciplina_id' => 'required',
        ]);
        Questao::create($request->all());
        return redirect()->route('questoes.index')
            ->with('success','Questão criada com successo.');
    }

    public function edit(Questao $questao)
    {
        $questoes = $questao::join('professores_disciplinas', 'professores_disciplinas.professor_id',
         '=', 'questoes.professor_id')
        ->join('disciplinas', 'disciplinas.id', '=', 'professores_disciplinas.disciplina_id')
        ->select('questoes.*', 'disciplinas.nome', 'disciplinas.id as id_disciplina')
        ->where('professores_disciplinas.professor_id', $questao->professor_id)
        ->where('questoes.id', $questao->id)->get();
        return view('questoes.edit', ['questoes'=> $questoes]);
    }

    public function update(Request $request, Questao $questao)
    {
        $request->validate([
            'pergunta' => 'required',
            'tipo' => 'required',
            'nivel' => 'required',
            'disciplina_id' => 'required',
        ]);
  
        $questao->update($request->all());
  
        return redirect()->route('questoes.index')
                        ->with('success','Questão atualizada com successo');
    }

    public function destroy(Questao $questao)
    {
        $questao->delete();
  
        return redirect()->route('questoes.index')
                        ->with('success','Questão apagada com successo');
    }
}
