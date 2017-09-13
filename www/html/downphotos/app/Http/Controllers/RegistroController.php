<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\registroRequest;


class RegistroController extends Controller
{
    
  	public function __construct() 
    {
        $this->middleware('guest');
    }

	public function create(){

		return view('layouts.usuario.registraUsuario');
	}

	public function store(RegistroRequest $request){

		$request->persist();
		$userName = Auth::user()->nome;
		session()->flash('Mensagem', ' Seja Bem-Vindo'. ' ' .$userName );
		return redirect()->home();

	}

}
