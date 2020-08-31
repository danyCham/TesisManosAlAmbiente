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
				<form  method="POST" action="{{route('auth.registroUsuario')}}" >
					@csrf
					<a href="#"><img src="{{asset('images/logo-2.png')}}" width="150px;" height="130px;" alt="Manos Al Ambiente"></a>
					<h1>Se parte<br>de<br>Manos al Ambiente </h1>
					
					<div class="input-group mb-3">
						<div class="custom-file">
						    <input type="file" class="file-input" id="inputGroupFile">
						    <label class="custom-file-label" for="inputGroupFile01">Ingrese su imagen de perfil</label>
					    </div>					    
					</div>					

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">Nombre</span>
					  </div>
					  <input type="text" value="{{old('Nombres')}}" name="Nombres" id="nombre" placeholder="Ingrese su nombre" title="Es necesario su nombre" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required/>
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">Apellido</span>
					  </div>
					  <input type="text" value="{{old('Apellidos')}}" name="Apellidos" id="Apellidos" class="form-control" placeholder="Ingrese sus apellidos" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">Cedula</span>
					  </div>
					  <input type="number" value="{{old('Cedula')}}"  name="Cedula" id="cedula" class="form-control" placeholder="Ingrese su cedula" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <label class="input-group-text" for="inputGroupSelect01">Sexo:</label>
					  </div>
					  <select class="custom-select" id="inputGroupSelect01">
					    <option selected>Escoger...</option>
				        <option value="F">Femenino</option>
				        <option value="M">Masculino</option>
					  </select>
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">Fecha Nacimiento</span>
					  </div>
					  <input type="date" value="{{old('FechaNacimiento')}}" name="FechaNacimiento" id="fechaNacimiento" title ="Ingrese su fecha de nacimiento" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">Direccion</span>
					  </div>
					  <input type="text" value="{{old('Direccion')}}" name="Direccion" id="direccion" class="form-control" placeholder="Ingrese su Direccion" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">Teléfono</span>
					  </div>
					  <input type="number" value="{{old('Telefono')}}" name="Telefono" id="telefono"  placeholder="Ingrese su teléfono" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

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
						<button type="button" id="btnEnviar" class="btn btn-outline-success"  style="width: auto; margin: auto auto;"> <i class="fas fa-edit"></i> Registro</button>
						<button type="submit" hidden id="btnRegistrar"></button>
					</div>
				</form>
	        </section>
	    </div>
@endsection   
@section('scripts')
   <script type="text/javascript">
   	  $(document).ready(function(){
   	  	  //detecta envento de envío de la imagen , primero la sube al servidor, extrae el nombre y lo guarda en campo oculto que viajará al controlador
          $("#btnEnviar").on("click",function(){

          	  if($("#Imagen").val().length>0){
          	  	const fd = new FormData();
          	  	let file = document.getElementById('Imagen').files[0];
          	  	let fileName = document.getElementById('Imagen').files[0].name;
          	  	$("#ImagenPerfil").val(fileName);
          	  	fd.append('image',file,fileName);
          	  	let envioImagen = axios.post('http://192.168.100.139:3000/api/v1.0/uploadImage',fd);
          	  	envioImagen.then((data)=>{
          	  		console.log(data);
          	  	}).catch((data)=>{
          	  		console.log(data);
          	  	})
          	  }
          	  else{
          	  	$("#ImagenPerfil").val('user.png');
          	  }

          	  $("#btnRegistrar").click();
          });
   	  })
   </script>
@endsection