<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    protected $table="estudante";
protected $fillable = [
        'nome','email', 'matricula'
    ];
}
