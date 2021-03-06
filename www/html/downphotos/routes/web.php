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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home'); # é uma forma de referencia para a url especificada no route.
Route::get('/sobre', 'HomeController@about');
Route::get('/time', 'HomeController@time');
Route::get('/faq', 'HomeController@faq');

Route::get('/inicio', 'HomeController@index');
#gulp ^
Route::get('/usuario', [ 'as' => 'login', 'uses' => 'UsuarioController@create'])->name('login');; 
Route::get('/envio', 'UsuarioController@envio')->middleware('naoLogado');
Route::post('/usuario', 'UsuarioController@store'); 
Route::get('/sair', 'UsuarioController@destroy');
Route::get('/cadastro', 'UsuarioController@cadastro')->middleware('naoLogado'); 
Route::get('/preview/{fileId}', 'UsuarioController@preview')->middleware('naoLogado'); 


Route::get('/moderacao','ModeracaoController@showModeracaoForm')->name('moderacao')->middleware('naoLogado'); //alterado por rafael gomes
Route::get('/relatorios','RelatoriosController@showRelatoriosForm')->name('relatorios')->middleware('naoLogado'); //alterado por rafael gomes
Route::get('/moderador/filtrar/{filtro}', ['as' => 'Moderador.filtrarImagem', 'uses' => 'ModeracaoController@filtro'])->middleware('naoLogado');
Route::post('/moderador/pesquisar', ['as' => 'Moderador.pesquisarImagem', 'uses' => 'ModeracaoController@pesquisar'])->middleware('naoLogado');
Route::get('/motivo/reprova/{imagem}', ['as' => 'Moderador.reprova', 'uses' => 'ModeracaoController@reprovarMotivo'])->middleware('naoLogado');

Route::post('/actionsmoderacao', ['as' => 'Moderacao.actions', 'uses' => 'ModeracaoController@actionsmoderacao'])->middleware('naoLogado'); //alterado por rafael gomes

Route::post('/enviamensagem','MailController@enviarMensagem'); //alterado por rafael gomes



Route::get('/registro', 'RegistroController@create')->name('registro');
Route::post('/registro', 'RegistroController@store'); 
Route::post('/alterarInfoPessoais', 'RegistroController@alterarInfoPessoais')->middleware('naoLogado'); 
Route::post('/alterarInfoSeguranca', 'RegistroController@alterarInfoSeguranca')->middleware('naoLogado'); 
Route::post('/alterarInfoResidencial', 'RegistroController@alterarInfoResidencial')->middleware('naoLogado'); 

Route::get('/galeria', 'GaleriaController@create');

Route::post('/upload', 'UploadController@upload');

Route::get('usuario/{userId}/remover/{fileId}', [ 'as' => 'Imagem.destroy', 'uses' => 'ImagemController@destroy'])->middleware('naoLogado');
Route::get('usuario/baixar', ['as' => 'Imagem.download', 'uses' => 'ImagemController@downloadN'])->middleware('naoLogado');
Route::get('usuario/preview/{fileId}', ['as' => 'Imagem.preview', 'uses' => 'ImagemController@preview'])->middleware('naoLogado');
Route::get('usuario/previewLarge/{fileId}', ['as' => 'Imagem.previewLarge', 'uses' => 'ImagemController@previewLarge'])->middleware('naoLogado');
Route::get('usuario/previewMedium/{fileId}', ['as' => 'Imagem.previewMedium', 'uses' => 'ImagemController@previewMedium'])->middleware('naoLogado');
Route::post('/actions', ['as' => 'Imagem.actions', 'uses' => 'ImagemController@actions'])->middleware('naoLogado');
Route::post('/cancela', ['as' => 'Imagem.cancela', 'uses' => 'ImagemController@cancela'])->middleware('naoLogado');
Route::get('/fotos/editar/{fileID}', ['as' => 'Imagem.editarPage', 'uses' => 'ImagemController@editarFoto'])->middleware('naoLogado');
Route::post('/fotos/editar/dados', ['as' => 'Imagem.editarDadosImagem', 'uses' => 'ImagemController@editarDadosFoto'])->middleware('naoLogado');
Route::get('/foto/publicar/{fileID}', ['as' => 'Imagem.publicarImagem', 'uses' => 'ImagemController@publicarFoto'])->middleware('naoLogado');
Route::post('/foto/publicar/dados', ['as' => 'Imagem.publicarDadosImagem', 'uses' => 'ImagemController@publicarDadosFoto'])->middleware('naoLogado');
Route::get('/foto/filtrar/{filtro}', ['as' => 'Imagem.filtrarImagem', 'uses' => 'ImagemController@filtro'])->middleware('naoLogado');
Route::post('/foto/pesquisar', ['as' => 'Imagem.pesquisarImagem', 'uses' => 'ImagemController@pesquisar'])->middleware('naoLogado');

Route::post('/galeria/pesquisar', ['as' => 'Galeria.pesquisarImagem', 'uses' => 'GaleriaController@pesquisar']);
Route::get('/galeria/preview/{fileId}/{resize}', ['as' => 'Galeria.preview', 'uses' => 'GaleriaController@preview']);
Route::get('/galeria/painel/{fileId}', ['as' => 'Galeria.PainelCompra', 'uses' => 'GaleriaController@painel']);


Route::get('/carrinho', ['as' => 'carrinho', 'uses' => 'PedidoController@index']);
Route::get('/carrinho/obterProdutos', ['as' => 'carrinho.obterProdutos', 'uses' => 'PedidoController@obterProdutos']);
Route::post('/carrinho', ['as' => 'carrinho.incluir', 'uses' => 'PedidoController@incluir']);
Route::delete('/carrinho', ['as' => 'carrinho.delete', 'uses' => 'PedidoController@remover']);



//alterado por juliana
Route::get('/carrinho', ['as' => 'carrinho', 'uses' => 'PedidoController@index']);
Route::get('/carrinho/obterProdutos', ['as' => 'carrinho.obterProdutos', 'uses' => 'PedidoController@obterProdutos']);
Route::post('/carrinho', ['as' => 'carrinho.incluir', 'uses' => 'PedidoController@incluir']);
Route::delete('/carrinho', ['as' => 'carrinho.delete', 'uses' => 'PedidoController@remover']);
Route::get('/pedido', ['as' => 'pedido', 'uses' => 'PedidoController@salvar'])->middleware('naoLogado');
Route::get('/itens/{id}/salvar', ['as' => 'itens.salvar', 'uses' => 'ItemPedidoController@salvar'])->middleware('naoLogado');
Route::get('/pagamento', ['as' => 'pagamento', 'uses' => 'PagamentoController@index'])->middleware('naoLogado');
Route::post('/pagamento/criarSessao', ['as' => 'pagamento.sessao', 'uses' => 'PagamentoController@criarSessao'])->middleware('naoLogado');