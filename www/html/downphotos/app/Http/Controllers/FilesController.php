<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use Validator;
use ZipArchive;

class FilesController extends Controller
{
    


    public function preview($fileId){


        $file = \App\Files::find($fileId);
     
        $finalPath = $file->caminho.'/'.$file->nome;

         $mime = mime_content_type($finalPath);

           if($mime == "image/jpeg")
            {

                  return $image = Image::make($finalPath)
                  ->encode('data-url',0)
                  ->resize(50, 50)
                  ->orientate()->response();
            }
            else{
                
                  return $image = Image::make($finalPath)
                  ->resize(50, 50)
                  ->encode('data-url',0)
                  ->response();

          }

    }


     public function previewMedium($fileId){


        $file = \App\Files::find($fileId);
     
        $finalPath = $file->caminho.'/'.$file->nome;

         $mime = mime_content_type($finalPath);

           if($mime == "image/jpeg")
            {

                  return $image = Image::make($finalPath)
                  ->encode('data-url',0)
                  ->resize(250, 250)
                  ->orientate()->response();
            }
            else{
                
                  return $image = Image::make($finalPath)
                  ->resize(250, 150)
                  ->encode('data-url',0)
                  ->response();

          }

    }

    public function previewLarge($fileId){




        $file = \App\Files::find($fileId);
     
        $finalPath = $file->caminho.'/'.$file->nome;



        return $image = Image::make($finalPath)
        ->orientate()
        ->encode('data-url',100)->response();

    }


    public function actions(){

    
      $userId = Auth::id();
      $request = \Request::all();

      $validatorExcluir = Validator::make($request, [

         'files' => 'required',
         'Excluir' => 'required'

      ]);
       $validatorBaixar = Validator::make($request, [

         'files' => 'required',
         'Baixar' => 'required'

      ]);
        
      if (!$validatorExcluir->fails()) {
          //dd(\Request::all());
          $this -> destroyN($request, $userId);
          return redirect()->back();
      }
      if (!$validatorBaixar->fails()) {
          //dd(\Request::all());
          if(file_exists(public_path() . "/zip.zip")){

            unlink(public_path() . "/zip.zip");
          }
         
           $arquivo = $this -> downloadN($request, $userId);
          //dd($arquivo);
          return response()->download(public_path() . "/zip.zip");
      }
      else{
        return back()->withErrors([ 
                
                'Selecione para efeutar as ações' 
            ]);
      }
    }
    public function destroyN($request, $userId)
    {
    
      $request = request(['files']);
      //dd($request);

       foreach($request as $key => $value)
        {
           
            foreach($value as $i){

                //session()->flash('Mensagem', 'teste '. ' ' .$i );
                //return redirect()->back();
                //dd($i);
                $this->destroy($userId, $i);


            }

        }
         

    }

    public function destroy($userID, $fileId)
    {
      $file = \App\Files::find($fileId);
     
      $finalPath = $file->caminho;

      $file->delete();

      unlink($finalPath.'/'.$file->nome); 

      session()->flash('Mensagem', 'Arquivo excluído com sucesso' );

       return redirect()->back();

    }

    public function downloadN($request, $userId)
    {

     
    $zip = new ZipArchive();

    if ($zip->open(public_path() . "/zip.zip", ZipArchive::CREATE)!==TRUE) {
            exit("cannot open <$filename>\n");
    }

     //dd($zipName);
      //dd($zipPath);
     //dd($zip);
      $request = $request['files'];
      //$zip->add(("zip");
      //dd($request);
      //dd($file);
      
       foreach($request as $key => $value)
        {  
          //dd($key);
            

          $file = \App\Files::find($value);


          $zip->addFile( $file->caminho.$file->nome, $file->nome  );
           //dd($zip);
          //$zip->add($file->caminho.$file->nome);
          //$this ->download($finalPath);

            

        }
        //dd($request);
        //return redirect()->back();
        $zip->close();
        //dd($zip);
      //dd(public_path() . "/zip.zip");

      //return response()->download(public_path() . "/zip.zip");
      //return redirect()->back();
      return $zip;

    }


    public function download($finalPath)
    {
      
      
      Zipper::make(public_path("zip.zip"))->add($finalPath);


    }


    public function cancela(){

        return back()->withErrors([ 
                
                'Upload Cancelado' 
            ]);


    }

    public function editarFoto()
    {

      $request = \Request::all();
      //$request = request(['files']);
      //dd($request);

      foreach($request as $key => $value)
      {
         foreach($value as $i){
            $fotoId = $i;

         }
         
      }
     
      //dd($fotoId);

      //as $key => $value 

      $validatorEditar = Validator::make($request, [

         'files' => 'required',

      ]);
        
      if ($validatorEditar->fails()) {
          //dd(\Request::all());
        
           return back()->withErrors([ 
                
             'Clique em editar uma foto' 
          ]);
      }
      else{

              $user = Auth::user();
              //dd($user);
              $foto = $user->files->find($fotoId);
              //dd($foto->id);

             return view('layouts.usuario.editarImagem', compact('foto'));

      }


     

    } 

}
