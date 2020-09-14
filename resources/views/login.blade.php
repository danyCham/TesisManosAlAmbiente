@extends('layouts.app')
@section('content')

    <div class="container" >
    	<div class="text-center">
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
    	</div>
	    
	     
	    <section id="mycontent">
			<form method="POST" action="{{route('auth.verificar')}}">
				<a href="#"><img src="{{asset('images/logo-2.png')}}" width="150px;" height="130px;" alt="Manos Al Ambiente"></a>
				<h1> Ingresa<br>a<br>Manos al Ambiente </h1>
				@csrf
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text border border-success" id="basic-addon1">Correo</span>
				  </div>
				  <input type="email" value="{{old('Correo')}}" name="Email" id="email" class="form-control border border-success" placeholder="Ingrese su correo electrónico" aria-label="Username" aria-describedby="basic-addon1" required>
				</div>

				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text border border-success" id="basic-addon1">Password</span>
				  </div>
				  <input type="password" name="Clave" placeholder="Ingrese su password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le recordamos que para proteger su informacion la clave deve tener minimo 8 caracteres entre ellos mayusculas , minusculas , numeros y caracteres especiales" class="form-control border border-success" aria-label="Username" aria-describedby="basic-addon1" required/>
				</div>
				<div class="input-group mb-3">
					<input type="submit" class="btn btn-outline-success" value="Ingresar" style="width: auto; margin: auto auto;"/>
				</div>
				<div class="input-group mb-3">
					<a href="{{route('auth.registrarse')}}" class="btn btn-outline-primary">Registrate</a>
				</div>
				<div class="input-group mb-3">
					<a href="#">Olvidaste tu contraseña?</a>
				</div>
			</form>
	    </section>
    </div>
@endsection   