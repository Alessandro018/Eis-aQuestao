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
        'questoes_nivel_3',
        'created_at'
    ];

    public function turma()
    {
        return $this->hasOne('App\Turma', 'id', 'turma_id');
    }
}
