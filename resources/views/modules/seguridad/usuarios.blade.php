@extends('../../../layouts.main')
@section('content_route')
     <div class="col-sm-6">
       <i> <h1 class="m-0 text-dark">Usuarios</h1> </i>
     </div> 
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">           
          <li class="breadcrumb-item active">Seguridad->Usuarios</li>
        </ol>
      </div> 
@endsection
@section('content') 
<div class="container">
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
   	 	 	<div style="display: none;">
   	 	 		<input type="text" id="modoConsulta" value="{{$data}}" readonly class="form-control">
   	 	 	</div>
	   	    <div class="card-body">
              <div class="form-group text-center">
                          <!-- Button trigger modal -->
                <button  id="btnAgregarUser" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalUsuarios">
                  Agregar <i class="fas fa-plus"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title text-center"  id="exampleModalLabel">.:Usuarios:.</h4>
                      </div>
                        <div class="modal-body">
                        
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
                              <input type="text"    name="idUsuario" id="idUsuario">
                            </div>
                              <div class="form-row col-lg-3 col-sm-12">
                                  <label>Rol:</label>
                                  <select id="IdRol" name="IdRol"   class="form-control">
                                    <option value="1">Administrador</option>
                                    <option value="2">Artista</option>
                                    <option value="3">Cliente</option>
                                  </select>
                              </div>					         	 
                              <div class="form-row col-lg-3 col-sm-12">
                                  <label>Nombres:</label>
                                  <input type="text" name="Nombres"     id="Nombres" class="form-control">
                              </div>
                              <div class="form-row col-lg-3 col-sm-12">
                                  <label>Apellidos:</label>
                                  <input type="text" name="Apellidos"    id="Apellidos" class="form-control">
                              </div>
                              <div class="form-row col-lg-3 col-sm-12">
                                  <label>Fecha Nacimiento:</label>
                                  <input type="date" id="FechaNacimiento" class="form-control" name="FechaNacimiento" >
                              </div>	
                              <div class="form-row col-lg-3 col-sm-12">
                                  <label>Sexo:</label>
                                  <select id="Sexo" name="Sexo" v-model="Sexo" class="form-control">
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                  </select>
                              </div>					         	 
                              <div class="form-row col-lg-3 col-sm-12 ">
                                <label>Clave <i class="fas fa-lock"></i> :</label>
                                <input type="password"    name="Clave" id="Clave"   class="form-control">
                              </div>		
                              <div class="form-row col-lg-3 col-sm-12">
                                  <label>Cédula <i class="fas fa-card"></i> :  </label>
                                  <input type="number"   pattern="Debe ingresar los 10 diginos del numero de cedula" name="Cedula" id="Cedula" max="10" class="form-control">
                              </div>			         	
                              <div class="form-row col-lg-3 col-sm-12">
                                  <label>Celular <i class="fas fa-mobile-alt"></i> :  </label>
                                  <input type="number"    pattern="Debe ingresar los 10 diginos del numero de celular" name="Celular" id="Celular" max="10" class="form-control">
                              </div>
                              <div class="form-row col-lg-3 col-sm-12">
                                <label>Correo Electrónico <i class="far fa-envelope"></i> :</label>
                                  <input type="Email"   name="Email" id="Email" class="form-control">
                              </div>
                              <div class="form-row col-lg-3 col-sm-12">
                                <label>Dirección <i class="fas fa-directions"></i> :</label>
                                <input type="text"     name="Direccion" id="Direccion" class="form-control">
                              </div>					         	 
                              <div class="form-row col-lg-3 col-sm-12 ">
                                <label>Estado:</label>
                                <select class="form-control"    name="Estado" id="Estado">
                                  <option value="1">Activo</option>
                                  <option value="2">Inactivo</option>
                                </select>
                              </div>
                              <div class="form-row col-lg-3 col-sm-12">
                                <label>Imagen Perfil <i class="far fa-file-image"></i> :</label> <br>
                                <input class="form-control" type="file" @change="imagen = e.target.file[0]" name="imagen" id="imagen"  accept="image/*" >
                              </div>
                              <div class="form-row col-lg-3 col-sm-2">
                                <input type="text" hidden name="IdImagen" id="IdImagen" >	
                                <input type="text" hidden  name="PathImagen" id="PathImagen" >					         	             		 
                                <img id="imagenMostrar" width="100px">					        
                              </div>
                            </div>
                        </form>
                      </div>
                      <div class="modal-footer">					       
                        <button type="button" id="btnSaveUser" class="btn btn-primary">Guardar <i class="fas fa-save"></i> </button>
                        <button type="button" id="btnCloseUser" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-close"></i> </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <table id="tblUsers"  class="table table-responsive table-hover table-striped" width="98%">
                  <thead style="background-color: #0d967d;color:white;">
                  <th>Cod. Usuario</th>
                  <th>Correo Electrónico</th>
                  <th>Cedula</th>
                  <th>Apellidos</th>
                  <th>Nombres</th>
                  <th>Dirección</th>
                  <th>FechaNacimiento</th>
                  <th>Cod.Rol</th>
                  <th>Sexo</th>
                  <th>Telefono</th>
                  <th>Rol</th>
                  <th>Cod Imagen</th>
                  <th>Imagen</th>
                  <th>RutaImangen</th>
                  <th>Estado Clave</th>
                  <th>Estado Usuario</th>   
                  <th>{{$data== 'N' ? 'Editar' : 'Ver Detalle'}}</th>        		
                  </thead>
                  </table>
	   	       </div>
          </div>   
    	</div>
   	  </div>
   </div>  
