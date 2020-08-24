@extends('layouts.app')
@section('content')
	<section class="events-section latest-events">
        <div class="auto-container">
            
            <div class="sec-title text-center">
                <h2>Latest <span class="normal-font theme_color">Event</span></h2>
                <div class="text">Lorem ipsum dolor sit amet, cum at inani interes setnisl omnium dolor amet amet qco modo cum text </div>
            </div>
            <div class="row clearfix">
                
                <!--Featured Column-->
                <div class="column default-featured-column style-two col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <article class="inner-box">
                        <figure class="image-box">
                            <a href="#"><img src="{{asset('images/resource/featured-image-5.jpg')}}" alt=""></a>
                            <div class="post-tag">Featured</div>
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
@endsection