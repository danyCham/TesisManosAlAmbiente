@extends('../../../layouts.main')
@section('content_route')
     <div class="col-sm-6">
       <i> <h1 class="m-0 text-dark">Post</h1> </i>
     </div> 
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">           
          <li class="breadcrumb-item active">Galería->Post</li>
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
					<button  id="btnAgregarPost" style="display:{{session()->get('rol')!='Artista'?'none':'compact'}}" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalPost">
					  Agregar <i class="fas fa-plus"></i>
					</button>
                    
					<!-- Modal -->
					<div class="modal fade" id="modalPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-xl">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title text-center"  id="exampleModalLabel">.:Post:.</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					      	<form id="frmPost" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
					         @csrf
					         <div class="row">
					         	<div class="form-row col-lg-12 col-sm-12 ml-auto" style="display: none;">
					         		<label>idPost:</label>
					         		<input type="text" name="idPost" id="idPost" value="0" >					         		 
					         	</div>

					         	<div class="form-row col-lg-4 col-sm-12">
					         		<label>Título:</label>
					         		<input type="text" id="Titulo" name="Titulo" class="form-control">		         		 
					         	</div>

					         	<div class="form-row col-lg-8 col-sm-12">
					         		<label>Descripción:</label>
					         		<input type="text" id="Descripcion" name="Descripcion" class="form-control">		         		 			         		 
					         	</div>

					         	<div class="form-row col-lg-4 col-sm-12">
					         		<label>Tipo Post:</label>
					         		<select  id="TipoPost" name="TipoPost" class="form-control">
                                       <option value="16">EXHIBICIÓN</option>
                                       <option value="17">SUBASTA</option>
                                     </select>					         		 
					         	</div>

                                 <div class="form-row col-lg-8 col-sm-12" style="display:{{session()->get('rol')=='Administrador'?'inline':'none'}}">
					         		<label>Observación:</label>
					         		<input type="text" id="Observacion" name="Observacion"  class="form-control">		         		 			         		 
					         	</div>

                                <div class="form-row col-lg-4 col-sm-12">
					         		<label>Material Usado :</label>
					         		<input type="text" id="MaterialUsado" name="MaterialUsado" class="form-control">		         		 			         		 
					         	</div>

                                 <div class="form-row col-lg-4 col-sm-12">
					         		<label>Alto :</label>
					         		<input type="number" id="Alto" name="Alto" class="form-control">		         		 			         		 
					         	</div>

                                 <div class="form-row col-lg-4 col-sm-12">
					         		<label>Ancho :</label>
					         		<input type="number" id="Ancho" name="Ancho" class="form-control">		         		 			         		 
					         	</div>

                                <div class="form-row col-lg-4 col-sm-12">
					         		<label>Tipo Arte:</label>
                                     <input type="number" id="idArte" hidden name="idArte" value="0" class="form-control">	
					         		<select  id="TipoArte" name="TipoArte" class="form-control">
                                       <option value="14">ESCULTURA</option>
                                       <option value="15">PINTURA</option>
                                     </select>					         		 
					         	</div>
                                 <div class="form-row col-lg-4 col-sm-12">
					         		<label>Fecha Inicio :</label>
					         		<input type="date" id="FechaInicio" name="FechaInicio" class="form-control">		         		 			         		 
					         	</div>

                                 <div class="form-row col-lg-4 col-sm-12">
					         		<label>Fecha Fin :</label>
					         		<input type="date" id="FechaFin" name="FechaFin" class="form-control">		         		 			         		 
					         	</div>

                                 <div class="form-row col-lg-4 col-sm-12">
					         		<label>Valor :</label>
					         		<input type="number" id="Valor" name="Valor" class="form-control">		         		 			         		 
					         	</div>

                                 <div class="form-row col-lg-4 col-sm-12">
					         		<label>Estado:</label>
					         		<select  id="Estado" name="Estado" class="form-control">
                                        <option value="6">PENDIENTE</option>
					         			<option value="7">ACTIVO</option>
					         			<option value="8">INACTIVO</option>                                        
					         		</select>					         		 
					         	</div>

                                 <div class="form-row col-lg-12 col-sm-12">
					         		<label>Imagen:</label>
                                     <input class="form-control" type="file" @change="imagen = e.target.file[0]" name="imagen" id="imagen"  accept="image/*" >
                                     <img src="" id="imagenMostrar">    
					         		 <input type="text" hidden name="PathImagen" id="PathImagen" class="form-control">		
                                      <input type="text" hidden name="idImagen" id="idImagen" value="0" class="form-control">	
                                      <input type="text" hidden name="Opcion" id="Opcion" value="1" class="form-control">			         		 
					         	</div>                               

					           </div>
					         </form>
					      </div>
					      <div class="modal-footer">
                            <button type="button" style="display:{{session()->get('rol')!='Cliente'?'none':'compact'}}" id="btnOfertarPost" class="btn btn-primary">Ofertar<i class="fas fa-save"></i> </button>					       
					         <button type="button" id="btnSavePost" class="btn btn-primary">Guardar <i class="fas fa-save"></i> </button>
					         <button type="button" id="btnClosePost" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-close"></i> </button>
					      </div>
					    </div>
					  </div>
					</div>                    
	   	    	</div>
   	 	   	  	<div>                    
   	 	   	  		<table id="tblPost" class="table table-responsive table-hover table-striped" width="98%">
   	 	   	  		<thead style="background-color: #0d967d;color:white;">	        	 
		        		<th>Cod. Post</th>	
                        <th>Título</th>	        	
		        		<th>Descripción</th>   
		        		<th>Estado</th>	        	 
		        		<th>Tipo Post</th>   
		        		<th>Cod. Imagen</th>  
		        		<th>Imagen</th>		 
                        <th>PathImagen</th>	        
		        		<th>Material</th>
                        <th>Alto</th>
		        		<th>Ancho</th>	
                        <th>idArte</th>
                        <th>Tipo Arte</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Valor</th>
		        		<th>Acción</th>    
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
   var dataTablePost = null;
   $(document).ready(function(){

    dataTablePost = $("#tblPost").DataTable({
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
            'url':'{{route("post.consultar")}}',
        },
        dom : 'Bfrtip',
        buttons: [],
        columns:[
            {name:'id_post',data:'id_post'},
            { name:'titulo',data:'titulo'},
            {name:'descripcion',data:'descripcion'},
            { name:'estado',data:'estado'},
            { name:'tipo_post',data:'tipo_post'},                
            { name:'id_imagen',data:'id_imagen'},
            {
                "data":"imagen_post",
                "render": function(data,type,row,meta){
                    return '<img src="'+data+'" style = "width:150px;heigth:150;">';
                }
            },
            { name:'imagen_post',data:'imagen_post'},     
            { name:'material_art',data:'material_art'},
            { name:'alto_art',data:'alto_art'},   
            { name:'ancho_art',data:'ancho_art'},   
            { name:'id_arte',data:'id_arte'},           
            { name:'etiqueta_arte',data:'etiqueta_arte'},           
            { name:'fecha_ini',data:'fecha_ini'}, 
            { name:'fecha_fin',data:'fecha_fin'}, 
            { name:'valor_ini',data:'valor_ini'},
            {'defaultContent':"<button class='btn btn-primary' style='color:white;' id='btnEditarPost' > <i class='fas fa-edit' > </i> </button> "   }                 
        ],     
        columnDefs: [
            {'targets':[0],'visible':false,'searchable':false},
            {'targets':[2],'visible':false,'searchable':false},       
            {'targets':[5],'visible':false,'searchable':false},
            {'targets':[7],'visible':false,'searchable':false},
            {'targets':[9],'visible':false,'searchable':false},
            {'targets':[10],'visible':false,'searchable':false},
            {'targets':[11],'visible':false,'searchable':false},
             
        ],    
        order: [[2, "asc"]],     
        iDisplayLength:5
    });

    $("#tblPost tbody").on("click","#btnEditarPost",function(){
        var data = dataTablePost.row($(this).parents("tr")).data();
        $("#modalPost").modal('show');
        $("#idPost").val(data.id_post);
        $("#idArte").val(data.id_arte);
        $("#idImagen").val(data.id_imagen);
        $("#Titulo").val(data.titulo);
        $("#Descripcion").val(data.descripcion);        
        $("#TipoPost").val(data.tipo_post === "EXHIBICION"? '16':'17');         
        $("#MaterialUsado").val(data.material_art);
        $("#Alto").val(data.alto_art);
        $("#Ancho").val(data.ancho_art);
        $("#TipoArte").val(data.etiqueta_arte === "ESCULTURA"?'14':'15');
        $("#FechaInicio").val(data.fecha_ini);
        $("#FechaFin").val(data.fecha_fin);
        $("#Valor").val(data.valor_ini);        
        $("#imagenMostrar").attr('src',data.imagen_post); 
        $('#imagenMostrar').prop('style', 'width:450px;heigth:450;margin:auto auto;');
        var estado = "0";
        if(data.estado==="PENDIENTE"){
            estado = "6"
        }if(data.estado==="ACTIVO"){
            estado = "7"
        }
        if(data.estado==="INACTIVO"){
            estado = "8"
        }        
        $("#Estado").val(estado);

        if( "{{session()->get('rol')}}" === "Administrador"){    
            $("#Opcion").val('5');
            bloquearCampos();
        }
        else{
            $("#Estado").prop('disabled',true);
            $("#Opcion").val('3');
        }
    });

    $("#btnSavePost").on("click",function(){         
        if($("#modoConsulta").val()==="S"){
                
            if($("#imagen").val().length>0){

                const fd = new FormData();
                let file = document.getElementById("imagen").files[0];
                let fileName = document.getElementById("imagen").files[0].name;
                $("#PathImagen").val(fileName);
                fd.append('image',file, fileName);
                let envioImagen = axios.post('http://192.168.100.52:3000/api/v1.0/uploadImage',fd);	              
                envioImagen.then((data)=>{
                    console.log(data);
                }).catch((data)=>{
                    console.log(data);
                })
            }
            else{
                $("#PathImagen").val('');
            }
                desbloquearCampos();
                $.ajax({
                type: 'POST', 
                url: '{{route("post.mantenimiento")}}',
                data: $('#frmPost').serialize(),
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
                            
                        dataTablePost.ajax.reload(); 
                        $("#btnClosePost").click();
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

    $("#imagen").on("change",function(){
      readURLRed(this);
    });
      
   });   
   function readURLRed(input) {
		if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#imagenMostrar').attr('src', e.target.result);
		            $('#imagenMostrar').prop('style', 'width:450px;heigth:450;margin:auto auto;');
		            path = e.target.result;
		        };

		        reader.readAsDataURL(input.files[0]);
		    }
    }
    function bloquearCampos(){
        $("#Titulo").prop('disabled',true);
        $("#Descripcion").prop('disabled',true);        
        $("#TipoPost").prop('disabled',true);         
        $("#MaterialUsado").prop('disabled',true);
        $("#Alto").prop('disabled',true);
        $("#Ancho").prop('disabled',true);
        $("#TipoArte").prop('disabled',true);
        $("#FechaInicio").prop('disabled',true);
        $("#FechaFin").prop('disabled',true);
        $("#Valor").prop('disabled',true);        
        $("#imagen").prop('disabled',true);      
    }
    function desbloquearCampos(){
        $("#Titulo").prop('disabled',false);
        $("#Descripcion").prop('disabled',false);        
        $("#TipoPost").prop('disabled',false);         
        $("#MaterialUsado").prop('disabled',false);
        $("#Alto").prop('disabled',false);
        $("#Ancho").prop('disabled',false);
        $("#TipoArte").prop('disabled',false);
        $("#FechaInicio").prop('disabled',false);
        $("#FechaFin").prop('disabled',false);
        $("#Valor").prop('disabled',false);        
        $("#imagen").prop('disabled',false); 
        $("#Estado").prop('disabled',false);
    }
</script>

@endsection