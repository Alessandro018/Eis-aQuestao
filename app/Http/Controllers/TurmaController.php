<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Turma;
use App\Curso;
use App\Disciplina;
use App\Periodo_letivo;
use App\Estudante;
use App\Turma_Estudante;
use App\Turma_Professor;
use Excel;

class TurmaController extends Controller
{
    public function index(){
        if(auth()->check()){
            $turmas = DB::table('turmas_has_professores')
            ->join('turmas', 'turmas.id', '=', 'turmas_has_professores.turma_id')
            ->join('disciplinas','disciplinas.id', '=', 'turmas.disciplina_id')
            ->join('cursos','cursos.id', '=', 'disciplinas.curso_id')
            ->join('periodos_letivos','periodos_letivos.id', '=', 'turmas.periodo_letivo_id')
            ->select('turmas.*','disciplinas.nome as materia','cursos.nome as curso','periodos_letivos.*')
            ->simplePaginate(5);
            $periodos_letivos = \App\Periodo_Letivo::all();
            $cursos = \App\Curso::all();
            $disciplinas = \App\Disciplina::all();
            return view('turma', ['turmas' => $turmas, 'periodos_letivos' => $periodos_letivos, 'cursos' => $cursos, 'disciplinas' => $disciplinas]);
        }
        return redirect()->route('login');
    }

    public function disciplinas(Request $request)
    {
        $disciplinas = DB::table('disciplinas')
        ->select('disciplinas.id', 'disciplinas.nome')->where('disciplinas.curso_id', '=', $request->curso)->get();
        return $disciplinas;
    } 

    public function store(Request $request){
        $request->validate([
            'curso' => 'required|numeric',
            'disciplina' => 'required|numeric',
            'periodo_letivo' => 'required|numeric',
            'file' => 'required',
            'turno' => 'required'
        ]);
        $data = Excel::toArray(null, request()->file('file'));
        $rows = $data[0];
        $check_turma = DB::table('turmas')->where('disciplina_id',$request->disciplina)->where('periodo_letivo_id',$request->periodo_letivo)->count();
        if($check_turma == 0){
            Turma::create([
                'disciplina_id' => $request->disciplina,
                'periodo_letivo_id' => $request->periodo_letivo,
            ]);
            $turma_id = intval(DB::getPdo()->lastInsertId());
            Turma_Professor::create([
                'turma_id' => $turma_id,
                'professor_id' =>auth()->user()->id,
            ]);
        }else{
            $turma_id = DB::table('turmas')->select('id')->where('disciplina_id', $request->disciplina and 'periodo_letivo_id', $request->periodo_letivo)->first()->id;
            if(DB::table('turmas_has_professores')->where('turma_id',$turma_id and 'professor_id', auth()->user()->id)->count()==0){
                Turma_Professor::create([
                    'turma_id' => $turma_id,
                    'professor_id' =>auth()->user()->id,
                ]);
            }
        }
        foreach ($rows as $row) 
        {
            if(DB::table('estudantes')->where('matricula', $row[2])->count() == 0){
                Estudante::create([
                    'nome' => $row[0],
                    'email' => $row[1],
                    'matricula' => $row[2],
                ]);
                $estudantes_id = intval(DB::getPdo()->lastInsertId());
            }else{
                $estudantes_id= DB::table('estudantes')->select('id')->where('matricula', $row[2])->first()->id;
            }
            $Turma_Estudante = new Turma_Estudante;
            $Turma_Estudante->turma_id = $turma_id;
            $Turma_Estudante->estudante_id = $estudantes_id;
            $Turma_Estudante->save();
        }

        return redirect()->route('turma.index')->with('success','Turma criada com successo.');
    }
}
