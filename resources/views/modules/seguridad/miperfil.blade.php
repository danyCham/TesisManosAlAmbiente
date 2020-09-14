@extends('../../../layouts.main')
@section('content_route')
     <div class="col-sm-6">
       <i> <h1 class="m-0 text-dark">Mi Perfil</h1> </i>
     </div> 
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">           
          <li class="breadcrumb-item active">Seguridad->Mi Perfil</li>
        </ol>
      </div> 
@endsection
@section('content')
<div class="container-fluid">   	  	
   	  	<div class="row">   	  		
   	 	 <div class="card">
   	 	 	<div class="card-header">
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
	   	    <div class="card-body">           
               <div class="modal-body">
                        @foreach(session()->get('dataUsuario') as $item)
                        <form id="frmUsuario" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">		
                          @csrf	
                          <div class="row">			
                            <div class="form-group col-xs-12 col-sm-12 col-lg-12 col-md-12">
                              <div id="mensajeError" class="alert alert-danger">
                                <p id="mensaje1"></p>
                                  </div>
                                <div id="mensajeExito" class="alert alert-success">
                                  <p id="mensaje2"></p>
                              </div>
                          </div>      				  
                          <div class="form-row col-lg-6 col-sm-12 ml-auto" style="display: none;">
                            <label>IdUsuario:</label>
                            <input type="text"  value="{{$item['id_usuario']}}"  name="idUsuario" id="idUsuario">
                          </div>
                            <div class="form-row col-lg-3 col-sm-12" style="display:none">
                                <label>Rol:</label>
                                 <input id="IdRol" name="IdRol" value="{{$item['id_rol']}}">
                            </div>					         	 
                            <div class="form-row col-lg-3 col-sm-12">
                                <label>Nombres:</label>
                                <input type="text" name="Nombres"  value="{{$item['nombre']}}"   id="Nombres" class="form-control">
                            </div>
                            <div class="form-row col-lg-3 col-sm-12">
                                <label>Apellidos:</label>
                                <input type="text" name="Apellidos" value="{{$item['apellido']}}"   id="Apellidos" class="form-control">
                            </div>
                            <div class="form-row col-lg-3 col-sm-12">
                                <label>Fecha Nacimiento:</label>
                                <input type="date" id="FechaNacimiento"  value="{{$item['fecha_nacimiento']}}" class="form-control" name="FechaNacimiento" >
                            </div>	
                            <div class="form-row col-lg-3 col-sm-12">
                                <label>Sexo:</label>
                                <select id="Sexo" name="Sexo" class="form-control">
                                  <option value="F" {{$item['sexo'] == 'F'? 'selected' :'' }} >Femenino</option>
                                  <option value="M" {{$item['sexo'] == 'M'? 'selected' :'' }} >Masculino</option>
                                </select>
                            </div>					         	 
                            <div class="form-row col-lg-3 col-sm-12 ">
                              <label>Clave <i class="fas fa-lock"></i> :</label>
                              <input type="password"    name="Clave" id="Clave"   class="form-control">
                            </div>		
                            <div class="form-row col-lg-3 col-sm-12">
                                <label>Cédula <i class="fas fa-card"></i> :  </label>
                                <input type="number" value ="{{$item['cedula']}}"  pattern="Debe ingresar los 10 diginos del numero de cedula" name="Cedula" id="Cedula" max="10" class="form-control">
                            </div>			         	
                            <div class="form-row col-lg-3 col-sm-12">
                                <label>Celular <i class="fas fa-mobile-alt"></i> :  </label>
                                <input type="number" value ="{{$item['telefono']}}"   pattern="Debe ingresar los 10 diginos del numero de celular" name="Celular" id="Celular" max="10" class="form-control">
                            </div>
                            <div class="form-row col-lg-3 col-sm-12">
                              <label>Correo Electrónico <i class="far fa-envelope"></i> :</label>
                                <input type="Email" value ="{{$item['email']}}"  name="Email" id="Email" class="form-control">
                            </div>
                            <div class="form-row col-lg-3 col-sm-12">
                              <label>Dirección <i class="fas fa-directions"></i> :</label>
                              <input type="text"  value ="{{$item['direccion']}}"    name="Direccion" id="Direccion" class="form-control">
                            </div>					         	 
                            <div class="form-row col-lg-3 col-sm-12 " style="display:none">
                              <label>Estado:</label>
                               <input id="Estado" name="Estado" value ="{{$item['estado_usuario']}}" >
                            </div>
                            <div class="form-row col-lg-3 col-sm-12">
                              <label>Imagen Perfil <i class="far fa-file-image"></i> :</label> <br>
                              <input class="form-control" type="file" @change="imagen = e.target.file[0]" name="imagen" id="imagen"  accept="image/*" >
                            </div>
                            <div class="form-row col-lg-3 col-sm-2">
                              <input type="text" hidden name="IdImagen" id="IdImagen" value ="{{$item['id_imagen']}}" >	
                              <input type="text" hidden  name="PathImagen" id="PathImagen" >					         	             		 
                              <img id="imagenMostrar" src="{{$item['PathImagen']}}" width="100px">					        
                            </div>
                          </div>
                       </form>
                       @endforeach
                      </div>
                      <div class="modal-footer">					       
                          <button type="button" id="btnSaveUser" class="btn btn-primary">Guardar <i class="fas fa-save"></i> </button>
                         
                      </div>
                
               </div>
	   	    </div>
          </div>   
    	</div>
   	  </div>
   </div>  
