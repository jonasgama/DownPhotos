<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Redirect;
use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index() {
    	return view('layouts.carrinho.shoppingCart');
    }

    public function obterProdutos() {        
    	$carrinho = session('carrinho');
		$dados = DB::table('imagems')
					 ->select('id', 'nome', 'apelido', 'valor', 'caminho')
                     ->whereIn('id', $carrinho)					 
					 ->get();

    	return response()->json($dados);
    }

    public function incluir(Request $request){        
        $carrinho = session('carrinho');
        if(empty($carrinho))
            $carrinho = array();

        array_push($carrinho, $request->id);                
        session(['carrinho' => $carrinho]);

        return response()->json($carrinho);
    }

    public function remover(Request $request){
        $carrinho = session('carrinho');
        $carrinho = array_diff($carrinho, [$request->id]);        
        session(['carrinho' => $carrinho]);
        return response()->json($carrinho);
    }

    public function salvar() {
        $insert = Pedido::create([
            'data_pedido'        => date('y/m/d h:i:s'),
            'status'             => 'ag',
            'forma_pagamento'    => null,
            'liberacao_download' => null,
            'user_id'            => Auth::user()->id
        ]);

        if ($insert) {
            return Redirect::to('/itens/'.$insert->id.'/salvar');
        }
        else {
            return redirect()->route('carrinho');
        }
    }
}
