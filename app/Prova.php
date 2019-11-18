<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    protected $table = "provas";

    protected $fillable = [
        'turma_id',
        'cabecalho',
        'questoes_nivel_1',
        'questoes_nivel_2',
        'questoes_nivel_3'
    ];
}
