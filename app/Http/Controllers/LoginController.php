<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;

class LoginController extends Controller
{
    
    public function form(){
        if(Auth::user())
            return view('home');
        else
            return view('login');
    }

    public function login(Request $request){
        
        $request->validate([
            'siape' => 'required',
            'senha' => 'required',
        ]);

        $lembrar = empty($request->lembrar) ? false : true;

        $usuario = User::where('siape', $request->siape)->first();
            
        if($usuario && Hash::check($request->senha, $usuario->senha)){
            Auth::loginUsingId($usuario->id, $lembrar);
            return redirect()->route('home');
        }
        
        return view('login');
    }
}
