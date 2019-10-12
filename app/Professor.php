<?php

namespace App;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;


class Professor extends Model
{
    use AuthenticableTrait;
    protected $table = 'professores';
	protected $fillable = [
        'siape','campus', 'nome', 'senha'
    ];

    public function disciplinas()
    {
        return $this->hasMany('App\Professor_Disciplina', 'professor_id');
    }

    public function questoes()
    {
        return $this->hasMany('App\Questao', 'professor_id');
    }

}
