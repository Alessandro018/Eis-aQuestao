<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table="disciplinas";
    
    protected $fillable = [
        'nome', 'curso_id'
    ];

    public function questoes()
    {
        return $this->hasMany('App\Questao', 'disciplina_id');
    }

}
