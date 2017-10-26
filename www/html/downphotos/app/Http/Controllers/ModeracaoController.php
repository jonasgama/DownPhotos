<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Imagem;
use App\User;
use Mail;
use App\Mail\EmailAlerta;
use App\Mail\EmailReprova;

class ModeracaoController extends Controller
{

    public function showModeracaoForm(Request $request)
    {

      
      $user = Auth::user();
      $todosUsuarios = User::all();

    	if ($user->access_level_id <> 1) {
       
        return redirect()->home();

    	}
      else{

         $request->session()->put('url.intended',url()->full());
          $qt = "Quantidade de fotos: ".\App\Imagem::moderadorQuantidadeImagens();

          $imagens = \App\Imagem::where('deleted_at', '=', Null)->paginate(5);
      }

     

      return view('layouts.pages.moderacao', compact('imagens','todosUsuarios', 'qt'));

    }

    public function actionsmoderacao(Request $request)
    {

     

      $validatorAprovar = Validator::make($request->all(), [

        'Aprovar' => 'required'

      ]);

      $validatorReprovar = Validator::make($request->all(), [

        'Reprovar' => 'required',
        'Motivo' => 'required'

      ]);

      $validatorAlerta = Validator::make($request->all(), [

        'Alerta' => 'required'

      ]);

       $validatorEstornar = Validator::make($request->all(), [

        'Estornar' => 'required'

      ]);

        $validatorExcluir = Validator::make($request->all(), [

        'Excluir' => 'required'

      ]);

      $validatorDeletarPermanentemente = Validator::make($request->all(), [

        'DeletarPermanentemente' => 'required'

      ]);


        
      $validatorRestaurar = Validator::make($request->all(), [

        'Restaurar' => 'required'

      ]);
       //dd(\Request::all());

      if (!$validatorAprovar->fails()) {

      

       $this->aprovaImagem($request['Aprovar']);

        session()->flash('Mensagem', 'Imagem aprovada com sucesso!!!');

        return redirect('/moderacao');

      }
      elseif (!$validatorAlerta->fails()) {



        $img = \App\Imagem::find(($request['Alerta']));
        $user = \App\User::find($img->user_id);
        $usermail = $user->email;
        $username = $user->nome;
        $imagepath = $img->caminho.$img->nome;
      

        try {
          
          $this->enviaEmailAlerta($usermail, $username, $imagepath);

          session()->flash('Mensagem', 'E-mail enviado com sucesso!!!');

         return redirect('/moderacao');

        } catch (\Exception $e) {

          return back()->withErrors([

           'Mensagem', 'Houve um problema ao enviar o email!!!'

          ]);
          
        }

      }
      elseif (!$validatorReprovar->fails()) {
        //dd(\Request::all());
        //$arr = $request->dados;
        try {

          $img = \App\Imagem::find(($request['Reprovar']));
          $user = \App\User::find($img->user_id);
          $userMail = $user->email;
          $userName = $user->nome;
          $imagePath = $img->caminho.$img->nome;
          $motivo = $request['Motivo'];

          $this->enviaEmailReprova($userName, $userMail, $imagePath, $motivo);
          $this->reprovaImagem($request['Reprovar']);
          session()->flash('Mensagem', 'E-mail enviado com sucesso!!!');

         return redirect('/moderacao');

        } catch (\Exception $e) {

          return back()->withErrors([

           'Mensagem', 'Houve um problema ao enviar o email!!!'

          ]);
          
        }

        session()->flash('Mensagem', 'Imagem reprovada com sucesso!!!');

        return redirect('/moderacao');

      }
      else if(!$validatorEstornar->fails()){


        $this->estornaImagem($request['Estornar']);
        session()->flash('Mensagem', 'Imagem Estornada'); 
        //para estornar deve estar aprovada
        return redirect('/moderacao');
      }
      else if(!$validatorExcluir->fails()){

        $this->destroy($request['Excluir']);
        session()->flash('Mensagem', 'Enviada para a Lixeira' );
         return redirect('/moderacao');
      }
      else if(!$validatorRestaurar->fails()){

         $this->restaurarImagem($request['Restaurar']);
         session()->flash('Mensagem', 'Restaurada para aguardando aprovação' );
         return redirect('/moderacao');


      }
       else if(!$validatorDeletarPermanentemente->fails()){

         $this->deletarPermanentemente($request['DeletarPermanentemente']);
         session()->flash('Mensagem', 'Excluído do disco' );
         return redirect('/moderacao');


      }
      else
      {

        return back()->withErrors([

          'Função inválida'

        ]);

      }

    }

