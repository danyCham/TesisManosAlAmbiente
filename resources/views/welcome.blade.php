@extends('layouts.app')
@section('content')

    <section class="recent-projects">
        <div class="auto-container"> 
            <div class="sec-title clearfix">
                <div class="pull-left">
                    <h2>Conoce los ultimos <span class="normal-font theme_color">Proyectos</span></h2>
                    <div class="text">Este es tu momento de ser parte de nuestro grupo en pro del medio ambiente</div>
                </div>
            </div>         
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
    
    <!--Main Features-->
    <section class="main-features">
        <div class="auto-container">
            <div class="title-box text-center">
                <h1>30000+</h1>
                <h2>De Personas trabajan con nostros</h2>
                <h3>El medio ambiente es donde vivimos, nuestro hogar debe ser cuidado</h3>
            </div>
            
            <div class="row clearfix">
                <!--Feature Column-->
                <div class="features-column col-lg-3 col-md-6 col-xs-12">
                    <article class="inner-box">
                        <div class="icon-box">
                            <div class="icon"><span class="flaticon-illumination"></span></div>
                            <h3 class="title">ECOSISTEMA</h3>
                        </div>
                    </article>
                </div>

                <div class="features-column col-lg-3 col-md-6 col-xs-12">
                     <article class="inner-box">
                        <div class="icon-box">
                            <div class="icon"><span class="flaticon-arrows-3"></span></div>
                            <h3 class="title">RECICLAJE</h3>
                        </div>
                    </article>
                </div>
                
                <!--Feature Column-->
                <div class="features-column col-lg-3 col-md-6 col-xs-12">
                    <article class="inner-box">
                        <div class="icon-box">
                            <div class="icon"><span class="flaticon-nature-1"></span></div>
                            <h3 class="title">PURIFICACIÓN DE AGUA</h3>
                        </div>
                    </article>
                </div>
                
               <div class="features-column col-lg-3 col-md-6 col-xs-12">
                    <article class="inner-box">
                        <div class="icon-box">
                            <div class="icon"><span class="flaticon-summer-3"></span></div>
                            <h3 class="title">SISTEMA SOLAR</h3>
                        </div>
                    </article>
                </div>
                
            </div>
        </div>
    </section>
    
    
    <!--Featured Fluid Section-->
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
    
    <!--Two Column Fluid -->
    <section class="two-column-fluid"> 
        <div class="outer clearfix">
            <article class="column left-column" style="background-image:url({{asset('images/resource/fluid-image-3.jpg')}});">
                <div class="content-box pull-right">    
                    <h2>Some <span class="normal-font theme_color">Facts</span></h2>
                    <div class="title-text">Lorem ipsum dolor some link sit amet, cum at inani interesset</div>
                    <div class="text">We’re extremely proud of what we’ve achieved together with charitie lorem individuals, philanthropists and schools since the Big Give was founded in 2007, and here are some fact from our achivemnet.</div>
                    <br>
                    
                    <div class="clearfix">
                        <div class="icon-box">
                            <div class="icon"><span class="flaticon-shapes-1"></span></div>
                            <div class="lower-box">
                                <h4>$<span class="count-text" data-stop="7845910" data-speed="1500">7,845,910</span></h4>
                                <span class="title">Raised</span>
                            </div>
                        </div>
                        
                        <div class="icon-box">
                            <div class="icon"><span class="flaticon-tool-4"></span></div>
                            <div class="lower-box">
                                <h4>$<span class="count-text" data-stop="13360" data-speed="1500">12,360</span></h4>
                                <span class="title">Projects</span>
                            </div>
                        </div>
                        
                        <div class="icon-box">
                            <div class="icon"><span class="flaticon-favorite"></span></div>
                            <div class="lower-box">
                                <h4>$<span class="count-text" data-stop="78459" data-speed="1500">225,580</span></h4>
                                <span class="title">Donations</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
            </article>
            
            <article class="column right-column" style="background-image:url({{asset('images/resource/fluid-image-4.jpg')}});">
                
                <div class="content-box pull-left"> 
                    <div class="outer-box">
                        <div class="quote-icon"><span class="fa fa-quote-left"></span></div>
                        <h2>word from <span class="normal-font">CEO</span></h2>
                        
                        <!--Text Content-->
                        <div class="text-content">
                            <div class="text"><p>How to pursue pleasure rationally  consequences that are extremeely painful or again is there anyones who loves or  pursues or desires to obtain pain of itself because its sed great pleasure get well soon.</p></div>
                            <div class="information clearfix">
                                <div class="info">
                                    <figure class="image-thumb"><img src="{{asset('images/resource/ceo-thumb.jpg')}}" alt=""></figure>
                                    <h3>Alex Zender</h3>
                                    <p>CEO of Go Green</p>
                                </div>
                                <div class="signature"><img src="{{asset('images/resource/signature-image-1.png')}}" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </article>
        </div>
    </section>
    
    <!--Events Section-->
    <section class="events-section latest-events">
        <div class="auto-container">
            
            <div class="sec-title text-center">
                <h2>Conoces los ultimos <span class="normal-font theme_color">Eventos</span></h2>
                <div class="text">Unete a este movimiento en favor del medio ambiente</div>
            </div>
            <div class="row clearfix">
                
                <!--Featured Column-->
                <div class="column default-featured-column style-two col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <article class="inner-box">
                        <figure class="image-box">
                            <a href="#"><img src="{{asset('images/resource/featured-image-5.jpg')}}" alt=""></a>
                        </figure>
                        <div class="content-box">
                            <h3><a href="#">One Tree Thousand Hope</a></h3>
                            <div class="column-info">13-14 Feb in Sanfransico, CA</div>
                            <div class="text">Lorem ipsum dolor sit amet, eu qui modo expeten dis reformidans, ex sit appetere sententiae.. </div>
                            <a href="#" class="theme-btn btn-style-three">Read More</a>
                        </div>
                    </article>
                </div>
                
                <!--Featured Column-->
                <div class="column default-featured-column style-two col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <article class="inner-box">
                        <figure class="image-box">
                            <a href="#"><img src="{{asset('images/resource/featured-image-6.jpg')}}" alt=""></a>
                        </figure>
                        <div class="content-box">
                            <h3><a href="#">One Tree Thousand Hope</a></h3>
                            <div class="column-info">13-14 Feb in Sanfransico, CA</div>
                            <div class="text">Lorem ipsum dolor sit amet, eu qui modo expeten dis reformidans, ex sit appetere sententiae.. </div>
                            <a href="#" class="theme-btn btn-style-three">Read More</a>
                        </div>
                    </article>
                </div>
                
                <!--Cause Column-->
                <div class="column default-featured-column links-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <article class="inner-box">
                        <div class="vertical-links-outer">
                            <div class="link-block">
                                <div class="default inner"><figure class="image-thumb"><img src="{{asset('images/resource/post-thumb-1.jpg')}}" alt=""></figure><strong>Togather we can change the</strong><span class="desc">Lorem ipsum dolor sit amet et siu amet sio audiam si copiosaei mei purto </span></div>
                                <a href="#" class="alternate"><strong>Togather we can change the</strong><span class="desc">Lorem ipsum dolor sit amet et siu amet sio audiam si copiosaei mei purto </span></a>
                            </div>
                            
                            <div class="link-block">
                                <div class="default inner"><figure class="image-thumb"><img src="{{asset('images/resource/post-thumb-2.jpg')}}" alt=""></figure><strong>Urgent Clothe Needed</strong><span class="desc">Lorem ipsum dolor sit amet et siu amet sio audiam si copiosaei mei purto </span></div>
                               <a href="#" class="alternate"><strong>Urgent Clothe Needed</strong><span class="desc">Lorem ipsum dolor sit amet et siu amet sio audiam si copiosaei mei purto </span></a>
                            </div>
                            
                            <div class="link-block">
                                <div class="default inner"><figure class="image-thumb"><img src="{{asset('images/resource/post-thumb-3.jpg')}}" alt=""></figure><strong>Let’s plant 200 tree each...</strong><span class="desc">Lorem ipsum dolor sit amet et siu amet sio audiam si copiosaei mei purto </span></div>
                                <a href="#" class="alternate"><strong>Let’s plant 200 tree each...</strong><span class="desc">Lorem ipsum dolor sit amet et siu amet sio audiam si copiosaei mei purto </span></a>
                            </div>
                            
                            <div class="link-block">
                                <div class="default inner"><figure class="image-thumb"><img src="{{asset('images/resource/post-thumb-1.jpg')}}" alt=""></figure><strong>Keep your house envirome..</strong><span class="desc">Lorem ipsum dolor sit amet et siu amet sio audiam si copiosaei mei purto </span></div>
                                <a href="#" class="alternate"><strong>Keep your house envirome..</strong><span class="desc">Lorem ipsum dolor sit amet et siu amet sio audiam si copiosaei mei purto </span></a>
                            </div>
                            
                        </div>
                    </article>
                </div>
                
                
            </div>
        </div>
    </section> 
    
    <!--Parallax Section-->
    <section class="parallax-section" style="background-image:url({{asset('images/parallax/image-1.jpg')}});">
        <div class="auto-container">
            <div class="text-center">
                <h2>El mejor momento para el <span class="theme_color">planeta tierra</span> es ahora</h2>
                <div class="text">Tu aporte importa, conoce más</div>
                <a href="{{route('home.donaciones')}}" class="theme-btn btn-style-two">Donaciones</a>
                <a href="{{route('home.proyectos')}}" class="theme-btn btn-style-one">Eventos</a>
            </div>
        </div>
    </section>
    
    
    <!--Intro Section-->
    <section class="subscribe-intro">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Column-->
                <div class="column col-md-9 col-sm-12 col-xs-12">
                    <h2>Se parte de nuestra fundación</h2>
                    Una fundación comprometida con el cambio en el medio ambiente 
                </div>
                <!--Column-->
                <div class="column col-md-3 col-sm-12 col-xs-12">
                    <div class="text-right padd-top-20">
                        <a href="{{route('auth.registrarse')}}" class="theme-btn btn-style-one">Suscríbase ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection