<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. LogThese
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('home'); # é uma forma de referencia para a url especificada no route.
Route::get('/inicio', 'HomeController@index');

Route::get('/usuario', [ 'as' => 'login', 'uses' => 'UsuarioController@create'])->name('login');; 
Route::get('/envio', 'UsuarioController@envio')->middleware('auth');
Route::post('/usuario', 'UsuarioController@store'); 
Route::get('/sair', 'UsuarioController@destroy');
Route::get('/preview/{fileId}', 'UsuarioController@preview')->middleware('auth'); 


Route::get('/registro', 'RegistroController@create')->name('registro');
Route::post('/registro', 'RegistroController@store'); 

Route::get('/galeria', 'ProdutoController@create');

Route::post('/upload', 'UploadController@upload');

Route::get('usuario/{userId}/remover/{fileId}', [ 'as' => 'files.destroy', 'uses' => 'FilesController@destroy'])->middleware('auth');
Route::get('usuario/baixar', ['as' => 'files.download', 'uses' => 'FilesController@downloadN'])->middleware('auth');
Route::get('usuario/preview/{fileId}', ['as' => 'files.preview', 'uses' => 'FilesController@preview'])->middleware('auth');
Route::get('usuario/previewLarge/{fileId}', ['as' => 'files.previewLarge', 'uses' => 'FilesController@previewLarge'])->middleware('auth');
Route::get('usuario/previewMedium/{fileId}', ['as' => 'files.previewMedium', 'uses' => 'FilesController@previewMedium'])->middleware('auth');
Route::post('/actions', ['as' => 'files.actions', 'uses' => 'FilesController@actions'])->middleware('auth');
Route::post('/cancela', ['as' => 'files.cancela', 'uses' => 'FilesController@cancela'])->middleware('auth');
Route::post('/fotos/editar', ['as' => 'files.editar', 'uses' => 'FilesController@editarFoto'])->middleware('auth');

