<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Input;

class ImportEstudanteController extends Controller
{
    function index(){
        $data = DB::table('estudantes')
        ->orderBy('nome')
        ->get();

        return view('import_estudante', compact('data'));
    }

    
}