    public function destroy($imagemId)
    {
      
      $imagem = Imagem::find($imagemId);
      //dd(\Carbon\Carbon::now());
      $imagem->deleted_at = \Carbon\Carbon::now();

      $imagem->save();

       

    }
     public function deletarPermanentemente($fileId) //passando a ID do usuario e do arquivo
    {
      $file = \App\Imagem::find($fileId); //buscando a ID
     
      $finalPath = $file->caminho; //criando o caminho que está no meu banco de dados

      $file->delete(); //excluindo

      unlink($finalPath.'/'.$file->nome);  //retornado um http response de exclusão

      return redirect()->back();

    }

    public function aprovaImagem($imagemId)
    {

      $imagem = Imagem::find($imagemId);

      $imagem->situacao = 'ap';

      $imagem->save();

    }

    public function reprovaImagem($imagemId)
    {

      $imagem = Imagem::find($imagemId);

      $imagem->situacao = 're';

      $imagem->save();

    }

    public function estornaImagem($imagemId)
    {

      $imagem = Imagem::find($imagemId);

      $imagem->situacao = 'ag';

      $imagem->save();

    }

    public function restaurarImagem($imagemId)
    {

      $imagem = Imagem::find($imagemId);

      $imagem->situacao = 'ag';
      $imagem->deleted_at = Null;

      $imagem->save();

    }

    public function enviaEmailAlerta($userName, $userMail, $imagePath)
    {

      //new EmailAlerta($userName, $userMail, $imagePath);

      Mail::send(new EmailAlerta($userName, $userMail, $imagePath));

    }

    public function enviaEmailReprova($userName, $userMail, $imagePath, $motivo)
    {


      Mail::send(new EmailReprova($userName, $userMail, $imagePath, $motivo));

    }

    public function filtro($filtro)
    {
       $todosUsuarios = User::all();
       
       if($filtro == 'Novos'){
         $filtro = 'nv';
         $info = "Novos";
       }
       else if($filtro == 'Aguardando'){
        $filtro = 'ag';
        $info = "Aguardando";

       }
       else if($filtro == 'Aprovados'){

        $filtro = 'ap';
        $info = "Aprovados";
       }
       else if($filtro == 'Reprovados'){

        $filtro = 're';
        $info = "Reprovados";
       }
       else if($filtro == 'Deletadas'){

        
        $info = "Deletadas";
       }
       else{
          return back()->withErrors([ 
                
                'Filtro não existe' 
            ]);
       }
       


       if($filtro == 'Deletadas'){

         $qt =  \App\Imagem::where('deleted_at', '<>', Null)->count();
         $filtroON = "Filtrando: ".$info. ", Resultado: " .$qt. " items";
         $imagens =  \App\Imagem::where('deleted_at', '<>', Null)->paginate(5);
        return view('layouts.pages.moderacao', compact('imagens', 'filtroON', 'todosUsuarios'));


       }else{

         $imagens =  \App\Imagem::where('deleted_at', '=', Null);
         $qt =  $imagens->where('situacao', '=', $filtro)->count();
         $filtroON = "Filtrando: ".$info. ", Resultado: " .$qt. " items";
         $imagens =   $imagens->where('situacao', '=', $filtro)->paginate(5);
        return view('layouts.pages.moderacao', compact('imagens', 'filtroON', 'todosUsuarios'));

       }
       
        
        

    }

    public function pesquisar(){

      $request = \Request::all();
      $todosUsuarios = User::all();

      $validatorPesquisar = Validator::make($request, [

         'pesquisa' => 'required'

      ]);

       if (!$validatorPesquisar->fails()) {

        $imagemObj = new \App\Imagem; 
        
        $imagens =  $imagemObj->pesquisarImagens($request);


        $filtroON = "Pesquisa: ".$request['pesquisa']. ", Resultado: " .$imagens->count() . " items";

       }else{
         return back()->withErrors([ 
                
                'Não Localizado' 
            ]);

       }

      return view('layouts.pages.moderacao', compact('imagens', 'filtroON', 'todosUsuarios'));


    }


    public function reprovarMotivo($imagem){

    
        $file = \App\Imagem::find($imagem);
        //return view('layouts.usuario.editarImagem', compact('file'));
        return view('layouts.pages.motivo', compact('file'));

    }


}
