<!DOCTYPE html>
<html>
<head>
	
	<title>MAmb|Administracion</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
	  <link rel="stylesheet" type="text/css" href="{{asset('css/adminlte.min.css')}}">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	  <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css') }}">	
    <link rel="stylesheet" type="text/css" href="{{asset('css/DataTables/jquery.dataTables.min.css')}}">
	 <link rel="stylesheet" type="text/css" href="{{asset('css/DataTables/buttons.dataTables.min.css')}}">
	 <link rel="stylesheet" type="text/css" href="{{asset('css/DataTables/select.dataTables.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}"> 
	 
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" >
<!-- oncontextmenu="return false;" -->
 <div class="wrapper">
   
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">  
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>       
    </ul>
 
 
    <ul class="navbar-nav ml-auto">
    	 <li class="nav-item dropdown">
    	 	<a href="#">{{session()->get('rol')}}  &nbsp; &nbsp; </a>
         
    	 </li>
       <li class="nav-item dropdown">
         <a href="#"> {{session()->get('nombre')}} &nbsp; &nbsp;</a>
       </li>
    	 	
         <li class="nav-item dropdown">
          <img src="{{ session()->get('imagenPerfil') == '' ? 'http://192.168.100.139:3000/api/v1.0/public/images/user.png' : session()->get('imagenPerfil') }}"  width="50px" height="50px"  >
          &nbsp; &nbsp;
        </li>
           
         
    	  
    	<li class="nav-item dropdown">
    		<a class="btn btn-secondary" href="{{route('auth.destroy')}}">
    		   	<i class="fas fa-sign-in-alt"></i> Cerrar Sesión
    		</a>
    	</li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('auth.welcome')}}" class="brand-link">
      <img src="{{ asset('images/logo.png') }}" alt="ManosAmbiente Logo" class="brand-image img elevation-3"
           style="opacity: .8" width="100%">
      <span class="brand-text font-weight-light">Manos al Ambiente</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <!-- Sidebar Menu -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @foreach(session()->get('Menu') as $item)
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon {{$item['icono']}}"></i>
                  <p>
                    {{$item['nombre']}}
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                @foreach(session()->get('SubMenu') as $item2)
                <ul class="nav nav-treeview">
                  @if($item['id_menu'] == $item2['id_menu'])
                  <li class="nav-item">
                    <a href="{{route($item2['url'])}}" class="nav-link active" style="background-color: #444242;color:white;">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{$item2['NombreSubMenu']}}</p>
                    </a>
                  </li>   
                  @endif               
                </ul>
                @endforeach
              </li>
          @endforeach
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Acerca de
                <span class="right badge badge-danger">?</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
             @yield('content_route')
        </div> 
      </div> 
    </div>
     
    <div class="content">
           <div id="app">
               @yield('content')   
           </div>              
      
    </div>
     
  </div>
 
   
  <aside class="control-sidebar control-sidebar-dark">
    
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  
  <footer class="main-footer">
    
    <div class="float-right d-none d-sm-inline">
      <p>Todos los Derechos Reservados. v1.0</p>
    </div>
   
    <strong>Copyright &copy; 2020-2021  <a href="#">FUNDACIÓN MANOS AL AMBIENTE</a>.</strong> 
  </footer>
</div>
  
 
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/adminlte.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>   
	<script src="{{asset('js/DataTables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('js/DataTables/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('js/DataTables/buttons.flash.min.js')}}"></script>
	<script src="{{asset('js/DataTables/jszip.min.js')}}"></script>
	<script src="{{asset('js/DataTables/pdfmake.min.js')}}"></script>
	<script src="{{asset('js/DataTables/vfs_fonts.js')}}"></script>
	<script src="{{asset('js/DataTables/buttons.html5.min.js')}}"></script>
	<script src="{{asset('js/DataTables/buttons.print.min.js')}}"></script>
	<script src="{{asset('js/DataTables/dataTables.select.min.js')}}"></script>
 
  <script type="text/javascript" src="{{asset('js/sweetalert2@9.js')}}"></script>
 
  @yield('scripts')
</body>
</html>