@extends('layouts.app')
@section('content')
    <section class="events-section latest-events">
        <div class="auto-container">            
            <div class="sec-title text-center">
                <h2>Seccion de <span class="theme_color">Exposiciones</span> de<br>manos al ambiente</h2>
            </div>
            @empty($Post)
              <div class="alert alert-warning">
                  <h1>Proximanente más exhibiciones</h1>
              </div>
             @else
             <!-- style="width:450px;heigth:50" -->
                @foreach($Post as $item)
                <div class="card-deck">
                  @if($item['tipo_post'] == 'EXHIBICION')
                  <div class="card">
                    <img class="card-img-top" src="{{$item['imagen_post']}}"     alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$item['titulo']}}</h5>
                      <p class="card-text">{{$item['descripcion']}}</p>
                    </div>
                    <div class="card-footer bg-success">
                      <h4 class="text-white">Valorado en : ${{$item['valor_ini']}}</h4>
                    </div>
                  </div>
                  @endif
                </div>
                @endforeach
            @endempty
        </div>
    </section>
    <section class="events-section latest-events">
        <div class="auto-container">            
            <div class="sec-title text-center">
                <h2>Seccion de <span class="theme_color">Subastas</span> de<br>manos al ambiente</h2>
            </div>
            @empty($Post)
            <div class="alert alert-warning">
                <h1>Proximanente más Subastas</h1>
            </div>
             @else
                @foreach($Post as $item)
                <div class="card-deck">
                  @if($item['tipo_post'] == 'SUBASTA')
                  <div class="card">
                    <img class="card-img-top" src="{{$item['imagen_post']}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$item['titulo']}}</h5>
                      <p class="card-text">{{$item['descripcion']}}</p>
                    </div>
                    <div class="card-footer bg-success">
                    <h4 class="text-white">Valorado en : ${{$item['valor_ini']}}</h4>
                    </div>
                  </div>
                   @endif
                </div>
                @endforeach

            @endempty
        </div>
    </section>
@endsection