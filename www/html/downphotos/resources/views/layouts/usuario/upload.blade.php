<?php
//phpinfo();
?>

@extends('layouts.master')
@section('content') 
@include('layouts.includes.scriptFancyBox')


<link rel="stylesheet" href="/bower_components/blueimp-file-upload/css/jquery.fileupload.css">
<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

<script src="/bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="/bower_components/blueimp-file-upload/js/jquery.fileupload.js"></script>
<script src="/bower_components/blueimp-file-upload/js/jquery.fileupload-process.js"></script>
<script src="/bower_components/blueimp-file-upload/js/jquery.fileupload-validate.js"></script>

<div class="main-1">
<h1>Envio de Imagens</h1>
<div class="container">
   <div class="register">
      <div class="clearfix"> </div>
    <form accept-charset="UTF-8" method="POST" action="/upload">
         {{csrf_field()}}
          @include('layouts.usuario.menu')
<div class="row col-md-7 col-md-offset-3 custyle">

         

    <table class="table table-striped custab">
               <!-- The fileinput-button span is used to style the file input field as button --> 
                  <!-- The file input field used as target for the file upload widget -->
           <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Enviar</span>
                    <input id="fileupload" type="file" name="file" multiple>
          </span>

          
      </form>

      <form accept-charset="UTF-8" method="POST" action="/cancela">

        <button class="btn btn-danger delete" type="submit" name="cancela">Cancelar</button>

      </form>

      
      
      <form accept-charset="UTF-8" method="POST" action="/actions">
         {{csrf_field()}}

 <input type="submit" name="Baixar" value="Baixar" class='btn btn-success fileinput-button' <span class="glyphicon glyphicon-download"></span></input>
       <input type="submit" name="Excluir" value="Excluir" class="btn btn-danger fileinput-button" <span class="glyphicon glyphicon-remove"></span></input>         

            <div class="progress-outer">
                <div class="progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:0%; box-shadow:-1px 10px 10px rgba(91, 192, 222, 0.7);"></div>
                    <div class="progress-value"></div>
                </div>
            </div>

               <div id="mensagemErro" class="alert alert-danger alert-autocloseable-danger" hidden="hidden">
               </div>
                <div id="mensagem" class="alert alert-success" hidden="hidden">

               </div>

               <thead>
                  <tr>

                      <th>Nome</th> 
                      <th>Imagem</th> 
                      <th>Enviado em</th> 
                      <th>Usuário</th>  
                      <th>
                       
                      <label class="custom-control custom-checkbox">
                          <input type="checkbox" id="select_all" class="custom-control-input">
                          <span class="custom-control-indicator"></span>
                      </label>
                     </th>
                      
                  </tr>
               </thead>
            @foreach($files as $file)
            <td>
              {{str_limit($file->apelido, $limit = 5, $end = '...')}}</td>

            <td>
              <!-- <img src="{{ $file->caminho}}{{$file->nome}}"/> -->
              <a data-fancybox="gallery" href="usuario/previewLarge/{{$file->id }}"><img src="usuario/preview/{{ $file->id }}"></img></a>
              <!--<img src="{{$file->caminho . $file->nome}}"/>-->
            </td>
               
               <td> {{ $file->created_at }} </td>  
               <td> {{ $user->nome }}&nbsp{{ $user->sobrenome }} </td>
              <!--<td class="text-center"><input value="{{ $file->id }}" name = "files[{{ $file->nome }}]" type ="checkbox"></td>-->

              <td>
                <label class="custom-control custom-checkbox">
                          <input type="checkbox" value="{{ $file->id }}" name = "files[{{ $file->nome }}]" class="custom-control-input">
                          <span class="custom-control-indicator"></span>
                </label>
            </td>
            </form>
          <form accept-charset="UTF-8" method="POST" action="/fotos/editar">
            <td><button type="submit" name ="files[{{ $file->nome }}]" value="{{ $file->id }}" class="btn btn-xs btn-default">Editar</button></td>
          </form>
          </tr>

          @endforeach
    </table>
    
   </div>
   

   </div>
</div>
  <div class="text-center">
             {{ $files->links() }}
    </div>
@include('layouts.includes.scriptUpload')
<style>



 /* body > div.main-1 > div.container > div > form > div > table > tbody > tr > td > button
  {
    max-width: 150px;
    max-height: 150px;
    overflow: hidden;
  }*/
</style>

<script>
</script>
@endsection

