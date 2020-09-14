@extends('layouts.app')
@section('content')
	<section class="events-section latest-events">
        <div class="auto-container">            
            <div class="sec-title text-center">
                <h2>Conozca nuestros Proyectos</h2>
                <div class="text">Se parte de ellos y mira como puedes participar</div>
            </div>
            @foreach($Post as $item)
            <div class="card-deck">
                <div class="card text-center border-success text-success">
                  <div class="card-header text-white bg-success">
                    {{$item['titulo']}}
                  </div>
                  <div class="card-body border-success">
                    <img class="card-img-top" src="{{$item['imagen_post']}}" target="_blank" alt="Card image cap" width="150px;" height="400px;">
                     
                    <p class="card-text">{{$item['descripcion']}}</p>
                    <a href="{{$item['urlPdf']}}" class="btn btn-outline-success">Pdf Datos</a>
                  </div>
                  <div class="card-footer text-success border-success">
                    Fecha de publicacion.
                    {{$item['fecha_ini']}}
                  </div>               
                </div>
                
            </div>  
            @endforeach
        </div>
    </section>     
@endsection