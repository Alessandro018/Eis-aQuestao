<?php

namespace App;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;


class Professor extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;
    protected $table = 'professores';
	protected $fillable = [
        'siape','campus', 'nome', 'senha'
    ];
}
