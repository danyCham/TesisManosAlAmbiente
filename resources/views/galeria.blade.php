@extends('layouts.app')
@section('content') 
    <section class="recent-projects">
        <div class="auto-container">          
          <div id="carousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
               @foreach($Post as $item)
                  <li data-target="#carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
               @endforeach
              </ol>

              <div class="carousel-inner" role="listbox">
                @foreach($Post as $item)
                   <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                       <img class="d-block img-fluid" src="{{$item['imagen_post']}}" alt="{{$item['titulo']}}">
                          <div class="carousel-caption d-none d-md-block">
                            <h1 style="text-shadow: 2px 2px 5px orange;" class="font-weight-bold">{{$item['titulo']}}</h1>
                            <p style="text-shadow: 2px 2px 5px red;">Descripcion:{{$item['descripcion']}}</p>
                            <p style="text-shadow: 2px 2px 5px red;">Categoria: {{$item['tipo_post']}}</p>
                                                     
                          </div>
                   </div>
                @endforeach
              </div>                
              <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
             </a>
            </div>
          </div>
    </section>

    <section class="recent-projects">
        <div class="auto-container">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Exposiciones de Manos al Ambiente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Subasta de Manos al Ambiente</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <section class="two-column-fluid">
                <div class="outer-box">            
                    <div class="sec-title text-center">
                        <h2>Seccion de <span class="theme_color">Exposiciones</span> de<br>manos al ambiente</h2>                        
                    </div>            
                    @empty($Post)
                      <div class="alert alert-warning">
                          <h1>Proximanente más exhibiciones</h1>
                      </div>
                     @else
                      <div class="card-deck"> 
                        @foreach($Post as $item)
                        @if($item['tipo_post'] == 'EXHIBICION')                         
                        <div class="card mb-3">
                          <img class="card-img-top" src="{{$item['imagen_post']}}" alt="{{$item['titulo']}}" >
                          <div class="card-body">
                            <h5 class="card-title">{{$item['titulo']}}</h5>
                            <p class="card-text">{{$item['descripcion']}}</p>
                          </div>
                          <div class="card-footer bg-success">
                            <h4 class="text-white">Valorado en : ${{$item['valor_ini']}}</h4>
                          </div>
                        </div>  
                        @endif 
                        @endforeach                       
                      </div>
                    @endempty
                </div>
            </section>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <section class="two-column-fluid">
                <div class="outer clearfix">            
                    <div class="sec-title text-center">
                        <h2>Seccion de <span class="theme_color">Subastas</span> de<br>manos al ambiente</h2>
                        <h3>Para postular debe iniciar sesion o registrase si no tiene usuario</h3>
                    </div>
                    @empty($Post)
                    <div class="alert alert-warning">
                        <h1>Proximanente más Subastas</h1>
                    </div>
                     @else                        
                        <div class="card-deck">
                          @foreach($Post as $item)
                          @if($item['tipo_post'] == 'SUBASTA')
                          <div class="card mb-3">
                            <img class="card-img-top" src="{{$item['imagen_post']}}" alt="{{$item['titulo']}}">
                            <div class="card-body">
                              <h5 class="card-title">{{$item['titulo']}}</h5>
                              <p class="card-text">{{$item['descripcion']}}</p>
                            </div>
                            <div class="card-footer bg-success">
                            <h4 class="text-white">Valorado en : ${{$item['valor_ini']}}</h4>
                            </div>
                          </div>
                           @endif
                           @endforeach
                        </div>
                    @endempty
                </div>
            </section>
          </div>
        </div>
        </div>
    </section>  




@endsection