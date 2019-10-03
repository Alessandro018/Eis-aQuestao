<?php

namespace App\Http\Controllers;

use App\Questao;
use Illuminate\Http\Request;

class QuestaoController extends Controller
{
    public function index()
    {
        $questoes = Questao::latest()->paginate(5);

        return view('questao.index',compact('questoes'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('questao.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pergunta' => 'required',
            'tipo' => 'required',
            'nivel' => 'required',
            'disciplina_id' => 'required',
        ]);
        Questao::create($request->all());
        return redirect()->route('questao.index')
            ->with('success','Questão criada com successo.');
    }

    public function edit(Questao $questao)
    {
        return view('questao.edit',compact('questao'));
    }

    public function update(Request $request, Questao $questao)
    {
        $request->validate([
            'pergunta' => 'required',
            'tipo' => 'required',
            'nivel' => 'required',
            'disciplina_id' => 'required',
        ]);
  
        $questao->update($request->all());
  
        return redirect()->route('questao.index')
                        ->with('success','Questão atualizada com successo');
    }

    public function destroy(Questao $questao)
    {
        $questao->delete();
  
        return redirect()->route('questao.index')
                        ->with('success','Questão apagada com successo');
    }
}
