@extends('layouts.app')
@section('content')
	<section class="events-section latest-events">
        <div class="auto-container">
            
            <div class="sec-title text-center">
                <h2>Conozca nuestros Proyectos</h2>
                <div class="text">Se parte de ellos y mira como puedes participar</div>
            </div>
            <div class="card-deck">
                <div class="card text-center border-success text-success">
                  <div class="card-header text-white bg-success">
                    Proyecto Name
                  </div>
                  <div class="card-body border-success">
                    <img class="card-img-top" src="{{asset('images/proyectos/proyecto_1.png')}}" alt="Card image cap" width="50px;" height="300px;">
                    <h5 class="card-title text-success">name the event</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-outline-success">Ver más</a>
                  </div>
                  <div class="card-footer text-success border-success">
                    Fecha de publicacion.
                  </div>              
                </div>
                <div class="card text-center border-success text-success">
                  <div class="card-header text-white bg-success">
                    Proyecto Name
                  </div>
                  <div class="card-body border-success">
                    <img class="card-img-top" src="{{asset('images/proyectos/proyecto_2.png')}}" alt="Card image cap" width="50px;" height="300px;">
                    <h5 class="card-title text-success">name the event</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-outline-success">Ver más</a>
                  </div>
                  <div class="card-footer text-success border-success">
                    Fecha de publicacion.
                  </div>              
                </div>
            </div>            
        </div>
    </section>
    <section class="events-section latest-events">
        <div class="auto-container">
            <div class="card-deck">
                <div class="card text-center border-success text-success">
                  <div class="card-header text-white bg-success">
                    Proyecto Name
                  </div>
                  <div class="card-body border-success">
                    <img class="card-img-top" src="{{asset('images/proyectos/proyecto_3.png')}}" alt="Card image cap" width="50px;" height="300px;">
                    <h5 class="card-title text-success">name the event</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-outline-success">Lee más</a>
                  </div>
                  <div class="card-footer text-success border-success">
                    Fecha de publicacion.
                  </div>              
                </div>
                <div class="card text-center border-success text-success">
                  <div class="card-header text-white bg-success">
                    Proyecto Name
                  </div>
                  <div class="card-body border-success">
                    <img class="card-img-top" src="{{asset('images/proyectos/proyecto_4.png')}}" alt="Card image cap" width="50px;" height="300px;">
                    <h5 class="card-title text-success">name the event</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-outline-success">Lee más</a>
                  </div>
                  <div class="card-footer text-success border-success">
                    Fecha de publicacion.
                  </div>              
                </div>
            </div>            
        </div>
    </section>
@endsection