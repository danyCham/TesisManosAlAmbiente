<!DOCTYPE html>
<html lang="es">
<head>
	<title>Manos al Ambiente</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="{{asset('css/bootstrap.min.css')}}'" rel="stylesheet" type="text/css">
	<link href="{{asset('css/revolution-slider.css')}}'" rel="stylesheet" type="text/css">
	<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/mystyle.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="page-wrapper">     
    
    <!-- Main Header -->
    <header class="main-header">
        <!-- Image and text -->
        
    	<div class="header-upper">
        	<div class="auto-container clearfix">
                <div class="logo">
                    <a href="{{route('home.index')}}"><img src="{{asset('images/logo-1.png')}}"  alt="Manos Al Ambiente" width="250px;" height="100px;"></a>
                    
                </div>
                <div class="d-flex align-items-end flex-column">
                  <a href="{{route('auth.registrarse')}}" class="px-3 btn btn-outline-success btn-sm">Registrate</a>
                  <a href="{{route('auth.index')}}" class="mt-2 btn btn-outline-primary btn-sm">Inicia sesion</a>
                </div>
            </div>
        </div><!-- Header Top End -->
        <div class="nav-outer"> 
            <nav class="main-header navbar navbar-expand navbar-white navbar-light" >
                <ul class="nav nav-tabs" style="width: auto; margin: auto auto;">
                  <li class="nav-item ">
                    <a class="{{ request()->routeIs('home.index') ? 'nav-link active' : 'nav-link' }}" href="{{route('home.index')}}">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="{{ request()->routeIs('home.proyectos') ? 'nav-link active' : 'nav-link' }}" href="{{route('home.proyectos')}}">Proyectos</a>
                  </li>
                  <li class="nav-item">
                    <a class="{{ request()->routeIs('home.galeria') ? 'nav-link active' : 'nav-link' }}" href="{{route('home.galeria')}}">Galeria</a>
                  </li>
                  <li class="nav-item">
                    <a class="{{ request()->routeIs('home.donaciones') ? 'nav-link active' : 'nav-link' }}" href="{{route('home.donaciones')}}">Donaciones</a>
                  </li>
                  <li class="nav-item">
                    <a class="{{ request()->routeIs('home.nosotros') ? 'nav-link active' : 'nav-link' }}" href="{{route('home.nosotros')}}">Acerca de Nosotros</a>
                  </li>
                  <li class="nav-item">
                    <a class="{{ request()->routeIs('home.contacto') ? 'nav-link active' : 'nav-link' }}" href="{{route('home.contacto')}}">Contáctese con Nosotros</a>
                  </li>
                </ul>          
            </nav>             
        </div>
    </header><!--End Main Header -->


    
     @yield('content')
	
     
    <!--Main Footer-->
        <br/><br/><br/>
	    <footer class="main-footer" style="background-image:url({{asset('images/background/footer-bg.jpg')}});">    	 
	    	<div class="footer-bottom">
	            <div class="auto-container clearfix">
                    <div class="copyright text-center">Agro. TATIANA ISABEL SALAS MATUTE 
                        <br>Teléfono: 043726220<br>Celular: 0993310402<br>Direccion: Lomas de Urdesa Av. Olmos 2531 y Panorama<br>Correo electronico: manosalambiente0303@gmail.com</div>
                    <div class="copyright text-center">Copyright 2020 &copy; Manos al Ambiente 
                        <a href="#"></a></div>
                        
	            </div>
	        </div>	        
	    </footer>
    
    </div>

	<script src="{{asset('js/jquery.min.js')}}"></script> 
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/popper.min.js')}}"></script>
	<script src="{{asset('js/revolution.min.js')}}"></script>
	<script src="{{asset('js/jquery.fancybox.pack.js')}}"></script>
	<script src="{{asset('js/jquery.fancybox-media.js')}}"></script>
	<script src="{{asset('js/owl.js')}}"></script>
	<script src="{{asset('js/wow.js')}}"></script>
	<script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('js_/axios.min.js')}}"></script>
    @yield('scripts')
</body>
</html>