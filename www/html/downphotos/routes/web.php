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

Route::get('/galeria', 'GaleriaController@create');

Route::post('/upload', 'UploadController@upload');

Route::get('usuario/{userId}/remover/{fileId}', [ 'as' => 'Imagem.destroy', 'uses' => 'ImagemController@destroy'])->middleware('auth');
Route::get('usuario/baixar', ['as' => 'Imagem.download', 'uses' => 'ImagemController@downloadN'])->middleware('auth');
Route::get('usuario/preview/{fileId}', ['as' => 'Imagem.preview', 'uses' => 'ImagemController@preview'])->middleware('auth');
Route::get('usuario/previewLarge/{fileId}', ['as' => 'Imagem.previewLarge', 'uses' => 'ImagemController@previewLarge'])->middleware('auth');
Route::get('usuario/previewMedium/{fileId}', ['as' => 'Imagem.previewMedium', 'uses' => 'ImagemController@previewMedium'])->middleware('auth');
Route::post('/actions', ['as' => 'Imagem.actions', 'uses' => 'ImagemController@actions'])->middleware('auth');
Route::post('/cancela', ['as' => 'Imagem.cancela', 'uses' => 'ImagemController@cancela'])->middleware('auth');
Route::get('/fotos/editar/{fileID}', ['as' => 'Imagem.editarPage', 'uses' => 'ImagemController@editarFoto'])->middleware('auth');
Route::post('/fotos/editar/dados', ['as' => 'Imagem.editarDadosImagem', 'uses' => 'ImagemController@editarDadosFoto'])->middleware('auth');
Route::get('/foto/publicar/{fileID}', ['as' => 'Imagem.publicarImagem', 'uses' => 'ImagemController@publicarFoto'])->middleware('auth');
Route::post('/foto/publicar/dados', ['as' => 'Imagem.publicarDadosImagem', 'uses' => 'ImagemController@publicarDadosFoto'])->middleware('auth');
Route::get('/foto/filtrar/{filtro}', ['as' => 'Imagem.filtrarImagem', 'uses' => 'ImagemController@filtro'])->middleware('auth');
Route::post('/foto/pesquisar', ['as' => 'Imagem.pesquisarImagem', 'uses' => 'ImagemController@pesquisar'])->middleware('auth');

Route::post('/galeria/pesquisar', ['as' => 'Galeria.pesquisarImagem', 'uses' => 'GaleriaController@pesquisar']);
Route::get('/galeria/preview/{fileId}', ['as' => 'Galeria.preview', 'uses' => 'GaleriaController@preview']);
Route::get('/galeria/painel/{fileId}', ['as' => 'Galeria.PainelCompra', 'uses' => 'GaleriaController@painel']);