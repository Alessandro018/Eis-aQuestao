<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table= "turmas";

    protected $fillable = [
        'disciplina_id',
        'estudante_id',
        'periodo_letivo_id'
    ];
}
