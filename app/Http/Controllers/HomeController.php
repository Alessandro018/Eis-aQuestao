<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Turma_Professor;

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
            $prof_periodo = Turma_Professor::join('turmas', 'turmas.id', '=', 'turmas_has_professores.turma_id')
            ->join('periodos_letivos', 'periodos_letivos.id', '=', 'turmas.periodo_letivo_id')
            ->select('periodos_letivos.*')
            ->where('turmas_has_professores.professor_id', auth()->user()->id)->distinct()->get();
            return view('home', ['professor_periodo' => $prof_periodo]);
        }
        return redirect()->route('login');
    }
}
