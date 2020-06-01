<?php

use Illuminate\Support\Facades\Route;

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

    $Ambientes = \App\Ambiente::all();
    return $Ambientes;
    //return view('welcome');
});

Route::get('/sobre', function() {
    return view('sobre');

});

Route::resource('/ambientes', 'ambienteController');

Route::resource('/sgbds', 'sgbdController');

Route::resource('/gruposUsuarios', 'grupoUsuarioController');

Route::resource('/privilegios', 'privilegioController');

Route::get('/gruposUsuarios/confirm/{id}', 'grupoUsuarioController@confirm')->name('gruposUsuarios.confirm');

Route::get('/ambientes/confirm/{id}', 'ambienteController@confirm')->name('ambientes.confirm');