<?php

namespace App\Http\Controllers;

use App\Questao;
use App\Alternativa;
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
        return view('questoes.create', ['professor_disciplina' => $professor_disciplina])
        ->with('success', 'Questão cadastrada com sucesso');
    }

    public function store(Request $request)
    {
        $alternativa=[];
        $request->validate([
            'pergunta' => 'required|max:255',
            'tipo' => 'required',
            'nivel' => 'required',
            'disciplina_id' => 'required',
            'professor_id' => 'required',
            'correta' => 'required',
        ]);
            Questao::create($request->all());

            $id_questao = DB::table('questoes')
            ->select('questoes.id')
            ->where('questoes.pergunta',$request->pergunta)->get();
            $alternativa['questao_id']=$id_questao[0]->id;

            for ($i=1;$i<=5;$i++){
            $indice ='alternativa' . $i;
            $alternativa['resposta'] = $request->$indice;
            if ($request->correta == 'correta' . $i) {
                $alternativa['correta'] = 1;
                Alternativa::create($alternativa);
            }else{
                $alternativa['correta'] = 0;
                Alternativa::create($alternativa);
            }
        }
        return redirect()->route('questoes.index')
            ->with('success','Questão criada com successo.');
    }

    public function edit($id)
    {
        $questao = Questao::find($id);
        return view('questoes.edit', ['questao'=> $questao]);
    }

    public function update(Request $request, $id)
    {
        $questao = Questao::find($id);

        $request->validate([
            'pergunta' => 'required|max:255',
            'tipo' => 'required',
            'nivel' => 'required',
            'disciplina_id' => 'required',
            'professor_id' => 'required',
            'correta' => 'required',
        ]);

        $questao->update($request->all());
        
        return redirect()->route('questoes.index')
            ->with('success','Questão atualizada com successo');
    }

    public function destroy($id)
    {
        $questao = Questao::find($id)->delete();
        $questao = DB::table('alternativas')
        ->where('questao_id',$id)
        ->delete();
  
        return redirect()->route('questoes.index')
                        ->with('success','Questão apagada com successo');
    }
}
