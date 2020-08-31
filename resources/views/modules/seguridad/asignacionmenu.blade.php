@extends('../../../layouts.main')
@section('content_route')
     <div class="col-sm-6">
       <i> <h1 class="m-0 text-dark">Asignación de Menú a Rol</h1> </i>
     </div> 
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">           
          <li class="breadcrumb-item active">Seguridad->Asingación Menu Rol</li>
        </ol>
      </div> 
@endsection
@section('content')
<br>
   <div class="container">
   	  <div class="container-fluid">   	  	
   	  	<div class="row">   	  		
   	 	   <div class="card" style="width: auto; margin: auto auto;">
   	 	   	<div style="display: none;">
   	 	 		<input type="text" id="modoConsulta" value="{{$data}}" readonly class="form-control">
   	 	 	</div>
   	 	   	  <div class="card-body">
   	 	   	  	<div class="form-group text-center">
						   	    		<!-- Button trigger modal -->
					<button  id="btnAgregarMenuRol" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalMenuRol">
					  Agregar <i class="fas fa-plus"></i>
					</button>
                    
					<!-- Modal -->
					<div class="modal fade" id="modalMenuRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title text-center"  id="exampleModalLabel">.:Asignación Menú Perfiles:.</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					      	<form id="frmMenuRol" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
					         @csrf
					         <div class="row">
					         	<div class="form-row col-lg-12 col-sm-12 ml-auto" style="display: none;">
					         		<label>IdMenuRol:</label>
					         		<input type="text" name="idMenuRol" id="idMenuRol">					         		 
					         	</div>

					         	<div class="form-row col-lg-12 col-sm-12">
					         		<label>Rol:</label>
					         		<select id="idRol"  name="idRol" class="form-control">
                                       <option value="1">Administrador</option>
                                       <option value="2">Artista</option>
                                       <option value="3">Cliente</option>
                                     </select>					         		 
					         	</div>

					         	<div class="form-row col-lg-12 col-sm-12">
					         		<label>Menú:</label>
					         		<select  id="idMenu" name="idMenu" class="form-control"></select>					         		 
					         	</div>

					         	<div class="form-row col-lg-12 col-sm-12">
					         		<label>SubMenu:</label>
					         		<select  id="idSubMenu" name="idSubMenu" class="form-control"></select>					         		 
					         	</div>
					          
					            <div class="form-row col-lg-12 col-sm-12">
					         		<label>Modificar:</label>
					         		<select  id="Gestion" name="Gestion" class="form-control">
					         			<option value="S">SI</option>
					         			<option value="N">NO</option>
					         		</select>					         		 
					         	</div>

					         	<div class="form-row col-lg-12 col-sm-12">
					         		<label>Estado:</label>
					         		<select  id="Estado" name="Estado" class="form-control">
					         			<option value="A">Activo</option>
					         			<option value="I">Inactivo</option>
                                         <option hidden value="E">Eliminado</option>
					         		</select>					         		 
					         	</div>

					           </div>
					         </form>
					      </div>
					      <div class="modal-footer">					       
					         <button type="button" id="btnSaveMenuRol" class="btn btn-primary">Guardar <i class="fas fa-save"></i> </button>
					         <button type="button" id="btnCloseMenuRol" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-close"></i> </button>
					      </div>
					    </div>
					  </div>
					</div>
	   	    	</div>
   	 	   	  	<div>
                    
   	 	   	  		<table id="tblMenuRol" class="table table-responsive table-hover table-striped" width="98%">
   	 	   	  		<thead style="background-color: #0d967d;color:white;">	        	 
		        		<th>Cod. Menu Rol</th>	
                        <th>Cod. Rol</th>	        	
		        		<th>Rol</th>   
		        		<th>Cod Menu</th>	        	 
		        		<th>Menú</th>   
		        		<th>Cod. Sub Menú</th>  
		        		<th>Submenú</th>		         
		        		<th>Modificar</th>
                        <th>Modificar</th>
		        		<th>Estado</th>	
                        <th>Estado</th>
		        		<th align="center">Acción</th>    
		        	  </thead>
   	 	   	  	</table>
   	 	   	  	</div>
   	 	   	  </div>
   	 	   </div>
    	</div>
   	  </div>
   </div>  
@endsection
@section('scripts')

