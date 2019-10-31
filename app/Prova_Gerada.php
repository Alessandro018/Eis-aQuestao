<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova_Gerada extends Model
{
 protected $table = "prova_geradas";
    
    protected $fillable = [
        'prova_id','estudante_id'
    ];
}
