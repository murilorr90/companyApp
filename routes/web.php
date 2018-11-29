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

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('middleware' => 'auth'), function(){
    Route::get('funcionarios', 'FuncionarioController@index')->name('funcionarios.index');
    Route::get('funcionarios/create', 'FuncionarioController@create')->name('funcionarios.create');
    Route::get('funcionarios/{funcionario}/edit', 'FuncionarioController@edit')->name('funcionarios.edit');
    Route::get('funcionarios/{funcionario}', 'FuncionarioController@show')->name('funcionarios.show');
    Route::post('funcionarios', 'FuncionarioController@store')->name('funcionarios.store');
    Route::patch('funcionarios/{funcionario}', 'FuncionarioController@update')->name('funcionarios.update');
    Route::delete('funcionarios/{funcionario}', 'FuncionarioController@destroy')->name('funcionarios.destroy');

    Route::get('empresas', 'EmpresaController@index')->name('empresas.index');
    Route::get('empresas/create', 'EmpresaController@create')->name('empresas.create');
    Route::get('empresas/{empresa}/edit', 'EmpresaController@edit')->name('empresas.edit');
    Route::get('empresas/{empresa}', 'EmpresaController@show')->name('empresas.show');
    Route::post('empresas', 'EmpresaController@store')->name('empresas.store');
    Route::patch('empresas/{empresa}', 'EmpresaController@update')->name('empresas.update');
    Route::delete('empresas/{empresa}', 'EmpresaController@destroy')->name('empresas.destroy');
});
