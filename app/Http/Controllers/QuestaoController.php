<?php

namespace App\Http\Controllers;

use App\Questao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestaoController extends Controller
{
    public function index()
    {
        $questoes = DB::table('questaos')
        ->join('disciplina', 'disciplina.id', '=', 'questaos.disciplina_id')
        ->select('questaos.*', 'disciplina.nome')->get();

        return view('questao.index', ['questoes' => $questoes]);
    }

    public function create()
    {   
        $professor_disciplina = DB::table('professor_disciplina')
        ->join('disciplina', 'disciplina.id', '=', 'professor_disciplina.disciplina_id')
        ->select('disciplina.nome')
        ->where('professor_id', 1)->get();
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
        return view('questao.edit',compact('questao'));
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
