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
<!--<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>-->
@include('layouts.includes.scriptFancyBox')
@endsection