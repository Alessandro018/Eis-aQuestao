<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma_Estudante extends Model
{
    protected $table = "turmas_has_estudantes";

    protected $fillable = [
        'turma_id',
        'estudante_id'
    ];
}
