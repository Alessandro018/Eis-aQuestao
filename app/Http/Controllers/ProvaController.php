<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Prova;
use App\Prova_Gerada;
use App\Questao;
use App\Estudante;
use Illuminate\Support\Facades\DB;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;

class ProvaController extends Controller
{
    public function index()
    {
        if(auth()->check())
        {
            $professor_disciplina = DB::table('professores_disciplinas')
            ->join('disciplinas', 'disciplinas.id', '=', 'professores_disciplinas.disciplina_id')
            ->select('disciplinas.nome', 'disciplinas.id')
            ->where('professores_disciplinas.professor_id', auth()->user()->id)->get();
            return view('provas.index', ['professor_disciplina' => $professor_disciplina]);    
        }
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'disciplina_id' => 'required|numeric',
            'professor_id' => 'required|numeric',
            'cabecalho' => 'required|string',
            'nivel1' => 'required|numeric',
            'nivel2' => 'required|numeric',
            'nivel3' => 'required|numeric',
            'file' => 'required'
        ]);
        $data = Excel::toArray(null, request()->file('file'));
        $rows = $data[0];
        foreach ($rows as $row) 
        {
            if(DB::table('estudantes')->where('matricula', $row[2])->count() == 0){
                Estudante::create([
                    'nome' => $row[0],
                    'email' => $row[1],
                    'matricula' => $row[2],
                ]);
                $values[] = intval(DB::getPdo()->lastInsertId());
            }else{
                $values[] = DB::table('estudantes')->select('id')->where('matricula', $row[2])->first()->id;
            }
        }
        $prova = Prova::create($request->all());
        foreach($values as $key => $value)
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
            $prova_estudante->estudante_id = $value;
            $prova_estudante->save();

            $provas[$key]['questoes'][0] = $questao1;
            $provas[$key]['questoes'][1] = $questao2;
            $provas[$key]['questoes'][2] = $questao3;
            $provas[$key]['cabecalho'] = $request->cabecalho;
        }
        return PDF::loadView('provas.pdf', ['provas' => $provas])->stream('teste.pdf');
    }
}