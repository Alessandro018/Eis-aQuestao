<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table= "turmas";

    protected $fillable = [
        'disciplina_id',
        'periodo_letivo_id'
    ];

    public function disciplinas()
    {
        return $this->hasMany('App\Disciplina', 'id', 'disciplina_id');
    }

    public function periodo()
    {
        return $this->hasOne('App\Periodo_Letivo', 'id', 'periodo_letivo_id');
    }
}
