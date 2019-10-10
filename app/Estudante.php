<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    protected $table="estudantes";
    protected $fillable = [
        'nome','email', 'matricula'
    ];
}
