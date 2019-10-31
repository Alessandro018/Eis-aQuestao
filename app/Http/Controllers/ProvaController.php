<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
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

    public function store()
    {
        return "c";
    }
}
