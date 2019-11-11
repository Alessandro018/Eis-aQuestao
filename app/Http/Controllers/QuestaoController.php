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
        if(auth()->check())
        {
            $questoes = DB::table('questoes')
            ->join('disciplinas', 'disciplinas.id', '=', 'questoes.disciplina_id')
            ->select('questoes.*', 'disciplinas.nome')->get();
    
            return view('questoes.index', ['questoes' => $questoes]);
        }
        return redirect()->route('login');
    }

    public function create()
    {   
        if(auth()->check())
        {
            $professor_disciplina = DB::table('professores_disciplinas')
            ->join('disciplinas', 'disciplinas.id', '=', 'professores_disciplinas.disciplina_id')
            ->select('disciplinas.nome', 'disciplinas.id')
            ->where('professores_disciplinas.professor_id', 1)->get();
            return view('questoes.create', ['professor_disciplina' => $professor_disciplina])
            ->with('success', 'Questão cadastrada com sucesso');
        }
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        $alternativa=[];
        $request->validate([
            'pergunta' => 'required|max:2000',
            'tipo' => 'required',
            'nivel' => 'required|numeric',
            'disciplina_id' => 'required|numeric',
            'professor_id' => 'required|numeric',
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
        if(auth()->check())
        {
            $questao = Questao::find($id);
            return view('questoes.edit', ['questao'=> $questao]);
        }
        return redirect()->route('login');
    }

    public function update(Request $request, $id)
    {
        $questao = Questao::find($id);

        $request->validate([
            'pergunta' => 'required|min:10|max:2000',
            'tipo' => 'required|numeric',
            'nivel' => 'required|numeric',
            'disciplina_id' => 'required|numeric',
            'professor_id' => 'required|numeric',
            'correta' => 'required',
        ]);
        
        $questao->update($request->all());
        $alternativa = DB::table('alternativas')
        ->select('id')->where('questao_id',$id)->get();

        for($i=0;$i<=4;$i++){
            $id_alternativa = $alternativa[$i]->id;
            $i++;
            $indice = 'alternativa' . $i;
            $nova_Respota=$request->$indice;
            $nova_Correta=$request->$indice;
            if($request->correta == 'correta' . $i){
                DB::table('alternativas')->where('id',$id_alternativa)->update(['resposta' => $nova_Respota,'correta'=> 1]);
            }else{
                DB::table('alternativas')->where('id',$id_alternativa)->update(['resposta' => $nova_Respota,'correta'=> 0]);
            }
            $i--;
        }
        return redirect()->route('questoes.index')
            ->with('success','Questão atualizada com successo');
    }

    public function destroy($id)
    {
        if(auth()->check())
        {
            $questao = Questao::find($id)->delete();
            $questao = DB::table('alternativas')
            ->where('questao_id',$id)
            ->delete();
      
            return redirect()->route('questoes.index')
                ->with('success','Questão apagada com successo');
        }
        return redirect()->route('login');
    }
}
