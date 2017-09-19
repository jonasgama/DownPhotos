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
        $this->middleware('guest')->except(['destroy', 'envio', 'dashboard']);
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
    
    public function envio()
    {
        

        $user = Auth::user();
        //$Imagem = $user->Imagem->take(1);
        $files = Imagem::where('user_id', '=', $user->id)->paginate(5);
        //$Imagem = Imagem::all();


        return view('layouts.usuario.upload', compact('user', 'files'));
    }

    public function dashboard(){

        return view('dashboard');
    }
   
}