@endsection
@section('scripts')
<script>
   var dataTableUsers = null;
   $(document).ready(function(){
      dataTableUsers = $("#tblUsers").DataTable({
        language: {
	             "decimal": "",
	             "emptyTable": "No hay información",
	             "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
	             "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
	             "infoFiltered": "(Filtrado de _MAX_ total registros)",
	             "infoPostFix": "",
	             "thousands": ",",
	             "lengthMenu": "Mostrar _MENU_ Entradas",
	             "loadingRecords": "Cargando...",
	             "processing": "Procesando...",
	             "search": "Buscar:",
	             "zeroRecords": "Sin resultados encontrados",
	             "paginate": {
	                 "first": "Primero",
	                 "last": "Ultimo",
	                 "next": "Siguiente",
	                 "previous": "Anterior"
	             }
		       },
               ajax: {
               	  'url': '/seguridad/usuarios/consulta/0/0/8'
               },
               dom : 'Bfrtip',
               buttons: [],
               columns:[
                 { name:'id_usuario',data:'id_usuario'},
                 { name:'email',data:'email'},
                 { name:'cedula',data:'cedula'},
                 { name:'apellido',data:'apellido'},
                 { name:'nombre',data:'nombre'},
                 { name:'direccion',data:'direccion'},
                 { name:'fecha_nacimiento',data:'fecha_nacimiento'},
                 { name:'id_rol',data:'id_rol'},
                 { name:'sexo',data:'sexo'},
                 { name:'telefono',data:'telefono'},
                 { name:'Rol',data:'Rol'},          
                 { name:'id_imagen',data:'id_imagen'},                 
                 { 
                   "data":"PathImagen",
                   "render":function (data, type, row, meta){
                     return "<img src='"+data+"' width='100px' heigth='100px' >"
                   }
                 },
                 { name:'PathImagen',data:'PathImagen'},
                 { name:'estado_clave',data:'estado_clave'},
                 { name:'estado_usuario',data:'estado_usuario'},
                 {'defaultContent':"<button class='btn btn-primary' style='color:white;' id='btnEditarUser' > <i class='fas fa-edit' > </i> </button>"}                 
               ],
               columnDefs:[
                  {'targets':[0],'visible':false,'searchable':true},
                  {'targets':[5],'visible':false,'searchable':true},
                  {'targets':[6],'visible':false,'searchable':true},
                  {'targets':[7],'visible':false,'searchable':true},
                  {'targets':[8],'visible':false,'searchable':true},
                  {'targets':[9],'visible':false,'searchable':true},
                  
                  {'targets':[11],'visible':false,'searchable':true},
                  {'targets':[13],'visible':false,'searchable':true},
                  {'targets':[14],'visible':false,'searchable':true},
               ],
               iDisplayLength:4
      });
      $("#btnSaveUser").on("click",function(){
            	var idUsuario = $("#idUsuario").val();
            	if(idUsuario===""){$("#idUsuario").val('0');}
            	if($("#modoConsulta").val()==="S"){
                     
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
                                      
                        dataTableUsers.ajax.reload(); 
                        $("#btnCloseUser").click();
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
                    }
                    else
                    {
                      Swal.fire({
                      position: 'top-center',
                      icon: 'warning',
                      title: 'Notificación',
                      text: 'No tiene permisos para realizar esta acción',
                      showConfirmButton: false,
                      timer: 15000
                      });	
                    }
                    
        });

        
        $("#tblUsers tbody").on("click","#btnEditarUser",function(){
          var data = dataTableUsers.row($(this).parents("tr")).data();
            $("#modalUsuarios").modal("show");
            $('#idUsuario').val(data.id_usuario);  
            $('#IdImagen').val(data.id_imagen);  
            $("#IdRol").val(data.id_rol);
            $('#Nombres').val(data.nombre);  
            $('#Clave').val('');  
            $('#Apellidos').val(data.apellido);  
            $('#Direccion').val(data.direccion);  
            $('#Celular').val(data.telefono);  
            $('#Cedula').val(data.cedula);  
            $('#Email').val(data.email);  
            $("#PathImagen").val('');
            $("#FechaNacimiento").val(data.fecha_nacimiento);
            $("#imagenMostrar").attr("src",data.PathImagen);   	  
            $("#Estado").val(data.estado_usuario === "ACTIVO"?"1":"2");

          if($("#modoConsulta").val() == "N"){                   
            $("#Sexo").prop("disabled",true);
            $('#IdEmpleado').prop("readonly",true);  
            $('#Nombres').prop("readonly",true);   	   	       
            $('#Apellidos').prop("readonly",true);   
            $('#Direccion').prop("readonly",true);   
            $('#Celular').prop("readonly",true);  
            $('#Email').prop("readonly",true);  
            $('#Identificador').prop("readonly",true);  
            $("#IdPerfil").prop("disabled",true);  
            $("#IdEstacion").prop("disabled",true);  
            $("#Usuario").prop("disabled",true);  
            $("#Estado").prop("disabled",true);  
            $("#PathImagen").prop("disabled",true);  
            $("#Clave").prop("readonly",true);
            $("#imagen").prop("readonly",true);
            $("#btnSaveUser").prop("disabled",true);
          }          
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
    function limpiar(){
        $('#idUsuario').val('0');  
        $('#IdImagen').val('0');  
        $('#Nombres').val('');  
        $('#Clave').val('');  
        $('#Apellidos').val('');  
        $('#Direccion').val('');  
        $('#Celular').val('');  
        $('#Cedula').val('');  
        $('#Email').val('');  
        $("#PathImagen").val('');
        $("#imagen").val('');
        $("#imagenMostrar").attr("src","");   	   	    
        $("#mensajeExito").prop("hidden",true);
        $("#mensajeError").prop("hidden",true);        
    }
</script>
@endsection
 
 