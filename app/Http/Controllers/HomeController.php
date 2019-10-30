<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Professor;
use App\Professor_Disciplina;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->check())
        {
            $prof_periodo = Professor_Disciplina::join('periodos_letivos', 'periodos_letivos.id', '=', 'professores_disciplinas.periodo_letivo_id' )
            ->select('periodos_letivos.*')
            ->where('professores_disciplinas.professor_id', auth()->user()->id)->get();
            return view('home', ['professor_periodo' => $prof_periodo]);
        }
        return redirect()->route('login');
    }
}
