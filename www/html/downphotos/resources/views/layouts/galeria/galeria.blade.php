@extends('layouts.master')

@section('content') 

<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

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


  <div class="wrap">
    
    <!-- Define all of the tiles: -->
  @foreach ($files as $file)
    <div class="box">
      <div class="boxInner">
         <a href="/galeria/painel/{{ $file->id }}" data-toggle="modal" data-target="#yourModal"><img src="/galeria/preview/{{ $file->id }}/{{ 250 }}" class="media-photo"/></a>
        <div class="titleBox">{{ $file->apelido }}</div>
      </div>
    </div>
   @endforeach
    </div>
 

  <div class="modal fade" id="yourModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">                
                     

                 
                              </div>
                          </div>
                      </div>



 <div class="text-center">
        {{ $files->links() }}
  </div>
 </div>



<style>

#yourModal > div{
  width: 1200px;
}

    .wrap {
       overflow: hidden;
       margin: 10px;

    }

    .box {
    float: left;
    position: relative;
    width: 10%;
    padding-bottom: 20%;
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: -1px 1px 1px #827a7a;
    }

    .boxInner {
       position: absolute;
       left: 10px;
       right: 10px;
       top: 10px;
       bottom: 10px;
       overflow: hidden;
    }
    .boxInner img {
       width: 100%;
    }
    .boxInner .titleBox {
       position: absolute;
       bottom: 0;
       left: 0;
       right: 0;
       margin-bottom: -50px;
       background: #000;
       background: rgba(0, 0, 0, 0.5);
       color: #FFF;
       padding: 10px;
       text-align: center;
       -webkit-transition: all 0.3s ease-out;
       -moz-transition: all 0.3s ease-out;
       -o-transition: all 0.3s ease-out;
       transition: all 0.3s ease-out;
    }
    .no-touch .boxInner:hover .titleBox, body.touch .boxInner.touchFocus .titleBox {
       margin-bottom: 0;
    }
    @media only screen and (max-width : 480px) {
       /* Smartphone view: 1 tile */
       .box {
          width: 100%;
          padding-bottom: 100%;
       }
    }
    @media only screen and (max-width : 650px) and (min-width : 481px) {
       /* Tablet view: 2 tiles */
       .box {
          width: 50%;
          padding-bottom: 50%;
       }
    }
    @media only screen and (max-width : 1050px) and (min-width : 651px) {
       /* Small desktop / ipad view: 3 tiles */
       .box {
          width: 33.3%;
          padding-bottom: 33.3%;
       }
    }
    @media only screen and (max-width : 1290px) and (min-width : 1051px) {
       /* Medium desktop: 4 tiles */
       .box {
          width: 25%;
          padding-bottom: 25%;
       }
    }
    
    .selectableImageContainer {
    border: 1px solid #CCC;
    padding: 5px;
    margin: 7px;
    float: left;
    width: 212px;
    text-align: center;
}

.zoom_toolbar_button {
    height: 32px;
    width: 32px;
    float: right;
    border-radius: 4px;
    margin-left: 2px;
    margin-top: 8px;
    cursor: pointer;
    border: 1px solid #000000;
    padding: 6px 0 0 3px;
}

.approved_image_toolbar_button {
    background-color: #8bc249;
    height: 32px;
    width: 32px;
    float: right;
    border-radius: 4px;
    margin-left: 2px;
    margin-top: 8px;
    cursor: pointer;
    padding: 6px 0 0 3px;
}

.disapproved_image_toolbar_button {
    background-color: #bb232a;
    height: 32px;
    width: 32px;
    float: right;
    border-radius: 4px;
    margin-left: 2px;
    margin-top: 8px;
    cursor: pointer;
    padding: 6px 0 0 1px;
}

.reviewIssuesButton {
    margin-left: 20px;
    color: #ffffff;
    background-color: #00aeef;
}

.markAllReviewed {
    background-color: #00aeef;
    margin-bottom: 20px;
    margin-top: 10px;
    color: #ffffff;
}

.white {
    color: #ffffff;
}

</style>


<!-- 1. Add latest jQuery and fancyBox files 

<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>-->

@include('layouts.includes.scriptFancyBox')

<!-- 3. Have fun! -->



@endsection  