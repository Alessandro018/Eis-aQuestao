<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = "professores";
    use Notifiable;

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
