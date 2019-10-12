<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor_Disciplina extends Model
{
    protected $table="professores_disciplinas";
    
    protected $fillable = [
        'disciplina_id','professor_id', 'periodo_letivo_id'
    ];

    public function nome()
    {
        return $this->hasMany('App\Disciplina', 'id');
    }

    public function periodo()
    {
        return $this->hasOne('App\Periodo_Letivo', 'id');
    }
}
