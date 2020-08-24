@extends('layouts.app')
@section('content')
	<!--Parallax Section-->
    <section class="parallax-section" style="background-image:url({{asset('images/parallax/image-1.jpg')}});">
        <div class="auto-container">
            <div class="text-center">
                <h2>The Best time to <span class="theme_color">plant tree</span> is now</h2>
                <div class="text">Some lorem ipsum subtitle will be here ipsum dolor</div>
                <a href="{{route('home.donaciones')}}" class="theme-btn btn-style-two">Donate Now!</a>
                <a href="{{route('home.proyectos')}}" class="theme-btn btn-style-one">Join Event</a>
            </div>
        </div>
    </section>
    
    
    <!--Intro Section-->
    <section class="subscribe-intro">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Column-->
                <div class="column col-md-9 col-sm-12 col-xs-12">
                    <h2>Subcribe for Newsletter</h2>
                    There are many variations of passages of Lorem Ipsum available but the majority have 
                </div>
                <!--Column-->
                <div class="column col-md-3 col-sm-12 col-xs-12">
                    <div class="text-right padd-top-20">
                        <a href="{{route('auth.registrarse')}}" class="theme-btn btn-style-one">Subscribe Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection