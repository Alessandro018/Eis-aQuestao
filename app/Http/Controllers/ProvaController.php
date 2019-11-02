<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Prova;
use App\Questao;
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

    public function teste(Request $request)
    {
        $request->validate([
            'disciplina' => 'required',
            'professor_id' => 'required',
            'cabecalho' => 'required',
            'nivel1' => 'required',
            'nivel2' => 'required',
            'nivel3' => 'required',
        ]);
        if($request->nivel1 >0)
        {
            $questao1 = Questao::with('alternativas')->where('questoes.disciplina_id', $request->disciplina)
            ->where('questoes.nivel',1)->limit($request->nivel1)->get();
        }
        if($request->nivel2 >0)
        {
            $questao2 = Questao::with('alternativas')->where('questoes.disciplina_id', $request->disciplina)
            ->where('questoes.nivel',2)->inRandomOrder()->limit($request->nivel2)->get();
        }
        if($request->nivel3 >0)
        {
            $questao3 = Questao::with('alternativas')->where('questoes.disciplina_id', $request->disciplina)
            ->where('questoes.nivel',3)->inRandomOrder()->limit($request->nivel3)->get();
        }
        
    }
}