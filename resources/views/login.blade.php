@extends('layouts.app')
@section('content')

    <div class="container" >
	    @if(session()->has('success'))
	         <div class="alert alert-success">
	             {{session()->get('success')}} 
	          </div>
	    @endif
	    
	    @if(isset($errors) && $errors->any())
	          <div class="alert alert-danger">
	          	<ul>
	          		@foreach($errors->all() as $item)
	                   <li>{{$item}}</li>
	          		@endforeach
	          	</ul>
	          </div>
	    
	    @endif  
	     
	    <div class="row justify-content-center"  >
	      
	          <div class="box p-4">
		          <form class="form-horizontal was-validated" method="POST" action="{{route('auth.verificar')}}">
		             @csrf
		              <div class="box-body">
		              <h2  >Acceso al Sistema Manos al Ambiente</h2>
		              <p class="text-muted" >Bienvenido al sistema</p>
		              <div class="form-group mb-3">
		                <span class="input-group-addon"><i class="icon-user"></i></span>
		                <input type="email" value="{{old('Email')}}" name="Email" id="Email" class="form-control" placeholder="Correo Electrónico" title="Es necesario ingresar el Correo Electrónico" required>
		               
		              </div>
		              <div class="form-group mb-4">
		                <span class="input-group-addon"><i class="icon-lock"></i></span>
		                <input type="password"    name="Clave" id="Clave" class="form-control" placeholder="Clave"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le recordamos que para proteger su informacion la clave deve tener minimo 8 caracteres entre ellos mayusculas , minusculas , numeros y caracteres especiales" required>
		                
		                 
		              </div>
		              <div class="row">
		                <div class="col-4">
		                  <button type="submit" class="btn btn-primary px-4"> <i class="fa fa-sign-in"></i> Acceder</button>                 
		                </div>
		                  
		                <div class="col-4">
		                	 <a class="btn btn-secondary" href="#" style="color: white">  <i class="fa fa-unlock-alt"></i> Reset Clave</a>
		                </div>
		              </div>
		            </div>
		          </form>
	          </div>   

	        </div>
       </div>
@endsection   