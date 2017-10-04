
<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

<!-- Login -->
<div class="main-1">
   <h1>Painel da Imagem</h1>
 <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->

              
              <form method="POST" action="/foto/publicar/dados">
                     {{ csrf_field() }}
               <div class="register-top-grid">
                  <div class="col-md-6 login-left wow fadeInLeft">
                     <div id="nome-show" class="wow fadeInLeft">
                        <h3>Nome da Foto</h3>
                         
                          <p>{{ $file->apelido }}</p>
                         
                     </div>
                     <div id="valor-show" class="wow fadeInLeft">
                        <h3>Valor da Foto</h3>
                       
                        <p>{{ $file->valor }}</p>
                        
                     </div>
                     <a data-fancybox="gallery" href="#"><img src="/galeria/preview/{{ $file->id }}" ></img></a>
                  </div>

                  


                   <div id="fix-descricao" class="register-top-grid">

                      <div class="wow fadeInLeft">
                        <h3>Descrição</h3>
                        <div class="wow fadeInLeft">
                            
                             <p class="text-wrap">{{$file->descricao}}</p>
                         
                        </div>
                     </div>  

                  </div>

                  <button id="right" type="submit" name="foto" value="{{ $file->id }}">Baixar Foto</button>
                  <a href="{{Session::get('url.intended')}}">Fechar</a>
                 
                  <div class="clearfix"></div>
                </div>
               
               </form>
            

          </div>
      </div>
  </div>
</div>

<style>
#fix-descricao > div > div > p{
width: 11em; 
word-wrap: break-word;
border: 0px solid #EEE;
outline-color: #4eaddf;
margin-top: 0px;
width: 400px;
height: 230px;
padding: 8px;
font-size: 1em;
padding: 0.5em;
-webkit-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
-moz-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44)
}

.col-md-6.login-left.wow.fadeInLeft > div:nth-child(1) > p{
  border: 1px solid #EEE;
    outline-color: #4eaddf;
    width: 96%;
    font-size: 1em;
    padding: 0.5em;
    -webkit-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    -moz-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);

}
.col-md-6.login-left.wow.fadeInLeft > div:nth-child(2) > p{
  border: 1px solid #EEE;
    outline-color: #4eaddf;
    width: 96%;
    font-size: 1em;
    padding: 0.5em;
    -webkit-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    -moz-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
  
}

</style>
     

