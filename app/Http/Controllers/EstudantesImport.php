<?php

namespace App\Http\Controllers;

use App\Estudante;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class EstudantesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            Estudante::create([
                'nome' => $row[0],
                'email' => $row[1],
                'matricula' => $row[2],
            ]);
    }
}
