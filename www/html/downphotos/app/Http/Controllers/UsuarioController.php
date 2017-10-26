<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Imagem;
use Image;

class UsuarioController extends Controller
{



    public function __construct() 
    {
        $this->middleware('guest')->except(['destroy', 'envio', 'dashboard', 'cadastro', 'moderacao']);

       

    }

	public function create(){

		return view('layouts.usuario.loginUsuario');
	}

 public function store(){
        
         if (! auth()->attempt(request(['email','password']))) {
            
            return back()->withErrors([
                
                'Erro: Usuário e/ou Senha Incorreta'
            ]);
            
        }
        else{
            $userName = Auth::user()->nome;
             session()->flash('Mensagem', ' Seja Bem-Vindo'. ' ' .$userName );
             return redirect()->home();
        }
      
    }

	public function destroy(){

		auth()->logout();
        
        return redirect('usuario');
	}
    
    public function envio(Request $request)
    {
        
   
        $user = Auth::user();
        $imagemObj = new \App\Imagem;

        $qt = $imagemObj->getQuantidadeImagensUsuario($user);
        $files = $imagemObj->getImagensUsuario($user);
       
        //dd($filtroON);
        //$Imagem = Imagem::all()
        //dd($request);
        $request->session()->put('url.intended',url()->full());

        return view('layouts.usuario.upload', compact('user', 'files', 'qt'));
    }

    public function dashboard(){

        return view('dashboard');
    }

    public function cadastro()
    {

        return view('layouts.usuario.cadastro');

    }
   
}