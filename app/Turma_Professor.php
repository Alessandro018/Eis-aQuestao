<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma_Professor extends Model
{
    protected $table="turmas_has_professores";
    
    protected $fillable = [
        'turma_id',
        'professor_id',
    ];

    public function nomes_disciplinas()
    {
        return $this->hasMany('App\Disciplina', 'id', 'disciplina_id');
    }

    public function periodo()
    {
        return $this->hasOne('App\Periodo_Letivo', 'id');
    }
}
