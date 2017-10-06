

<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

<div class="main-1">
   <h1>Edição: Dados da Imagem</h1>
 <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->

              <form method="POST" action="/fotos/editar/dados">
                     {{ csrf_field() }}               
               <div class="register-top-grid">
                  <div class="col-md-6 login-left wow fadeInLeft">
                     <div class="wow fadeInLeft">
                        <h3>Nome da Foto</h3>
                        <input class="nome" name="nome" type="text" value="{{$file->apelido}}" placeholder="Insira o nome da foto" required/>
                     </div>
                     <div class="wow fadeInLeft">
                        <h3>Valor da Foto</h3>
                        <input name="valor" type="text" value="{{$file->valor}}" placeholder="R$" required/>
                     </div>
                     <a data-fancybox="gallery" href="/usuario/previewLarge/{{$file->id }}"><img src="/usuario/previewMedium/{{ $file->id }}" ></img></a>
                  </div>

                  


                   <div id="fix-descricao" class="register-top-grid">

                      <div class="wow fadeInLeft">
                        <h3>Descrição</h3>
                        <div class="wow fadeInLeft">
                        <textarea name="description" placeholder="insira descrição da sua foto" required>{{$file->descricao}}</textarea>
                        </div>
                     </div>  

                  </div>
                  
                  <button id="right" type="submit" name="foto" value="{{$file->id }}">Editar</button>
                  <a href="{{Session::get('url.intended')}}">Voltar</a>
                  </form>

                 
                  <div class="clearfix"> </div>
                  </div>
               
            

          </div>
      </div>
  </div>
</div>

<style>

</style>
