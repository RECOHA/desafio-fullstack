<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'usuarios'], function () {
    Route::get('/', 'UsuarioController@index');
    Route::get('/visualizar/{usuario}', 'UsuarioController@show');
    Route::post('/novo', 'UsuarioController@store');
    Route::post('/editar', 'UsuarioController@update');
    Route::get('/excluir/{usuario}', 'UsuarioController@destroy');
});