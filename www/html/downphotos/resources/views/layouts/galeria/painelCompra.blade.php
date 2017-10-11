<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />
<link href="{{ asset('css/painelCompra.css') }}" rel="stylesheet" />
<!-- Login -->
<div class="main-1">
   <h1>{{ $file->apelido }}</h1>
   <div class="container-fluid display-table">
      <div class="row display-table-row">
         <div class="col-md-10 col-sm-11 display-table-cell v-align">
            <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
            <form method="POST" action="/foto/publicar/dados">
               {{ csrf_field() }}
               <div class="register-top-grid">
                  <div class="col-md-6 login-left wow fadeInLeft">

                      <div id="nome-show" class="wow fadeInLeft">
                         <h3>Valor da Foto</h3>
                          <p>R${{ $file->valor }}</p>
                     </div>
                     <div id="valor-show" class="wow fadeInLeft">
                        <h3>Informações</h3>
                        <ul class="list-inline">
                           <li>{{$width}} x {{$height}}|</li>
                           <li>{{$filesize}}MegaBytes|</li>
                           <li>{{$mime}} </li>
                        </ul>
                   </div>
                   <hr>
                  <a data-fancybox="gallery" href="/galeria/preview/{{ $file->id }}/{{0}}"><img src="/galeria/preview/{{ $file->id }}/{{250}}" ></img></a>
                

                  <div class="wow fadeInLeft">
                        <h3>Descrição</h3>
                        <div class="wow fadeInLeft">
                           <p class="text-wrap">{{$file->descricao}}</p>
                        </div>
                  </div>

                  <button id="right" type="submit" name="foto" value="{{ $file->id }}">Comprar</button>
                  <a href="{{Session::get('url.intended')}}">Fechar</a>
                  <div class="clearfix"></div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<style>


#yourModal > div > div > div > div > div > div > form > div > div > div:nth-child(5){
    margin-left: 0px;
    margin-top: 55px;

}
#nome-show > h3{
   padding-bottom: 0px;

}
#yourModal > div > div > div > div > div > div > form > div > div > div:nth-child(5) > h3{
  
    margin-left: 0px;
    margin-top: 100px;

}
#yourModal > div > div > div > div > div > div > form > div > div > div:nth-child(5) > div > p{
    width: 500px;
}
#nome-show{
   height: 45px;
}
#yourModal > div > div > div > div > div > div > form > div > div > a:nth-child(4) > img{
   top: 0px;
}
#nome-show > p{
   padding-left: 0px;
}
#yourModal > div > div > div > div > div > div > form > div > div > div:nth-child(5){
   position: absolute;
   left: 270px;
   top: 0px;
}

#right, a:nth-child(7){
background: #13c6f1;
color: #FFF;
border-color:transparent;
padding: 0.4em 1.5em;
border:none;
font-family: inherit;
font-size: inherit;
line-height: inherit;
position:absolute;


}
#right:hover, a:nth-child(7):hover{
background: black;

}

a:nth-child(7){
   left: 720px;
}
#valor-show > ul{
width: 350px;
}

</style>