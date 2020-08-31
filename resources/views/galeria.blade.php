@extends('layouts.app')
@section('content')
    <section class="events-section latest-events">
        <div class="auto-container">            
            <div class="sec-title text-center">
                <h2>Seccion de <span class="theme_color">Exposiciones</span> de<br>manos al ambiente</h2>
            </div>
            <div class="card-deck">
              <div class="card">
                <img class="card-img-top" src="{{asset('images/exposiciones/exposicion_1.png')}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer bg-success">
                  <small class="text-white">Last updated 3 mins ago</small>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="{{asset('images/exposiciones/exposicion_2.png')}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer bg-success">
                  <small class="text-white">Last updated 3 mins ago</small>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="{{asset('images/exposiciones/exposicion_3.jpg')}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer bg-success">
                  <small class="text-white">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
        </div>
    </section>
    <section class="events-section latest-events">
        <div class="auto-container">
            
            <div class="sec-title text-center">
                <h2>Seccion de <span class="theme_color">Subastas</span> de<br>manos al ambiente</h2>
                <h3 class="text-success font-weight-bold">Para ofertar en las subastas debe primero iniciar sección</h3>
            </div>
            <div class="card-deck">
              <div class="card">
                <img class="card-img-top" src="{{asset('images/exposiciones/exposicion_1.png')}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer bg-success">
                  <small class="text-white">Last updated 3 mins ago</small>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="{{asset('images/exposiciones/exposicion_2.png')}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title ">Card title</h5>
                  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer bg-success">
                  <small class="text-white">Last updated 3 mins ago</small>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="{{asset('images/exposiciones/exposicion_3.jpg')}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer bg-success">
                  <small class="text-white">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection