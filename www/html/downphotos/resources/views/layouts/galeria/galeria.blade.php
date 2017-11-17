@extends('layouts.master')
@section('content') 
<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />
<link href="{{ asset('css/galeria.css') }}" rel="stylesheet" />
<div class="main-1">
<div class="heading">
<h1>Imagens Publicadas</h1>
<!--Inserir Menu aqui-->
  @include('layouts.galeria.menu')
<div class="no-touch">

   @if(!empty($filtroON))
   <ul class="list-inline">
      <li><a href="/galeria"><span class="glyphicon glyphicon-remove"></span></a> </li>
      <li>{{$filtroON}}</li>
   </ul>
   @endif
   @if(!empty($qt))
   <ul class="list-inline">
      <li>{{$qt}}</li>
   </ul>
   @endif
   <div class="wrap">
      <!-- Define all of the tiles: -->
      @foreach ($files as $file)
      <div class="box">
         <div class="boxInner">

             <a data-fancybox="gallery" href="/galeria/preview/{{ $file->id }}/{{0}}"><img src="/galeria/preview/{{ $file->id }}/{{250}}" ></img></a>
            <div class="titleBox">
               
               <a href="javascript:void(0)"><span class="glyphicon glyphicon-shopping-cart"></span></a>
               <input type="hidden" value="{{ $file->id }}">
               <h2>R${{ $file->valor }}</h2>
            </div>

         </div>
                <div class="dropdown" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-info-sign"></span>
                          <ul>
                          
                            
                            <ul class="dropdown-menu" role="menu">
                                 <h1>R${{ $file->valor }}</h1>
                                 <h2>{{ $file->apelido }}</h2>
                                 <small>{{ $file->descricao }}</small>

                                 <hr>
                                    <ul class="list-inline">
                                       <li>{{$file->imageWidth($file->id)}} x {{$file->imageHeight($file->id)}}|</li>
                                        <li>{{$file->fileSize($file->id)}} MegaBytes|</li>
                                        <li>{{$file->imageMime($file->id)}} </li>
                                    </ul>
                              </ul>
                            
                          </ul>
               </div>
         </div>


      @endforeach
   </div>
   <div class="text-center">
      {{ $files->links() }}
   </div>
<style>
.boxInner > div > a > span{
   color:white;
}

</style>

<script>


$('body > div.main-1 > div > div.no-touch > div.wrap > div > div.dropdown').on('click', function() {


 var className = $(this).children('span').attr('class');
 console.log(className);

  if(className == 'glyphicon glyphicon-info-sign'){
     $(this).children('span').removeClass('glyphicon glyphicon-info-sign');
     $(this).children('span').addClass('glyphicon glyphicon-remove');
  }
  else if(className == 'glyphicon glyphicon-remove'){
     $(this).children('span').removeClass('glyphicon glyphicon-remove');
     $(this).children('span').addClass('glyphicon glyphicon-info-sign');
  }
 
   
});

$('body > div.main-1 > div > div.no-touch > div.wrap > div > div.boxInner > div > a').on('click', function(e) {
e.preventDefault(); 

console.log("ok");
var idImg = $(this).siblings('input[type=hidden]').val();
console.log(idImg);
$.ajax({
         url:"/carrinho",
         type: 'POST',
         dataType: 'json',
         data: {id : idImg},
         success:function(dados){            
            console.log(dados);
         },
         error:function(){
             alert("Error");
         }      
    }); 
   
});




</script>


@include('layouts.includes.scriptFancyBox')
@endsection