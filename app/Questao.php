<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Questao extends Model
{
    protected $fillable = [
        'pergunta','tipo', 'nivel', 'professor_id', 'disciplina_id'
    ];
}
?>