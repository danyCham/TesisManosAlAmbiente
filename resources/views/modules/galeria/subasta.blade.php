@extends('../../../layouts.main')
@section('content_route')
     <div class="col-sm-6">
       <i> <h1 class="m-0 text-dark">Subasta</h1> </i>
     </div> 
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">           
          <li class="breadcrumb-item active">Galería->Subasta</li>
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
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modalSubasta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title"  id="exampleModalLabel">.:Subasta:.</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form id="frmSubasta" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                             @csrf
                             <div class="row">
                                <div class="form-row col-lg-12 col-sm-12 ml-auto" style="display: none;">
                                    <label>idPost:</label>
                                    <input type="text" name="idSubasta" id="idSubasta" value="0" >                                     
                                </div>
                                <div class="form-row col-lg-12 col-sm-12 ml-auto" style="display:{{session()->get('rol')=='Cliente'?'inline':'none'}}">
                                    <h4 class="modal-title">Datos del artista</h4>                                  
                                </div>

                                <div class="form-row col-lg-12 col-sm-12" style="display:{{session()->get('rol')=='Cliente'?'inline':'none'}}">
                                     <img src="" id="imagenArtistaMostrar" style = "width:150px;heigth:150;margin:auto auto;"> 
                                </div>

                                <div class="form-row col-lg-4 col-sm-12" style="display: none;">
                                    <label>id:</label>
                                    <input type="text" id="IdCliente" name="IdCliente" value = "0" class="form-control">                    
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

                                <div class="form-row col-lg-12 col-sm-12"style="display:{{session()->get('rol')=='Cliente'?'inline':'none'}}">
                                    <h4 class="modal-title">Datos del post</h4>                     
                                </div>


                                <div class="form-row col-lg-12 col-sm-12">
                                     <img src="" id="imagenMostrar" style = "width:150px;heigth:150;">
                                      <input type="text" hidden name="Opcion" id="Opcion" value="3" class="form-control">                            
                                </div> 

                                <div class="form-row col-lg-4 col-sm-12">
                                    <label>Título:</label>
                                    <input type="text" id="Titulo" name="Titulo" class="form-control">                       
                                </div>                                

                                <div class="form-row col-lg-4 col-sm-12">
                                    <label>Tipo Post:</label>
                                    <input type="text" id="TipoPost" name="TipoPost" class="form-control">                               
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
                                    <input type="text" id="TipoArte" name="TipoArte" class="form-control">                                     
                                </div>
                                 <div class="form-row col-lg-4 col-sm-12">
                                    <label>Fecha Inicio :</label>
                                    <input type="date" id="FechaInicio" name="FechaInicio" class="form-control">                                                     
                                </div>

                                 <div class="form-row col-lg-4 col-sm-12">
                                    <label>Fecha Fin :</label>
                                    <input type="date" id="FechaFin" name="FechaFin" class="form-control">                                                   
                                </div>
                                <div class="form-row col-lg-4 col-sm-12" style="display:{{session()->get('rol') =='Administrador'?'inline':'none'}}">
                                    <label>Estado:</label>
                                    <select  id="Estado" name="Estado" class="form-control">
                                        <option value="">Seleccione</option>
                                         @foreach($datoCatalogo as $item)
                                             @if($item['nombre'] == 'ESTADO_POST')
                                            <option value="{{$item['id_catalogoDet']}}">{{$item['detalle']}}
                                            </option>
                                            @endif
                                         @endforeach                                       
                                    </select>                                    
                                </div>
                                <div class="form-row col-lg-4 col-sm-12">
                                    <label>Valor de subasta de inicio :</label>
                                    <input type="number" id="ValorInicio" name="ValorInicio" class="form-control">                                                     
                                </div>

                                 <div class="form-row col-lg-4 col-sm-12">
                                    <label>Ultimo valor ofertado :</label>
                                    <input type="number" id="ValorFin" name="ValorFin" class="form-control">                                                   
                                </div>

                                <div class="form-row col-lg-4 col-sm-12" style="display:{{session()->get('rol')=='Cliente'?'inline':'none'}}">
                                    <label>Oferta Subasta :</label>
                                    <input type="number" id="oferta" name="oferta" value ="0" class="form-control">
                                </div>
                                <div class="form-row col-lg-8 col-sm-12">
                                    <label>Descripción:</label>
                                    <textarea class="form-control" rows="5" id="Descripcion" name="Descripcion" maxlength="250" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></textarea>                                                   
                                </div> 
                               </div>
                             </form>
                          </div>
                          <div class="modal-footer">
                             <button type="button" style="display:{{session()->get('rol') =='Cliente'?'inline':'none'}}" id="btnSaveOferta" class="btn btn-primary">Ofertar <i class="fas fa-money-bill-wave"></i> </button>
                             <button type="button" style="display:{{session()->get('rol') =='Administrador'?'inline':'none'}}" id="btnSaveSubasta" class="btn btn-primary">Guardar <i class="fas fa-save"></i> </button>
                             <button type="button" id="btnCloseSubasta" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-close"></i> </button>
                          </div>
                        </div>
                      </div>
                    </div>                    
                </div>
                <div>                    
                    <table id="tblSubasta" class="table table-responsive table-hover table-striped" width="98%">
                    <thead style="background-color: #0d967d;color:white;">   
                        <th>Cod. artista</th>
                        <th>Nombre artista</th>
                        <th>email</th>
                        <th>telefono</th>
                        <th>foto Artista</th> 
                        <th>Cod. Subasta</th>   
                        <th>Título</th>             
                        <th>Descripción</th>
                        <th>Cod. Estado</th>   
                        <th>Estado</th>          
                        <th>Tipo Post</th>  
                        <th>Cod. Imagen</th>  
                        <th>Imagen</th>      
                        <th>PathImagen</th>             
                        <th>Material</th>
                        <th>Alto</th>
                        <th>Ancho</th>
                        <th>Tipo Arte</th>
                        <th>Valor Inicial</th>
                        <th>Valor Actual</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
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
   var dataTableSubasta = null;
   $(document).ready(function(){

    dataTableSubasta = $("#tblSubasta").DataTable({
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
            'url':'{{route("subasta.consultar")}}',
        },
        dom : 'Bfrtip',
        buttons: [],
        columns:[
            {name:'id_usuario',data:'id_usuario'},
            {name:'nombreArtista',data:'nombreArtista'},
            { name:'email',data:'email'},
            {name:'telefono',data:'telefono'},
            { name:'imagen_artista',data:'imagen_artista'},            
            {name:'id_subasta',data:'id_subasta'},
            { name:'titulo',data:'titulo'},
            {name:'descripcion',data:'descripcion'},
            { name:'id_estado',data:'id_estado'},
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
            { name:'categoria',data:'categoria'},
            { name:'cantidad_min',data:'cantidad_min'},
            { name:'cantidad_max',data:'cantidad_max'},           
            { name:'fecha_ini',data:'fecha_ini'}, 
            { name:'fecha_fin',data:'fecha_fin'}, 
            {'defaultContent':"<button class='btn btn-primary' style='color:white;' id='btnEditarSubasta' > <i class='fas fa-edit' > </i> </button>  <button class='btn btn-danger' style='display:{{session()->get('rol') =='Administrador'?'inline':'none'}};color:white;' id='btnEliminarSubasta' > <i class='fas fa-trash' > </i> </button> "   }                 
        ],     
        columnDefs: [
            {'targets':[0],'visible':false,'searchable':false},
            {'targets':[1],'visible':false,'searchable':false},       
            {'targets':[2],'visible':false,'searchable':false},
            {'targets':[3],'visible':false,'searchable':false},
            {'targets':[4],'visible':false,'searchable':false},
            {'targets':[5],'visible':false,'searchable':false},
            {'targets':[7],'visible':false,'searchable':false},
            {'targets':[8],'visible':false,'searchable':false},
            {'targets':[10],'visible':false,'searchable':false},
            {'targets':[11],'visible':false,'searchable':false},           
            {'targets':[13],'visible':false,'searchable':false},
            {'targets':[14],'visible':false,'searchable':false},
            {'targets':[15],'visible':false,'searchable':false},
            {'targets':[16],'visible':false,'searchable':false},
             
        ],    
        order: [[2, "asc"]],     
        iDisplayLength:5
    });

    $("#tblSubasta tbody").on("click","#btnEditarSubasta",function(){
        var data = dataTableSubasta.row($(this).parents("tr")).data();
        $("#modalSubasta").modal('show');
        $("#IdCliente").val(data.id_usuario);           
        $("#Nombre").val(data.nombreArtista);
        $("#Correo").val(data.email);
        $("#Telefono").val(data.telefono);
        $("#imagenArtistaMostrar").attr('src',data.imagen_artista); 
        $('#imagenArtistaMostrar').prop('style', 'width:100px;heigth:100;margin:auto auto;');
        $("#idSubasta").val(data.id_subasta);
        $("#idImagen").val(data.id_imagen);
        $("#Titulo").val(data.titulo);
        $("#Descripcion").val(data.descripcion);
        $("#TipoPost").val(data.tipo_post);         
        $("#MaterialUsado").val(data.material_art);
        $("#Alto").val(data.alto_art);
        $("#Ancho").val(data.ancho_art);        
        $("#TipoArte").val(data.categoria);
        $("#ValorInicio").val(data.cantidad_min);
        $("#ValorFin").val(data.cantidad_max);
        $("#FechaInicio").val(data.fecha_ini);
        $("#FechaFin").val(data.fecha_fin);                
        $("#imagenMostrar").attr('src',data.imagen_post); 
        $('#imagenMostrar').prop('style', 'width:100px;heigth:100;margin:auto auto;');
        $("#Estado").val(data.id_estado);

        if( "{{session()->get('rol')}}" === "Cliente"){    
            $("#Opcion").val('3');
            bloquearCampos();
        }else if( "{{session()->get('rol')}}" === "Administrador"){
            $("#Opcion").val('2');
            bloquearCampos();
        }else{
            $("#Estado").prop('disabled',true);
        }
    });

    $("#tblSubasta tbody").on("click","#btnEliminarSubasta",function(){
        var data = dataTableSubasta.row($(this).parents("tr")).data();
        $("#idSubasta").val(data.id_subasta);
        $("#ValorInicio").val(data.cantidad_min);
        $("#Estado").val('9');
        $("#Opcion").val('2');
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
             $("#btnSaveSubasta").click();
          }
        });
        
    });
     
     $("#btnCloseSubasta").on("click",function(){
         limpiarFormulario();
     });
     $("#btnSaveOferta").on("click",function(){
        $("#Opcion").val('3');
        $("#btnSaveSubasta").click();
     });

    $("#btnSaveSubasta").on("click",function(){         
        if($("#modoConsulta").val()==="S"){
            desbloquearCampos();
            $.ajax({
            type: 'POST', 
            url: '{{route("subasta.mantenimiento")}}',
            data: $('#frmSubasta').serialize(),
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
                        
                     dataTableSubasta.ajax.reload(); 
                     $("#btnCloseSubasta").click();
                    }
                    else
                    {
                        bloquearCampos();
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
                bloquearCampos();
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
    });

    function bloquearCampos(){
        $("#Nombre").prop('disabled',true);
        $("#Correo").prop('disabled',true);
        $("#Telefono").prop('disabled',true);
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
        $("#ValorInicio").prop('disabled',true);
        $("#ValorFin").prop('disabled',true);     
    }
    function desbloquearCampos(){
        $("#Nombre").prop('disabled',false);
        $("#Correo").prop('disabled',false);
        $("#Telefono").prop('disabled',false);
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
        $("#ValorInicio").prop('disabled',false);
        $("#ValorFin").prop('disabled',false);
    }
    function limpiarFormulario() {
        document.getElementById("frmSubasta").reset();
    }
    
</script>

@endsection
