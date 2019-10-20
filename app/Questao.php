<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Questao extends Model
{
    protected $table = "questoes";
    
    protected $fillable = [
        'pergunta','tipo', 'nivel', 'professor_id', 'disciplina_id'
    ];

    public function professor()
    {
        return $this->hasOne('App\Professor', 'id', 'professor_id');
    }
    
    public function alternativas()
    {
        return $this->hasMany('App\Alternativa', 'questao_id', 'id');
    }
}
?>