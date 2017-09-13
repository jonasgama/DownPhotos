@extends('layouts.master')

@section('content') 
@include('layouts.includes.scriptFancyBox')
<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

<div class="main-1">
<h1>Editar de Imagem {{$foto->id }}</h1>
<div class="container">
   <div class="register">
      <div class="clearfix"> </div>
 <form accept-charset="UTF-8">
         {{csrf_field()}}
          @include('layouts.usuario.menu')
<div class="row col-md-7 col-md-offset-3 custyle">     
      
         {{csrf_field()}}

               <div id="mensagemErro" class="alert alert-danger alert-autocloseable-danger" hidden="hidden">
               </div>
                <div id="mensagem" class="alert alert-success" hidden="hidden">

               </div>

<div class="container">
  <div class="well">
      <div class="media">
      	<a class="pull-left" href="#">
    		 <a data-fancybox="gallery" href="/usuario/previewLarge/{{$foto->id }}"><img src="/usuario/previewMedium/{{ $foto->id }}"></img></a>
  		</a>
  		<div class="media-body">
    		<h4 class="media-heading">Receta 1</h4>
          <p class="text-right">By Francisco</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
Aliquam in felis sit amet augue.</p>
          <ul class="list-inline list-unstyled">
  			<li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
            <li>|</li>
            <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
            <li>|</li>
            <li>
               <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
            </li>
            <li>|</li>
            <li>
            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
              <span><i class="fa fa-facebook-square"></i></span>
              <span><i class="fa fa-twitter-square"></i></span>
              <span><i class="fa fa-google-plus-square"></i></span>
            </li>
			</ul>
       </div>
    </div>
  </div>
</div>
            
             
      
     </form>
   	</div>
	</div>   
</div>
@include('layouts.includes.scriptUpload')

@endsection  