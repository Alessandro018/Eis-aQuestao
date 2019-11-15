<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Turma;
use App\Disciplina;
use App\Estudantes;
use App\Periodo_letivo;

class TurmaController extends Controller
{
    public function index(){
        if(auth()->check()){
            $turmas = DB::table('turmas_has_estudantes')
            ->join('turmas', 'turmas.id', '=', 'turmas_has_estudantes.turma_id')
            ->join('estudantes', 'estudantes.id', '=', 'turmas_has_estudantes.estudante_id')
            ->join('disciplinas','disciplinas.id', '=', 'turmas.disciplina_id')
            ->join('periodos_letivos','periodos_letivos.id', '=', 'turmas.periodo_letivo_id')
            ->select('turmas.*','estudantes.matricula','estudantes.nome','disciplinas.nome as materia','periodos_letivos.*')
            ->simplePaginate(5);
            
            return view('turma', ['turmas' => $turmas]);

            // return view('turma');
        }
        return redirect()->route('login');
    }
}
