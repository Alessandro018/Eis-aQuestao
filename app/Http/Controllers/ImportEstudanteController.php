<?php

namespace App\Http\Controllers;

use App\Estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Excel;
use App\Http\Controllers\EstudantesImport;

class ImportEstudanteController extends Controller
{
    function index(){
        $data = DB::table('estudantes')
        ->orderBy('id')
        ->get();

        return view('import_estudante', compact('data'));
    }

    public function update(Request $request)
    {
        Excel::import(new EstudantesImport, request()->file('file'));

        return redirect('/import_estudante')->with('success','Os estudantes foram inserido');
    }

}