<script>
  dataTableMenuRol = null;
  $(document).ready(function(){
      llenarComboSubMenu(1);
      dataTableMenuRol = $("#tblMenuRol").DataTable({
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
                'url':'{{route("menurol.consultar","3")}}',
            },
            dom : 'Bfrtip',
            buttons: [],
            columns:[
                {name:'id_menu_rol',data:'id_menu_rol'},
                { name:'id_rol',data:'id_rol'},
                {name:'rol',data:'rol'},
                { name:'id_menu',data:'id_menu'},
                {name:'menu',data:'menu'},
                { name:'id_sub_menu',data:'id_sub_menu'},
                { name:'NombreSubMenu',data:'NombreSubMenu'},                
                { name:'gestion',data:'gestion'},
                {
                    "data":"gestion",
                    "render":function(data,type,row,meta){
                        if(data==="S"){
                            return "SI"
                        }
                        else{
                            return "NO"
                        }
                    }
                },
                { name:'estado',data:'estado'}, 
                {
                    "data":"estado",
                    "render":function(data,type,row,meta){
                        if(data==="A"){
                            return "ACTIVO"
                        }
                        else{
                            return "INACTIVO"
                        }
                    }
                },                                    
                {'defaultContent':"<button class='btn btn-primary' style='color:white;' id='btnEditarMR' > <i class='fas fa-edit' > </i> </button>  <button class='btn btn-danger' style='color:white;' id='btnElimnarMR' > <i class='fas fa-trash' > </i> </button> "   }                 
            ],     
            columnDefs: [
                {'targets':[0],'visible':false,'searchable':false},
                {'targets':[1],'visible':false,'searchable':false},                
                {'targets':[3],'visible':false,'searchable':false},
                {'targets':[5],'visible':false,'searchable':false},
                {'targets':[7],'visible':false,'searchable':false},
                {'targets':[9],'visible':false,'searchable':false}
            ],    
            order: [[2, "asc"]],     
            iDisplayLength:5
      });

      $("#tblMenuRol tbody").on("click","#btnEditarMR",function(){
            var data = dataTableMenuRol.row($(this).parents("tr")).data();
            if($("#modoConsulta").val() === "S"){

                $("#idMenuRol").val(data.id_menu_rol);
                $("#idMenu").val(data.id_menu);
                $("#idSubMenu").empty();
                llenarComboSubMenu(data.id_menu);
                $("#idSubMenu").val(data.id_sub_menu);
                $("#Gestion").val(data.gestion);
                $("#Estado").val(data.estado);
                $("#idRol").val(data.id_rol);
                $("#modalMenuRol").modal("show");

            }
            else{
                $("#idMenuRol").val(data.id_menu_rol);
                $("#idMenu").val(data.id_menu);
                $("#idSubMenu").empty();
                llenarComboSubMenu(data.id_menu);
                $("#idSubMenu").val(data.id_sub_menu);
                $("#Gestion").val(data.gestion);
                $("#Estado").val(data.estado);
                $("#idRol").val(data.id_rol);
                $("#modalMenuRol").modal("show");


                $("#idMenuRol").prop("disabled",true);
                $("#idMenu").prop("disabled",true);
                $("#idSubMenu").prop("disabled",true);                
                $("#Gestion").prop("disabled",true);
                $("#Estado").prop("disabled",true);
                $("#idRol").prop("disabled",true);

                $("#btnSaveMenuRol").prop("disabled",true);
                $("#modalMenuRol").modal("show");
            }
            
        })

        $("#tblMenuRol tbody").on("click","#btnElimnarMR",function(){
            var data = dataTableMenuRol.row($(this).parents("tr")).data();
            $("#idMenuRol").val(data.id_menu_rol);
            $("#Estado").val('E');
            Swal.fire({
            title: '¿Está seguro de eliminar?',
            text: "Ya no estará disponible!!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
            }).then((result) => {
            if (result.value) {
                 $("#btnSaveMenuRol").click();
              }
            })
            
        })

      llenarComboMenu();

      $("#idMenu").on("change",function(){
          $("#idSubMenu").empty();
          llenarComboSubMenu($("#idMenu").val());
      });

         $("#btnSaveMenuRol").on("click",function(){
               if($("#id_menu_rol").val() === ""){$("#id_menu_rol").val('0')}
               if($("#modoConsulta").val() === "S"){
               	  $.ajax({
				    type: 'POST', 
				    url: '{{route("menurol.mantenimiento")}}',
				    data: $('#frmMenuRol').serialize(),
				    success: function (data) { 
				    	 console.log(data);
				    	 if(data.respuesta[0].CodigoError==="0000"){
				    	 	Swal.fire({
							  position: 'top-center',
							  icon: 'success',
							  title: 'Notificación',
							  text: data.respuesta[0].MensajeError,
							  showConfirmButton: false,
							  timer: 15000
						    });		
                            
						    dataTableMenuRol.ajax.reload(); 
						    $("#btnCloseMenuRol").click();
				    	 }
				    	 else
				    	 {
				    	 	Swal.fire({
							  position: 'top-center',
							  icon: 'warning',
							  title: 'Notificación',
							  text: data.respuesta[0].MensajeError,
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
						  title: 'Notificacion',
						  text: data.responseText ,
						  showConfirmButton: false,
						  timer: 15000
						});				    	 
				    } 
				 });
               }
               else{
               	 Swal.fire({
				  position: 'top-center',
				  icon: 'warning',
				  title: 'Notificacion',
				  text: 'No tiene los permisos suficientes',
				  showConfirmButton: false,
				  timer: 15000
			     });	
               }               
           });
      
  });
  
  function llenarComboMenu(){
       	 $.ajax({
		    type: "GET",
		    url:'{{route("menurol.consultar","1")}}',
		    dataType: "json",
		    success: function(data){		    	 
		      for(var i=0;i<data.data.length;i++){
		        $("#idMenu").append('<option value='+data.data[i].id_menu+'>'+data.data[i].nombre+'</option>');
		      }        
		    },
		    error: function(data) {
		      console.log('error');
		    }
 		 });
       }

       function llenarComboSubMenu(idMenu){      	
       	 $.ajax({
		    type: "GET",
		    url:'{{route("menurol.consultar","2")}}',
		    dataType: "json",
		    success: function(data){	
		      	     
		      for(var i=0;i<data.data.length;i++){
		      	if(data.data[i].id_menu === parseInt(idMenu)){
		          $("#idSubMenu").append('<option value='+data.data[i].id_sub_menu+'>'+data.data[i].NombreSubMenu+'</option>');
		        }
		      }       
		    },
		    error: function(data) {
		      console.log('error');
		    }
 		 });
       }

       function limpiar(){
       	  $("#IdMenuRol").val('0');
       }
</script>

@endsection