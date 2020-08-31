@extends('layouts.app')
@section('content')
	<section class="featured-fluid-section">
        <div class="outer clearfix">
            <!--Image Column-->
            <div class="image-column" style="background-image:url({{asset('images/resource/featured-image-35.jpg')}});"></div>
            
            <!--Text Column-->
            <article class="column text-column dark-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms" style="background-image:url({{asset('images/resource/fluid-image-2.jpg')}});">
                
                <div class="content-box pull-left"> 
                    <h2>Se parte de <span class="theme_color">Manos al ambiente</span> ayudanos con tu aporte</h2>
                    <div class="title-text">Como puedes ayudar <strong>registrate</strong> o si ya tiene usuario ingresa a tu perfil </div>
                    <div class="text">Todas las donaciones que se reciben son materiales de reciclaje para dar un respiro al ambiente. Pueden registrar el material y la cantidad de tu donativo para que la fundacion sepa donde tiene que ir a retirarlo o tambien puede acercarte a la direccion de la empresa para dar tu contribucion con el medio ambiente.<br>Porque juntos somos más</div>
                    <a href="{{route('auth.registrarse')}}" class="theme-btn btn-style-one">Registrate</a>
                    <a href="{{route('auth.index')}}" class="theme-btn btn-style-two">Inicia sesion</a>
                </div>
                
                <div class="clearfix"></div>
            </article>
        </div>        
    </section>
@endsection