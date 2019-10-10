<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo_Letivo extends Model
{
    protected $table="periodos_letivos";
protected $fillable = [
        'ano', 'semestre'
    ];
}
