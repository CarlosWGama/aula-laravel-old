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

Route::get('/', 'LoginController@login');
Route::get('/login', 'LoginController@login');
Route::post('/logar', 'LoginController@logar');
Route::get('/logout', 'LoginController@logout');

Route::group(['prefix' => 'livros'], function () {
    Route::get('/', 'LivrosController@listar')->name('livros.listar');
    Route::get('/novo', 'LivrosController@novo')->name('livros.novo');
    Route::post('/salvar', 'LivrosController@salvar')->name('livros.salvar');
    Route::get('/editar/{id}', 'LivrosController@editar')->name('livros.editar');
    Route::post('/atualizar/{id}', 'LivrosController@atualizar')->name('livros.atualizar');
    Route::get('/excluir/{id}', 'LivrosController@excluir')->name('livros.excluir');
    Route::get('/visualizar/{id}', 'LivrosController@visualizar')->name('livros.visualizar');
});
