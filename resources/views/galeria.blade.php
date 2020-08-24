@extends('layouts.app')
@section('content')
	<section class="featured-fluid-section">
        <div class="outer clearfix">
            <!--Image Column-->
            <div class="image-column" style="background-image:url({{asset('images/resource/fluid-image-1.jpg')}});"></div>
            
            <!--Text Column-->
            <article class="column text-column dark-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms" style="background-image:url({{asset('images/resource/fluid-image-2.jpg')}});">
                
                <div class="content-box pull-left"> 
                    <h2>Join <span class="theme_color">our event</span> &amp; helping us by donation</h2>
                    <div class="title-text">Lorem ipsum dolor <a href="#"><strong>some link</strong></a> sit amet, cum at inani interesset </div>
                    <div class="text">Lorem ipsum dolor sit amet, eu qui modo expetendis reformidans ex sit set appetere sententiae seo eum in simul homero. Duo consul lorem probatus no qu alterum sit at no simple dummy.</div>
                    <a href="#" class="theme-btn btn-style-one">Join Now</a>
                    <a href="#" class="theme-btn btn-style-two">View details</a>
                </div>
                
                <div class="clearfix"></div>
            </article>
        </div>        
    </section>
@endsection