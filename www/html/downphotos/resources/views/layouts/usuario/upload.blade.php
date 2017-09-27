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
 <div class="container-fluid display-table">
        <div class="row display-table-row">
           @include('layouts.usuario.menu')
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <div class="search hidden-xs hidden-sm">
                                <input type="text" placeholder="Search" id="search">
                            </div>
                        </div>
                    </header>
                </div>
               


<form accept-charset="UTF-8" method="POST" action="/upload">
         {{csrf_field()}}
    <div class="row col-md-7 col-md-offset-3 custyle">

         

    <table class="table table-striped custab">
               <!-- The fileinput-button span is used to style the file input field as button --> 
                  <!-- The file input field used as target for the file upload widget -->
           <span class="btn btn-success fileinput-button">
                    <span>Enviar</span>
                    <input id="fileupload" type="file" name="file" multiple>
          </span>

          
      </form>

      <form accept-charset="UTF-8" method="POST" action="/cancela">

        <button class="btn btn-danger delete" type="submit" name="cancela">Cancelar</button>

      </form>

      
      
      <form accept-charset="UTF-8" method="POST" action="/actions">
         {{csrf_field()}}

       <input type="submit" name="Baixar" value="Baixar" class='btn btn-success fileinput-button'></input>
       <input type="submit" name="Excluir" value="Excluir" class="btn btn-danger fileinput-button"></input>         
               <div class="progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:0%; box-shadow:-1px 10px 10px rgba(91, 192, 222, 0.7);"></div>
                    <div class="progress-value"></div>
                </div>

               <div id="mensagemErro" class="alert alert-danger alert-autocloseable-danger" hidden="hidden">
               </div>
                <div id="mensagem" class="alert alert-success" hidden="hidden">

               </div>

               <thead>
                  <tr>

                      <th>Nome</th> 
                      <th>Situação</th> 
                      <th>Descrição</th> 
                      <th>Valor</th> 
                      <th>Imagem</th> 
                      <th>Enviado em</th> 
                      <th>Usuário</th>  
                      <th>
                      seleção
                      <label class="custom-control custom-checkbox">
                          <input type="checkbox" id="select_all" class="custom-control-input">
                          <span class="custom-control-indicator"></span>
                      </label>
                     </th>
                     <th>Alterar</th>
                     <th>Publicar</th>
                      
                  </tr>
               </thead>

            @foreach($files as $file)
            
            <td>
              {{str_limit($file->apelido, $limit = 5, $end = '...')}}
            </td>
            
            <td>
              @if($file->situacao === 'ag')
                <p style="color:orange"><b>Aguardando Aprovação</b></p>
              @elseif($file->situacao === 'nv')
                 <p><b>Novo</b></p>
              @elseif($file->situacao === 'ap')
                 <p style="color:green"><b>Aprovado</b></p>
              @else
                 <p style="color:red"><b>Reprovado</b></p>
              @endif

            </td>
             
            <td> 
              @if(strlen($file->descricao) === 0)
                <p style="color:red"><b>Pendente</b></p>
              @else
              {{str_limit($file->descricao, $limit = 5, $end = '...')}}
              @endif
               
            </td>

            <td>
               @if(strlen($file->valor) === 0)
                <p style="color:red"><b>Pendente</b></p>
              @else
              {{ $file->valor }}
               @endif
            </td>

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
      
          <td> 
              <a href="/fotos/editar/{{ $file->id }}" class="alterar" href="#" role="button" data-toggle="modal" data-target="#yourModal">Alterar</a>
          </td>
           <td>
              <a href="/foto/publicar/{{ $file->id }}" data-toggle="modal" data-target="#yourModal" class="btn btn-xs btn-default">Publicar</a>
          </td>
      </tr>

          @endforeach
    </table>
    </form>
            </div>
        </div>

    </div>


</div>
  <div class="text-center">
             {{ $files->links() }}
    </div>

@include('layouts.includes.scriptUpload')



  <!--teste de modal -->
               <div class="modal fade" id="yourModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">                
                     

                 
                              </div>
                          </div>
                      </div>




<style>

#yourModal > div{
  width: 1200px;
}

.progress{

width: 850px;

}

</style>
<script>



</script>


@endsection

