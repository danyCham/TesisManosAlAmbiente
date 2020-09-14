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
   	 	   	  	<div class="form-group">
						   	    		<!-- Button trigger modal -->
					<button id="btnAgregarPost" style="display:{{session()->get('rol')=='Cliente'?'none':'compact'}}" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalPost">
					  Agregar <i class="fas fa-plus"></i>
					</button>
                    
					<!-- Modal -->
					<div class="modal fade" id="modalPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-xl">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title"  id="exampleModalLabel">.:Post:.</h4>
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
					         		<input type="text" name="idPost" id="idPost"  value="0" >					         		 
					         	</div>
                      <div class="form-row col-lg-12 col-sm-12 ml-auto" style="display: none;">
                          <label>idArte:</label>
                          <input type="text" name="idArte" id="idArte" value="0" >
					         		<input type="text" name="idPost" id="idPost" value="0" >					         		 
					         	</div>
                    <div class="form-row col-lg-12 col-sm-12 ml-auto" style="display: none;">
                        <label>idArte:</label>
                        <input type="text" name="idArte" id="idArte"  value="0">
                    </div>                                
                    <div class="form-row col-lg-12 col-sm-12 ml-auto" style="display:{{session()->get('rol')=='Cliente'?'inline':'none'}}">
                        <h4 class="modal-title">Datos del artista</h4>                                  
                    </div>

                    <div class="form-row col-lg-4 col-sm-12" style="display:{{session()->get('rol')=='Cliente'?'inline':'none'}}">                                    
                        <label>Nombre del artista:</label>
                        <input type="text" id="Nombre" name="Nombre" class="form-control">                    
                    </div>

                    <div class="form-row col-lg-4 col-sm-12" style="display:{{session()->get('rol')=='Cliente'?'inline':'none'}}">
                        <label>Correo electronico:</label>
                        <input type="text" id="Correo" name="Correo" class="form-control">                       
                    </div>

                    <div class="form-row col-lg-4 col-sm-12" style="display:{{session()->get('rol')=='Cliente'?'inline':'none'}}">
                        <label>Telefono:</label>
                        <input type="text" id="Telefono" name="Telefono" class="form-control">                       
                    </div>

                    <div class="form-row col-lg-4 col-sm-12" style="display:{{session()->get('rol')=='Cliente'?'inline':'none'}}">
                        <label>Imagen del artista: </label>
                         <img src="" id="imagenArtistaMostrar" style = "width:150px;heigth:150;"> 
                    </div>

                    <div class="form-row col-lg-12 col-sm-12"style="display:{{session()->get('rol')=='Cliente'?'inline':'none'}}">
                        <h4 class="modal-title">Datos del post</h4>                     
                    </div>

                    <div class="form-row col-lg-12 col-sm-12">
                        <label>Imagen:</label>
                         <input style="display:{{session()->get('rol')!='Cliente'?'inline':'none'}}" class="form-control" type="file" @change="imagen = e.target.file[0]" name="imagen" id="imagen"  accept="image/*" >
                         <img src="" id="imagenMostrar" style = "width:200px;heigth:200;">    
                         <input style="display:{{session()->get('rol')!='Cliente'?'inline':'none'}}" type="text" hidden name="PathImagen" id="PathImagen" class="form-control">      
                          <input style="display:{{session()->get('rol')!='Cliente'?'inline':'none'}}" type="text" hidden name="idImagen" id="idImagen" value="0" class="form-control">   
                          <input  style="display:{{session()->get('rol')!='Cliente'?'inline':'none'}}" type="text" hidden name="Opcion" id="Opcion" value="1" class="form-control">                            
                    </div>

					         	<div class="form-row col-lg-4 col-sm-12">
					         		<label>Título:</label>
					         		<input type="text" id="Titulo" name="Titulo" class="form-control"maxlength="50" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">		         		 
					         	</div>

					         	<div class="form-row col-lg-4 col-sm-12">
					         		<label>Tipo Post:</label>
					         		<select  id="TipoPost" name="TipoPost" class="form-control">
                         <option value="">Seleccione</option>   
                             @foreach($datoCatalogo as $item)
                               @if($item['nombre'] == 'TIPO_POST')
                                 @if(session()->get('rol')=='Administrador')
                                   @if($item['detalle'] =='PROYECTO') 
                                      <option value="{{$item['id_catalogoDet']}}">{{$item['detalle']}}</option>
                                   @endif
                                  @else
                                      <option value="{{$item['id_catalogoDet']}}">{{$item['detalle']}}</option>
                                  @endif
                              @endif
                              @endforeach
                       </select>					         		 
					         	</div>
                    <div class="form-row col-lg-4 col-sm-12">
                        <label>Material Arte:</label>
                        <select  id="IdMaterial" name="IdMaterial" class="form-control">
                            <option value="">Seleccione</option>
                               @foreach($datoMaterial as $itemMat)
                                <option value="{{$itemMat['id_material']}}">{{$itemMat['nombre']}}</option>
                               @endforeach
                         </select>                                   
                    </div>

                                 <div class="form-row col-lg-4 col-sm-12">
					         		<label>Alto :</label>
					         		<input type="number" id="Alto" name="Alto" class="form-control" title="Se admiten hasta 5 cifras" maxlength="5" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">		         		 			         		 
					         	</div>

                                 <div class="form-row col-lg-4 col-sm-12">
					         		<label>Ancho :</label>
					         		<input type="number" id="Ancho" name="Ancho" class="form-control" title="Se admiten hasta 5 cifras" maxlength="5" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">		         		 			         		 
					         	</div>

                                <div class="form-row col-lg-4 col-sm-12">
					         		<label>Tipo Arte:</label>	
					         		<select  id="TipoArte" name="TipoArte" class="form-control">
                                        <option value="">Seleccione</option>
                                           @foreach($datoCatalogo as $item)
                                             @if($item['nombre'] == 'TIPO_ARTE') 
                                            <option value="{{$item['id_catalogoDet']}}">{{$item['detalle']}}
                                            </option>
                                            @endif
                                            @endforeach
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
                                 <div class="form-row col-lg-4 col-sm-12" style="display:{{session()->get('rol')!='Cliente'?'inline':'none'}}">
					         		<label>Estado:</label>
					         		<select  id="Estado" name="Estado" class="form-control">
                                        <option value="">Seleccione</option>
                                        @if(session()->get('rol')=='Administrador')
                                             @foreach($datoCatalogo as $item)
                                                 @if($item['nombre'] == 'ESTADO_POST')
                                                <option value="{{$item['id_catalogoDet']}}">{{$item['detalle']}}
                                                </option>
                                                @endif
                                             @endforeach
                                         @else                                         
                                          <option value="6">PENDIENTE</option>
                                         @endif                                        
					         		</select>					         		 
					         	</div>
                                <div class="form-row col-lg-4 col-sm-12">
                                    <label>Valor del arte :</label>
                                    <input type="number" id="Valor" name="Valor" class="form-control" title="Se admiten hasta 5 cifras" maxlength="5" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                                <div class="form-row col-lg-4 col-sm-12">
                                    @if(session()->get('rol')=='Administrador')
                                     <label>Pdf:</label>
                                     <input type="file" id="PDF" accept="pdf/*">
                                     <a href="" id="linkPdf" target="_blank" >Ver Pdf</a>
                                     <input type="text" id="PathPdf" name="PathPdf" hidden>
                                    @endif
                                </div>
                                    <label>Descripción:</label>
                                    <textarea class="form-control" rows="5" id="Descripcion" name="Descripcion" maxlength="250" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></textarea>                                                   
                                </div>


                                 <div class="form-row col-lg-4 col-sm-12" style="display:{{session()->get('rol')=='Administrador'?'inline':'none'}}">
                                    <label>Observación:</label>
                                    <textarea class="form-control" rows="5" id="Observacion" name="Observacion" maxlength="250" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></textarea>
                                </div>
					           </div>
					         </form>
					      </div>
					      <div class="modal-footer">
                            <button type="button" style="display:{{session()->get('rol')=='Cliente'?'inline':'none'}}" id="btnCotizaPost" class="btn btn-success">Cotiza <i class="fi-fire"></i> </button>				       
					         <button type="button" style="display:{{session()->get('rol')!='Cliente'?'inline':'none'}}" id="btnSavePost" class="btn btn-primary">Guardar <i class="fas fa-save"></i> </button>
					         <button type="button" id="btnClosePost" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-close"></i> </button>
					      </div>
					    </div>
					  </div>
					</div>                    
	   	    	</div>
   	 	   	  	<div>                    
   	 	   	  		<table id="tblPost" class="table table-responsive table-hover table-striped" width="98%">
   	 	   	  		<thead style="background-color: #0d967d;color:white;">
                        <th>Cod artista</th>
                        <th>Nombre artista</th>
                        <th>email</th>
                        <th>telefono</th>
                        <th>foto Artista</th>
		        		<th>Cod. Post</th>	
                        <th>Título</th>	        	
		        		<th>Descripción</th> 
                        <th>Cod. Estado</th>  
		        		<th>Estado</th>	
                        <th>Cod. TipoPost</th>        	 
		        		<th>Tipo Post</th>
                        <th>Cod. CatPost</th>           
                        <th>Categoria Post</th>
                        <th>idArte</th>  
		        		<th>Cod. Imagen</th>  
		        		<th>Imagen</th>		 
                        <th>PathImagen</th>	
                        <th>Cod. Material</th>        
		        		<th>Material</th>
                        <th>Alto</th>
		        		<th>Ancho</th>                        
                        <th>Cod. TipoArte</th>
                        <th>Tipo Arte</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Valor</th>
                        <th>UrlPDf</th>
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
            {name:'id_usuario',data:'id_usuario'},     
            {name:'nombreArtista',data:'nombreArtista'},
            { name:'email',data:'email'},
            {name:'telefono',data:'telefono'},
            { name:'imagen_artista',data:'imagen_artista'},            
            {name:'id_post',data:'id_post'},
            { name:'titulo',data:'titulo'},
            {name:'descripcion',data:'descripcion'},
            { name:'id_estado',data:'id_estado'},
            { name:'estado',data:'estado'},
            { name:'id_tipo_post',data:'id_tipo_post'},
            { name:'tipo_post',data:'tipo_post'},
            { name:'id_categoria_post',data:'id_categoria_post'},
            { name:'categoria_post',data:'categoria_post'},
            { name:'id_arte',data:'id_arte'},                 
            { name:'id_imagen',data:'id_imagen'},
            {
                "data":"imagen_post",
                "render": function(data,type,row,meta){
                    return '<img src="'+data+'" style = "width:150px;heigth:150;">';
                }
            },
            { name:'imagen_post',data:'imagen_post'},
            { name:'id_material',data:'id_material'},     
            { name:'material_art',data:'material_art'},
            { name:'alto_art',data:'alto_art'},   
            { name:'ancho_art',data:'ancho_art'},            
            { name:'id_etiqueta',data:'id_etiqueta'},          
            { name:'etiqueta_arte',data:'etiqueta_arte'},           
            { name:'fecha_ini',data:'fecha_ini'}, 
            { name:'fecha_fin',data:'fecha_fin'}, 
            { name:'valor_ini',data:'valor_ini'},
            { name:'urlPdf',data:'urlPdf'},
            {'defaultContent':"<button class='btn btn-primary' style='color:white;' id='btnEditarPost' > <i class='fas fa-edit' > </i> </button> "   }                 
        ],     
        columnDefs: [
            {'targets':[0],'visible':false,'searchable':false},       
            {'targets':[2],'visible':false,'searchable':false},
            {'targets':[3],'visible':false,'searchable':false},
            {'targets':[4],'visible':false,'searchable':false},
            {'targets':[5],'visible':false,'searchable':false},
            {'targets':[7],'visible':false,'searchable':false},
            {'targets':[8],'visible':false,'searchable':false}, 
            {'targets':[10],'visible':false,'searchable':false},
            {'targets':[12],'visible':false,'searchable':false},            
            {'targets':[13],'visible':false,'searchable':false},
            {'targets':[14],'visible':false,'searchable':false},
            {'targets':[15],'visible':false,'searchable':false},
            {'targets':[17],'visible':false,'searchable':false},
            {'targets':[18],'visible':false,'searchable':false},
            {'targets':[19],'visible':false,'searchable':false},
            {'targets':[20],'visible':false,'searchable':false},
            {'targets':[21],'visible':false,'searchable':false},
            {'targets':[22],'visible':false,'searchable':false},
            {'targets':[23],'visible':false,'searchable':false},
            {'targets':[24],'visible':false,'searchable':false},
            {'targets':[25],'visible':false,'searchable':false},
            {'targets':[27],'visible':false,'searchable':false},
             
        ],    
        order: [[2, "asc"]],     
        iDisplayLength:5
    });


    $("#tblPost tbody").on("click","#btnEditarPost",function(){
        var data = dataTablePost.row($(this).parents("tr")).data();
        
        $("#modalPost").modal('show');
        $("#Nombre").val(data.nombreArtista);
        $("#Correo").val(data.email);
        $("#Telefono").val(data.telefono);
        $("#imagenArtistaMostrar").attr('src',data.imagen_artista); 
        $('#imagenArtistaMostrar').prop('style', 'width:150px;heigth:150;margin:auto auto;');
        $("#idPost").val(data.id_post);
        $("#idArte").val(data.id_arte);
        $("#Estado").val(data.id_estado);
        $("#idImagen").val(data.id_imagen);
        $("#Titulo").val(data.titulo);
        $("#Descripcion").val(data.descripcion);        
        $("#TipoPost").val(data.id_tipo_post);   
        $("#CatPost").val(data.id_categoria_post);       
        $("#IdMaterial").val(data.id_material);
        $("#Alto").val(data.alto_art);
        $("#Ancho").val(data.ancho_art);
        $("#TipoArte").val(data.id_etiqueta);
        $("#FechaInicio").val(data.fecha_ini);
        $("#FechaFin").val(data.fecha_fin);
        $("#Valor").val(data.valor_ini);        
        $("#imagenMostrar").attr('src',data.imagen_post); 
        $('#imagenMostrar').prop('style', 'width:150px;heigth:150;margin:auto auto;');
        
        if( "{{session()->get('rol')}}" === "Cliente"){    
            $("#Opcion").val('5');
            $("#CatPost").val('16'); 
            bloquearCampos();
        }else if( "{{session()->get('rol')}}" === "Administrador"){    
            $("#Opcion").val('5');
            if(data.tipo_post ==='PROYECTO')
            {
                $("#linkPdf").attr('href',data.urlPdf);
            }
            
            if("{{session()->get('idUsuario')}}" === data.id_usuario){

            } else {
               bloquearCampos(); 
            }            
        }else{
            $("#Estado").prop('disabled',true);
            $("#Opcion").val('3');
            $("#CatPost").val('16'); 
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
                let envioImagen = axios.post('http://192.168.100.139:3000/api/v1.0/uploadImage',fd);	              
                envioImagen.then((data)=>{
                    console.log(data);
                }).catch((data)=>{
                    console.log(data);
                })
            }
            else{
                $("#PathImagen").val('');
            }

            if($("#PDF").val().length>0){

                const fd = new FormData();
                let file = document.getElementById("PDF").files[0];
                let fileName = document.getElementById("PDF").files[0].name;
                $("#PathPdf").val(fileName);
                fd.append('file',file, fileName);
                let envioImagen = axios.post('http://localhost:3000/api/v1.0/uploadFile',fd);	              
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

    $("#btnAgregarPost").on("click",function(){
         desbloquearCampos();
         limpiarFormulario();
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
        $("#Nombre").prop('disabled',true);
        $("#Correo").prop('disabled',true);
        $("#Telefono").prop('disabled',true);
        $("#Titulo").prop('disabled',true);
        $("#Descripcion").prop('disabled',true);        
        $("#TipoPost").prop('disabled',true);         
        $("#IdMaterial").prop('disabled',true);
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
        $("#IdMaterial").prop('disabled',false);
        $("#Alto").prop('disabled',false);
        $("#Ancho").prop('disabled',false);
        $("#TipoArte").prop('disabled',false);
        $("#FechaInicio").prop('disabled',false);
        $("#FechaFin").prop('disabled',false);
        $("#Valor").prop('disabled',false);        
        $("#imagen").prop('disabled',false); 
        $("#Estado").prop('disabled',false);
    }
    function limpiarFormulario() {
        document.getElementById("frmPost").reset();
    }
    
</script>

@endsection