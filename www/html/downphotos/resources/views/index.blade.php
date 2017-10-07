

@extends('layouts.master')
@section('title')
| Home
@endsection
@section('content') 
@include('layouts.includes.banner')
<!-- work -->

<div class="agileinfo_copy_right">
      <div class="container">
         <div class="clearfix"> </div>
      </div>
   </div>
<div class="work" id="about">
   <div class="agileits_works-top">
      <div class="col-md-6 agileits_works-grid">
         <div class="wthree-text">
            <h4>Venda de Imagens</h4>
            <div class="w3_tittle">
               <div class="line-style"><span></span></div>
            </div>
            <p></p>
            <p>Ut fringilla euismod sagittis. Cras semper ante sapien, in ornare nisi euismod eu.. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
         </div>
      </div>
      <div class="col-md-6 agileits_works-grid two">
         <div class="wthree-text">
            <h4>Compra de Imagens</h4>
            <div class="w3_tittle">
               <div class="line-style"><span></span></div>
            </div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry,Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis 
               voluptatibus
            </p>
            <ul class="about-agile">
               <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Popular tips & advice</li>
               <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Professional approach</li>
               <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Birds for sale</li>
               <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Professional care</li>
            </ul>
         </div>
      </div>
      <div class="clearfix"> </div>
   </div>
</div>
<!-- //work -->
<!-- gallery -->
<div class="gallery" id="gallery">
   <div class="w3_tittle second two">
      <a href="/galeria"><h3 class="agile-tittle two gal">Ir para Galeria</h3></a>
      <div class="line-style second"><span class="second"></span></div>
   </div>
   <div class="w3-agile-top-info">
      <div class="agileits_work_grids">
         <ul id="flexiselDemo1">
         @foreach($miniGaleria as $i)
         <li>
            <div class="agileits_work_grid view view-sixth">
               <div class="grid">
                  <figure class="effect-roxy">
                     <img src="/galeria/preview/{{$i->id}}/{{0}}" alt="" />
                  </figure>
               </div>
            </div>
         </li>
         @endforeach
      </ul>
      </div>
   </div>
</div>
<!-- //gallery -->
<!-- services -->
<div class="services" id="services">
   <div id="particles-js"></div>
   <div class="agileits-w3layouts-grid">
      <div class="w3_tittle second">
         <h3 class="agile-tittle two">Our Services</h3>
         <div class="line-style second"><span class="second"></span></div>
      </div>
      <div class="wthree_agile_us leftw3ls">
         <div class="col-xs-8 agile-why-text">
            <h4>Professional care</h4>
            <p>Lorem ipsum magna, vehicula ut scelerisque ornare porta ete.</p>
         </div>
         <div class="col-xs-4 agile-why-text">
            <div class="wthree_features_grid left hvr-rectangle-out">
               <i class="fa fa-medkit" aria-hidden="true"></i>
            </div>
         </div>
         <div class="clearfix"> </div>
      </div>
      <div class="wthree_agile_us leftw3ls">
         <div class="col-xs-4 agile-why-text">
            <div class="wthree_features_grid left hvr-rectangle-out">
               <i class="fa fa-usd" aria-hidden="true"></i>
            </div>
         </div>
         <div class="col-xs-8 agile-why-text two">
            <h4>Birds for sale</h4>
            <p>Lorem ipsum magna, vehicula ut scelerisque ornare porta ete.</p>
         </div>
         <div class="clearfix"> </div>
      </div>
      <div class="wthree_agile_us leftw3ls">
         <div class="col-xs-8 agile-why-text">
            <h4>Useful Tips & advice</h4>
            <p>Lorem ipsum magna, vehicula ut scelerisque ornare porta ete.</p>
         </div>
         <div class="col-xs-4 agile-why-text">
            <div class="wthree_features_grid left hvr-rectangle-out">
               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </div>
         </div>
         <div class="clearfix"> </div>
      </div>
      <div class="clearfix"> </div>
   </div>
</div>
<!-- //services -->
@include('layouts.includes.scriptsIndex')
@endsection

