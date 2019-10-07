<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo_Letivo extends Model
{
    protected $table="periodo_letivo";
protected $fillable = [
        'ano', 'semestre'
    ];
}
