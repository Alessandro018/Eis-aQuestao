<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor_Disciplina extends Model
{
     protected $table="professores_disciplinas";
    protected $fillable = [
        'disciplina_id','professor_id', 'periodo_letivo_id'
    ];
}