@endsection
@section('scripts')
<script> 
   $(document).ready(function(){ 
      $("#btnSaveUser").on("click",function(){
            	var idUsuario = $("#idUsuario").val();
            	if(idUsuario===""){$("#idUsuario").val('0');}
            	 
                     
                     if($("#imagen").val().length>0){
                        const fd = new FormData();
                        let file = document.getElementById("imagen").files[0];
                        let fileName = document.getElementById("imagen").files[0].name;
                        $("#PathImagen").val(fileName);
                        fd.append('image',file, fileName);
                        let envioImagen = axios.post('http://localhost:3000/api/v1.0/uploadImage',fd);	              
                              envioImagen.then((data)=>{
                                console.log(data);
                              }).catch((data)=>{
                                console.log(data);
                              })
                        }
                        else{
                          $("#PathImagen").val('');
                        }
		            
            		 $.ajax({
                    type: 'POST', 
                    url: '{{route("usuario.mantenimiento")}}',
                    data: $('#frmUsuario').serialize(),
                    success: function (data) { 
                      console.log(data);
                      if(data.data[0].CodigoError==="0000"){
                        Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Notificación',
                        text: data.data[0].MensajeError,
                        showConfirmButton: false,
                        timer: 15000
                        });		
                                      
                        
                      }
                      else
                      {
                        Swal.fire({
                        position: 'top-center',
                        icon: 'warning',
                        title: 'Notificación',
                        text: data.data[0].MensajeError,
                        showConfirmButton: false,
                        timer: 15000
                        });	
                      }

                      
                    },
                    error: function(data){
                      console.log(data);
                        Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Notificación',
                        text: data.responseText ,
                        showConfirmButton: false,
                        timer: 15000
                      });				    	 
                    } 
                    });
                   
                    
                    
        });             

      $("#mensajeExito").prop("hidden",true);
      $("#mensajeError").prop("hidden",true);

      if($("#modoConsulta").val()!=="S"){
        $("#btnAgregarUser").prop("disabled",true);
      }      
      $("#imagen").on("change",function(){
            readURLRed(this);
      });
      $("#btnAgregarUser").on("click",function(){
            limpiar();
      });
      $("#btnCloseUser").on("click",function(){
            limpiar();
      });
      $("#Clave").on("keypress",function(){
            validarClave($("#Clave").val())
      });
      $("#Clave").on("keydown",function(event){
          if(event.which == 8 && $("#Clave").val().trim() ==="") {
              $("#mensajeExito").prop("hidden",true);
              $("#mensajeError").prop("hidden",true);
              $("#btnSaveUser").prop("disabled",false);
            }             
      }); 
      $("#Celular").on("keypress",function(event){
         if(event.charCode >= 48 && event.charCode <= 57 && $("#Celular").val().length < 10){
              return true;
          }
          return false;        
      });   
      $("#Cedula").on("keypress",function(event){
         if(event.charCode >= 48 && event.charCode <= 57 && $("#Cedula").val().length < 10){
              return true;
          }
          return false;        
      });       
      $("#Email").on("keypress",function(){
         validarEmail($("#Email").val());
      });
      $("#Email").on("keypress",function(event){
        if(event.which === 8){
            validarEmail($("#Email").val());
        }            
      });
      $("#Email").on("keydown",function(event){
          if(event.which == 8 && $("#Email").val().trim() ==="") {
              $("#mensajeExito").prop("hidden",true);
              $("#mensajeError").prop("hidden",true);
              $("#btnSaveUser").prop("disabled",false);
            }             
      }); 
   });
   function validarClave(clave){
     if(/^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{8,}$/i.test(clave)){
          $("#mensajeExito").prop("hidden",false);
          $("#mensajeError").prop("hidden",true);
          $("#mensaje2").text("Formato de la clave es correcto");
          $("#btnSaveUser").prop("disabled",false);               
	       }
	       else{
          $("#mensajeExito").prop("hidden",true);
          $("#mensajeError").prop("hidden",false);
          $("#mensaje1").text("Formato de la clave es incorrecto , necesita ingresar mayúsculas , minúsculas , números y caracteres especiales, debe ser mínimo de 8 caracteres");
          $("#btnSaveUser").prop("disabled",true);
	       }
      }
      function validarEmail(valor) {
          if (/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9.]{2,4})+$/.test(valor)){
            $("#mensajeExito").prop("hidden",false);
                  $("#mensajeError").prop("hidden",true);
                  $("#mensaje2").text("Formato del correo  es correcto");
                  $("#btnSaveUser").prop("disabled",false);
          } else {
              $("#mensajeExito").prop("hidden",true);
                  $("#mensajeError").prop("hidden",false);
                  $("#mensaje1").text("Debe ingresar una dirección de correo electrónico válida");
                  $("#btnSaveUser").prop("disabled",true);
          }
      }
      function readURLRed(input) {
      if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#imagenMostrar').attr('src', e.target.result);
                  $('#imagenMostrar').prop('style', 'width:100px;heigth:100px;');
                  path = e.target.result;
              };
              reader.readAsDataURL(input.files[0]);
          }
      }
    function soloLetras(event) {
        if((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57) || event.charCode === 32 || event.charCode === 127 ){
          return true;
      }
      return false;       
    }     
</script>
@endsection