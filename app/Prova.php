<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    protected $table = "provas";

    protected $fillable = [
        'professor_id',
        'cabecalho',
    ];
}
