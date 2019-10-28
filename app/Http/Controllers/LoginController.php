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
            'senha' => 'required'
            //'senha' => Hash::make($data['senha']
        ]);

        $lembrar = empty($request->lembrar) ? false : true;

        $usuario = User::where('siape', $request->siape)->first();
            
        if($usuario && $request->senha === $usuario->senha){
            Auth::loginUsingId($usuario->id, $lembrar);
            return view('home');
        }
        
        return view('login');
    }

   /* public function create(){
        return view('cadastro');
    }

    public function store(Request $request){
        $usuario = new User;
        $usuario->email = $request->login;
        $usuario->password = bcrypt($request->senha);
        $usuario->ativo = 1;
        $usuario->save();

        return redirect()->action('LoginController@form');

    }
     */

}
