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
				    <span class="input-group-text" id="basic-addon1">Correo</span>
				  </div>
				  <input type="email" value="{{old('Correo')}}" name="Email" id="email" class="form-control" placeholder="Ingrese su correo electrónico" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
				</div>

				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">Password</span>
				  </div>
				  <input type="password" name="Clave" placeholder="Ingrese su password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le recordamos que para proteger su informacion la clave deve tener minimo 8 caracteres entre ellos mayusculas , minusculas , numeros y caracteres especiales" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required/>
				</div>
				<div class="input-group mb-3">
					<input type="submit" class="btn btn-outline-success" value="Ingresar" />
				</div>
				<div class="input-group mb-3">
					<a href="#">Perdiste tu contraseña?</a>
				</div>
			</form>
	    </section>
    </div>

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
                        <a href="#" class="theme-btn btn-style-one">Subscribe Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection   