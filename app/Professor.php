<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Professor extends Authenticatable
{
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
