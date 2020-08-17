@extends('layouts.app')
@section('content')

        <div class="navbar-nav">
          <h1 style="width: auto; margin: auto auto;">Registrarse en Manos al Ambiente</h1>	 
        </div>
    	
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
  <div class="container" >
	 <div class="row">	 
			<form  method="POST" action="{{route('auth.registroUsuario')}}" style="margin: auto auto; width: auto;" >
				 @csrf
				<div class="row col-12">
					<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">	 						 
						<label>Nombres:</label>
						<input type="text" value="{{old('Nombres')}}" name="Nombres" id="Nombres" class="form-control" placeholder="Ingrese sus nombres" max="100" required>

						<label>Apellidos:</label>
						<input type="text" value="{{old('Apellidos')}}" name="Apellidos" id="Apellidos" class="form-control" placeholder="Ingrese sus apellidos" required>
                    
						<label>Sexo:</label>
						<select name="Sexo" id="Sexo" class="form-control">
							<option value="F">Femenino</option>
							<option value="M">Masculino</option>
						</select> 		

											 						 
				   </div>
				<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">	
				        <label>Fecha Nacimiento:</label>
				        <input type="date" value="{{old('FechaNacimiento')}}" name="FechaNacimiento" id="FechaNacimiento" class="form-control" required>
				        <label>Cedula:</label>
						<input type="number" value="{{old('Cedula')}}"  name="Cedula" id="Cedula" class="form-control" placeholder="Ingrese su cedula" required>			
						<label>Correo Electrónico:</label>
						<input type="email" value="{{old('Correo')}}" name="Correo" id="Correo" class="form-control" placeholder="Ingrese sus correo electrónico" required>	
                         
                        		 
				</div>
				<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">	 						 
						<label>Dirección:</label>
						<input type="text" value="{{old('Direccion')}}" name="Direccion" id="Direccion" class="form-control" placeholder="Ingrese su Direccion" required>
						<label>Teléfono Celular:</label>
						<input type="number" value="{{old('Telefono')}}" name="Telefono" id="Telefono" class="form-control" placeholder="Ingrese su teléfono" required>	 
						<label>Clave:</label>
						<input type="password"   name="Clave" id="Clave" class="form-control" placeholder="Ingrese su clave" required>						 
				  </div>
				</div>

				<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">	
				    <label>Imagen Perfil:</label>
			        <input type="file" name="Imagen" accept="image/*" id="Imagen" class="form-control" required>	
			        <input type="text" name="ImagenPerfil" id="ImagenPerfil" hidden><br>					
				</div>
				
				<div class="navbar-nav">
					<button type="button" id="btnEnviar" class="btn btn-info"  style="width: auto; margin: auto auto;"> <i class="fas fa-edit"></i> Registrarse</button>
					<button type="submit" hidden id="btnRegistrar"></button>
				</div>
			</form> 		  
	  </div>   
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
          	  	fd.append('imagen',file,fileName);
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