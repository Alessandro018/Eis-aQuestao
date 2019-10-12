<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    protected $table="alternativas";
    protected $fillable = [
        'resposta',
        'correta',
        'questao_id'
    ];
}
