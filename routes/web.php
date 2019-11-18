<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::put('/questoes','QuestaoController@desabilitar');
Route::put('/turma/detalhe','TurmaController@detalhe');
Route::resource('/questoes','QuestaoController');
Route::resource('/periodos_letivos', 'PeriodoLetivoController');
Route::resource('/prova', 'ProvaController');
Route::resource('/turma', 'TurmaController');
Route::post('/login', 'LoginController@login');
Route::get('/logout', function(){
        Auth::logout();
        return redirect()->route('login');
    });