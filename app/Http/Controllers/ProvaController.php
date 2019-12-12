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
            $disciplina = \App\Disciplina::all();

            $professor_prova = Prova::join('turmas', 'turmas.id', 'provas.turma_id')
            ->join('turmas_has_professores', 'turmas_has_professores.turma_id', 'turmas.id')
            ->join('periodos_letivos', 'periodos_letivos.id', '=', 'turmas.periodo_letivo_id')
            ->join('disciplinas', 'disciplinas.id', 'turmas.disciplina_id')
            ->select('*','provas.id', 'provas.created_at')
            ->where('turmas_has_professores.professor_id', auth()->user()->id)
            ->orderBy('provas.created_at', 'desc')
            ->paginate(5);
            
            $periodo_letivo = \App\Periodo_Letivo::all();
            $cursos = \App\Curso::all();

            return view('provas.index', ['disciplinas' => $disciplina,
             'provas' => $professor_prova, 'periodos_letivos' => $periodo_letivo, 'cursos' => $cursos]);    
        }
        return redirect()->route('login');
    }

    public function buscar(Request $request)
    {
        if(auth()->check())
        {
            $check_curso = $request->curso;
            $check_disciplina = $request->disciplina;
            $check_periodo_letivo = $request->periodo_letivo;
            
            $professor_prova = Prova::join('turmas', 'turmas.id', 'provas.turma_id')
            ->join('turmas_has_professores', 'turmas_has_professores.turma_id', 'turmas.id')
            ->join('periodos_letivos', 'periodos_letivos.id', '=', 'turmas.periodo_letivo_id')
            ->join('disciplinas', 'disciplinas.id', 'turmas.disciplina_id')
            ->select('disciplinas.*', 'disciplinas.id as disc_id', 'periodos_letivos.ano', 'periodos_letivos.semestre',
             'turmas.turno', 'provas.id', 'provas.created_at')
            ->when($check_curso,function($q) use ($request){
                $q->where('disciplinas.curso_id', $request->curso);   
            })
            ->when($check_disciplina,function($q) use ($request){
                $q->where('disciplinas.id', $request->disciplina);   
            })
            ->when($check_periodo_letivo,function($q) use ($request){
                $q->where('periodos_letivos.id', $request->periodo_letivo);   
            })
            ->where(function($q) use ($request){
                $q->where('turmas_has_professores.professor_id','=',auth()->user()->id);   
            })
            ->orderBy('provas.created_at', 'desc')
            ->paginate(5);

            $disciplina = \App\Disciplina::all();
            $periodo_letivo = \App\Periodo_Letivo::all();
            $cursos = \App\Curso::all();

            return view('provas.index', ['disciplinas' => $disciplina,
             'provas' => $professor_prova, 'periodos_letivos' => $periodo_letivo, 'cursos' => $cursos]);    
        }
        return redirect()->route('login');
    }

    public function turmas(Request $request)
    {
        $turmas = DB::table('turmas_has_professores')
        ->join('turmas', 'turmas.id', 'turmas_has_professores.turma_id')
        ->join('disciplinas', 'disciplinas.id', 'turmas.disciplina_id')
        ->join('cursos', 'cursos.id', 'disciplinas.curso_id')
        ->join('periodos_letivos', 'periodos_letivos.id', 'turmas.periodo_letivo_id')
        ->select('turmas.id as id', 'turmas.turno as turno', 'disciplinas.nome as nome', 'disciplinas.id as disciplina',
         'periodos_letivos.ano as ano', 'periodos_letivos.semestre as semestre')
        ->where('turmas_has_professores.professor_id', $request->professor)
        ->where('cursos.id', $request->curso)->get();
        return $turmas;
    }

    public function store(Request $request)
    {
        $request->validate([
            'turma_id' => 'required|numeric',
            'cabecalho' => 'required|string',
            'questoes_nivel_1' => 'required|numeric|min:0|max:50',
            'questoes_nivel_2' => 'required|numeric|min:0|max:50',
            'questoes_nivel_3' => 'required|numeric|min:0|max:50',
        ]);
        
        $prova = Prova::create($request->all());
        // foreach($values as $key => $value)
        // {
            if($request->questoes_nivel_1 == 0 && $request->questoes_nivel_2 == 0 && $request->questoes_nivel_3 == 0)
            {
                return redirect('/prova')->withErrors('Os três campos de quantidade de questões não podem ser iguais a zero');
            }
        //     if($request->questoes_nivel_1 >0)
        //     {
        //         $questao1 = Questao::with('alternativas')->where('questoes.disciplina_id', $request->disciplina_id)
        //         ->where('questoes.nivel',1)->limit($request->questoes_nivel_1)->get();
        //     }
        //     if($request->questoes_nivel_2 >0)
        //     {
        //         $questao2 = Questao::with('alternativas')->where('questoes.disciplina_id', $request->disciplina_id)
        //         ->where('questoes.nivel',2)->inRandomOrder()->limit($request->questoes_nivel_2)->get();
        //     }
        //     if($request->questoes_nivel_3 >0)
        //     {
        //         $questao3 = Questao::with('alternativas')->where('questoes.disciplina_id', $request->disciplina_id)
        //         ->where('questoes.nivel',3)->inRandomOrder()->limit($request->questoes_nivel_3)->get();
        //     }
            // $prova_estudante = new Prova_Gerada;
            // $prova_estudante->prova_id = $prova->id;
            // $prova_estudante->estudante_id = $value;
            // $prova_estudante->save();

            // $provas[$key]['questoes'][0] = $questao1;
            // $provas[$key]['questoes'][1] = $questao2;
            // $provas[$key]['questoes'][2] = $questao3;
            // $provas[$key]['cabecalho'] = $request->cabecalho;
        // }
        // return PDF::loadView('provas.pdf', ['provas' => $provas])->stream('teste.pdf');
        return redirect('/prova')->with('success', 'Prova criada com sucesso');
    }

    public function edit($id)
    {
        if(auth()->check())
        {
            $prova = Prova::find($id);
            $curso_id = DB::table('provas')
            ->join('turmas','turmas.id','=','provas.turma_id')
            ->join('disciplinas','disciplinas.id','=','turmas.disciplina_id')
            ->join('cursos','cursos.id','=','disciplinas.curso_id')
            ->select('cursos.*')
            ->where('provas.id','=',$id)->first();

            $turma = DB::table('provas')
            ->join('turmas','turmas.id','=','provas.turma_id')
            ->join('disciplinas','disciplinas.id','=','turmas.disciplina_id')
            ->join('periodos_letivos','periodos_letivos.id','=','turmas.periodo_letivo_id')
            ->select('turmas.id','disciplinas.nome as disciplinas','periodos_letivos.ano as ano','periodos_letivos.semestre as semestre','turmas.turno')
            ->where('provas.id','=',$id)->first();

            $turmas = DB::table('turmas_has_professores')
            ->join('turmas', 'turmas.id', 'turmas_has_professores.turma_id')
            ->join('disciplinas', 'disciplinas.id', 'turmas.disciplina_id')
            ->join('cursos', 'cursos.id', 'disciplinas.curso_id')
            ->join('periodos_letivos', 'periodos_letivos.id', 'turmas.periodo_letivo_id')
            ->select('turmas.id as id', 'turmas.turno as turno', 'disciplinas.nome as nome', 'disciplinas.id as disciplina',
            'periodos_letivos.ano as ano', 'periodos_letivos.semestre as semestre')
            ->where('turmas_has_professores.professor_id', auth()->user()->id)
            ->get();

            $cursos = \App\Curso::all();
            return view('provas.edit', ['prova'=> $prova, 'cursos'=> $cursos,'curso_id' => $curso_id, 'turma' => $turma, 'turmas' => $turmas]);
        }
        return redirect()->route('login');
    }

    public function update(Request $request, $id)
    {
        $prova = Prova::find($id);

        $request->validate([
            'curso' => 'required|',
            'turma_id' => 'required',
            'cabecalho' => 'required|string',
            'questoes_nivel_1' => 'required|numeric|min:0|max:50',
            'questoes_nivel_2' => 'required|numeric|min:0|max:50',
            'questoes_nivel_3' => 'required|numeric|min:0|max:50',
        ]);
        
        $prova->update($request->all());

        return redirect()->route('prova.index')->with('success','Prova atualizada com successo');
    }

    public function destroy($id)
    {
        Prova::find($id)->delete();
        return redirect('/prova')->with('success', 'Prova excluída com sucesso');
    }
    public function generate($id) {
        $prova = Prova::find($id);
        $provas = [];
        $turma = $prova->turma;
        $estudantes = $turma->estudantes();
        $questoes = $turma->disciplina->questoes;
        
        $q1 = $questoes->filter(function($v) {
            return $v->nivel == 1;
        });
        $q2 = $questoes->filter(function($v) {
            return $v->nivel == 2;
        });
        $q3 = $questoes->filter(function($v) {
            return $v->nivel == 3;
        });

        foreach($estudantes as $estudante) {
            $p = [
                'cabecalho' => $prova->cabecalho,
                'questoes' => [[], [], []]
            ];
            $_q1 = $q1->shuffle();
            $_q2 = $q2->shuffle();
            $_q3 = $q3->shuffle();

            for($i = 0; $i < $prova->questoes_nivel_1; $i++) {
                $q = $_q1->pop();
                $p['questoes'][0][$q->id] = ['pergunta' => $q->pergunta, 'alternativas' => $q->alternativas->shuffle()];
            }

            for($i = 0; $i < $prova->questoes_nivel_2; $i++) {
                $q = $_q2->pop();
                $p['questoes'][1][$q->id] = ['pergunta' => $q->pergunta, 'alternativas' => $q->alternativas->shuffle()];
            }

            for($i = 0; $i < $prova->questoes_nivel_3; $i++) {
                $q = $_q3->pop();
                $p['questoes'][2][$q->id] = ['pergunta' => $q->pergunta, 'alternativas' => $q->alternativas->shuffle()];
            }
            $provas[] = $p;
        }
        return PDF::loadView('provas.pdf', ['provas' => $provas])->stream('teste.pdf');
    }
}