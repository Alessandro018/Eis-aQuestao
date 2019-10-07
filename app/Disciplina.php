<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table="disciplina";
protected $fillable = [
        'nome', 'curso_id'
    ];
}
