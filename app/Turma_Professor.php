<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma_Professor extends Model
{
    protected $table="turmas_has_professores";
    
    protected $fillable = [
        'turma_id',
        'professor_id',
    ];

    public function turmas()
    {
        return $this->hasMany('App\Turma', 'id', 'turma_id');
    }
}
