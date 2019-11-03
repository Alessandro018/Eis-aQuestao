<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Prova;
use App\Prova_Gerada;
use App\Questao;
use App\Estudante;
use Illuminate\Support\Facades\DB;

class ProvaController extends Controller
{
    public function index()
    {
        $professor_disciplina = DB::table('professores_disciplinas')
        ->join('disciplinas', 'disciplinas.id', '=', 'professores_disciplinas.disciplina_id')
        ->select('disciplinas.nome', 'disciplinas.id')
        ->where('professores_disciplinas.professor_id', auth()->user()->id)->get();
        return view('provas.index', ['professor_disciplina' => $professor_disciplina]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'disciplina_id' => 'required',
            'professor_id' => 'required',
            'cabecalho' => 'required',
            'nivel1' => 'required',
            'nivel2' => 'required',
            'nivel3' => 'required',
        ]);

        $prova = Prova::create($request->all());
        $estudante = Estudante::all();
        foreach($estudante as $personalizada)
        {
            if($request->nivel1 == 0 && $request->nivel2 == 0 && $request->nivel3 == 0)
            {
                return redirect('/prova')->withErrors('Os três campos de quantidade de questões não podem ser iguais a zero');
            }
            if($request->nivel1 >0)
            {
                $questao1 = Questao::with('alternativas')->where('questoes.disciplina_id', $request->disciplina_id)
                ->where('questoes.nivel',1)->limit($request->nivel1)->get();
            }
            if($request->nivel2 >0)
            {
                $questao2 = Questao::with('alternativas')->where('questoes.disciplina_id', $request->disciplina_id)
                ->where('questoes.nivel',2)->inRandomOrder()->limit($request->nivel2)->get();
            }
            if($request->nivel3 >0)
            {
                $questao3 = Questao::with('alternativas')->where('questoes.disciplina_id', $request->disciplina_id)
                ->where('questoes.nivel',3)->inRandomOrder()->limit($request->nivel3)->get();
            }
            $prova_estudante = new Prova_Gerada;
            $prova_estudante->prova_id = $prova->id;
            $prova_estudante->estudante_id = $personalizada->id;
            $prova_estudante->save();
        }
    }
}