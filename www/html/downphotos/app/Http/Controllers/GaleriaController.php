<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class GaleriaController extends Controller
{
    public function create()
    {

    	$imagens = \App\Imagem::latest();

    	$files = $imagens->where('situacao', '=', 'ap')->paginate(25);

    	return view('layouts.galeria.galeria', compact('files'));
    }

     public function pesquisar(){

      $request = \Request::all();
      

      $validatorPesquisar = Validator::make($request, [

         'pesquisa' => 'required'

      ]);

       if (!$validatorPesquisar->fails()) {

       	$imagens = \App\Imagem::latest();

    	$fotos = $imagens->where('situacao', '=', 'ap');

        $files = $fotos->where('apelido', 'like', '%'.$request['pesquisa'].'%')
        ->orWhere('valor','LIKE','%'.$request['pesquisa'].'%')
        ->orWhere('descricao','LIKE','%'.$request['pesquisa'].'%')
        ->orWhere('situacao','LIKE','%'.$request['pesquisa'].'%')
        ->paginate(25);
        //dd($files);


        $filtroON = "Pesquisa: ".$request['pesquisa']. ", Resultado: " .$files->count() . " items";

       }else{
         return back()->withErrors([ 
                
                'Não Localizado' 
            ]);

       }

      return view('layouts.galeria.galeria', compact('user', 'files', 'filtroON'));


    }

}
