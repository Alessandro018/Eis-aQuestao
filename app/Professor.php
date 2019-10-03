<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
protected $fillable = [
        'siape','campus', 'nome', 'senha'
    ];
}
