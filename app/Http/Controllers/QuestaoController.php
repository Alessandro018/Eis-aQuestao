<?php

namespace App\Http\Controllers;

use App\Questao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestaoController extends Controller
{
    public function index()
    {
        $questoes = DB::table('questao')
        ->join('disciplina', 'disciplina.id', '=', 'questao.disciplina_id')
        ->select('questao.*', 'disciplina.nome')->get();

        return view('questao.index', ['questoes' => $questoes]);
    }

    public function create()
    {   
        $professor_disciplina = DB::table('professor_disciplina')
        ->join('disciplina', 'disciplina.id', '=', 'professor_disciplina.disciplina_id')
        ->select('disciplina.nome', 'disciplina.id')
        ->where('professor_disciplina.professor_id', 1)->get();
        return view('questao.create', ['professor_disciplina' => $professor_disciplina]);
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
        return redirect()->route('questao.index')
            ->with('success','Questão criada com successo.');
    }

    public function edit(Questao $questao)
    {
        $questoes = $questao::join('professor_disciplina', 'professor_disciplina.professor_id',
         '=', 'questao.professor_id')
        ->join('disciplina', 'disciplina.id', '=', 'professor_disciplina.disciplina_id')
        ->select('questao.*', 'disciplina.nome', 'disciplina.id as id_disciplina')
        ->where('professor_disciplina.professor_id', $questao->professor_id)
        ->where('questao.id', $questao->id)->get();
        return view('questao.edit', ['questoes'=> $questoes]);
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
  
        return redirect()->route('questao.index')
                        ->with('success','Questão atualizada com successo');
    }

    public function destroy(Questao $questao)
    {
        $questao->delete();
  
        return redirect()->route('questao.index')
                        ->with('success','Questão apagada com successo');
    }
}
