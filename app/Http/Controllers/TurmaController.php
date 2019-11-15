<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Turma;
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
            $turmas = DB::table('turmas_has_estudantes')
            ->join('turmas', 'turmas.id', '=', 'turmas_has_estudantes.turma_id')
            ->join('estudantes', 'estudantes.id', '=', 'turmas_has_estudantes.estudante_id')
            ->join('disciplinas','disciplinas.id', '=', 'turmas.disciplina_id')
            ->join('cursos','cursos.id', '=', 'disciplinas.curso_id')
            ->join('periodos_letivos','periodos_letivos.id', '=', 'turmas.periodo_letivo_id')
            ->select('turmas.*','estudantes.matricula','estudantes.nome','disciplinas.nome as materia','cursos.nome as curso','periodos_letivos.*')
            ->simplePaginate(5);

            return view('turma', ['turmas' => $turmas]);
        }
        return redirect()->route('login');
    }
    public function store(Request $request){
        $request->validate([
            'curso' => 'required|numeric',
            'disciplina' => 'required|numeric',
            'periodo_letivo' => 'required|numeric',
            'file' => 'required'
        ]);
        $data = Excel::toArray(null, request()->file('file'));
        $rows = $data[0];
        echo($request->disciplina);
        if(DB::table('turmas')->where('disciplina_id',$request->disciplina and 'periodo_letivo_id',$request->periodo_letivo)->count() == 0){
            Turmas::create([
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
            echo 'test';
        }
        var_dump($turma_id);
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

        return view('turma')->with('success','Turma criada com successo.');
    }
}
