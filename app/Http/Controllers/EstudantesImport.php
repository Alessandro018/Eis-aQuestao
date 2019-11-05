<?php

namespace App\Http\Controllers;

use App\Estudante;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

class EstudantesImport implements ToCollection
{
    /**
    * @param array $rows
    *
    * @return \Illuminate\Database\Eloquent\Collection|null
    */

    public function collection(Collection $rows)
    {
        // $value=[];
        foreach ($rows as $row) 
        {
            if(DB::table('estudantes')->where('matricula', $row[2])->count() == 0){
                Estudante::create([
                    'nome' => $row[0],
                    'email' => $row[1],
                    'matricula' => $row[2],
                ]);
                // $value[] = DB::getPdo()->lastInsertId();
            }
            // $value[] = DB::table('estudantes')->select('id')->where('matricula', $row[2])->get();
        }
        // var_dump($value);
        // return redirect('/import_estudante')->with('success','Os estudantes foram inserido');
    }
}
