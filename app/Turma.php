<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Estudante;

class Turma extends Model
{
    protected $table= "turmas";

    protected $fillable = [
        'disciplina_id',
        'periodo_letivo_id',
        'turno'
    ];

    public function disciplinas()
    {
        return $this->hasMany('App\Disciplina', 'id', 'disciplina_id');
    }

    public function disciplina()
    {
        return $this->hasOne('App\Disciplina', 'id', 'disciplina_id');
    }

    public function estudantes()
    {
        $estudantes = Estudante::join('turmas_has_estudantes', 'estudante_id', 'estudantes.id')
            ->where('turma_id', '=', $this->id)
            ->get();
        return $estudantes;
    }

    public function periodo()
    {
        return $this->hasOne('App\Periodo_Letivo', 'id', 'periodo_letivo_id');
    }
}
