@extends('layouts.master')
@section('content') 
@include('layouts.includes.scriptFancyBox')
<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

<!-- Login -->
   <div class="main-1">
   <h1>Edição: Dados da Imagem</h1>

      <div class="container">
         @include('layouts.usuario.menu')
         <div class="register">
            <div class="clearfix"> </div>
            <div id="local-fix" class="register-but">
               <form method="POST">


                     {{ csrf_field() }}
                               
               <div class="register-top-grid">
                  <div class="col-md-6 login-left wow fadeInLeft">
                     <div class="wow fadeInLeft">
                        <h3>Nome da Foto</h3>
                        <input name="nome" type="text" value="{{$foto->apelido}}"/>
                     </div>
                     <div class="wow fadeInLeft">
                        <h3>Valor da Foto</h3>
                        <input name="valor" type="text" value="{{$foto->valor}}"/>
                     </div>
                     <a data-fancybox="gallery" href="/usuario/previewLarge/{{$foto->id }}"><img src="/usuario/previewMedium/{{ $foto->id }}"></img></a>
                  </div>

                  


                   <div id="fix-descricao" class="register-top-grid">

                      <div class="wow fadeInLeft">
                        <h3>Descrição</h3>
                        <div class="wow fadeInLeft">
                        <textarea name="description" value="{{$foto->descricao}}"></textarea>
                        </div>
                     </div>  

                  </div>

                  <input type="submit" value="Editar">
                  <div class="clearfix"> </div>
               </form>
            </div>
         </div>
       </div>
   </div>

<style>

body > div.main-1 > div.container > div > div.register-but > form > div > div.col-md-6.login-left.wow.fadeInLeft > div{

margin-left:275px;
}

body > div.main-1 > div.container > div > div.register-but > form > div > div.col-md-6.login-left.wow.fadeInLeft > a > img{

   position:absolute;
   left:0;
   border: 7px solid rgba(0, 0, 0, 0.62);
  
}

body > div.main-1 > div.container > div > div.register-but > form > div > div.register-top-grid > div > div > textarea{
margin-top:0px;
width: 400px;
height: 230px;
padding: 8px;
box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);

}

body > div.main-1 > div.container > div > div.register-but > form > div > div.register-top-grid > div > h3{

padding-bottom:5px;

}

#local-fix{

margin-top:40px;
position: absolute;
top:185px;
left:250px;

}

#fix-descricao > div > h3{

margin-left:50px;

}

#fix-descricao > div > div > textarea{
margin-left:50px;
}

#local-fix > form > div > input[type="submit"]{
   margin-left:50px;
}

body > div.main-1 > h1{

margin-bottom: 48px;

}


</style>
     
@endsection