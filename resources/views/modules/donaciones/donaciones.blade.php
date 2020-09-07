@extends('../../../layouts.main')
@section('content_route')
     <div class="col-sm-6">
       <i> <h1 class="m-0 text-dark">Donacion</h1> </i>
     </div> 
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">           
          <li class="breadcrumb-item active">Donacion->Donaciones</li>
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
          <button  id="btnAgregarDonacion" style="display:{{session()->get('rol') !='Cliente'?'none':'compact'}}" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalDonacion">
            Agregar <i class="fas fa-plus"></i>
          </button>
                    
          <!-- Modal -->
          <div class="modal fade" id="modalDonacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title text-center"  id="exampleModalLabel">.:Materiales:.</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="frmDonacion" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                   @csrf
                       <div class="card">
                        <div class="card-head">
                            <h4 class="text-center">Registre sus donaciones</h4>
                        </div>
                        <div class="row card-body">
                            <div class="col-6" style="display: none;">
                                <div class="form-group" >
                                    <label>idPost:</label>
                                    <input type="text" name="idDonaciones" id="idDonaciones" value="-1" >
                                </div>
                            </div>
                            <div class="col-6" style="display: none;">
                                <div class="form-group" >
                                    <label>IdUsuario:</label>
                                    <input type="text" name="idCliente" id="idCliente" value="0" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" style="display: none;">
                                    <label>Cedula:</label>
                                    <input type="text" name="cedula" id="cedula" value="0" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Nombre del material</label>
                                    <select name="idMaterial" id="idMaterial" class="form-control">
                                        <option  value="">Seleccione</option>
                                        @foreach($datoMaterial as $value)
                                            <option value="{{$value['id_material']}}">{{$value['nombre']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="form-group">
                                    @foreach($datoMaterial as $value)
                                    <label for="">Medida de peso</label>
                                    <input value="{{$value['medida_peso']}}" id="medida" name = "medida" type="text" class="form-control" readonly>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Precio por medida de peso</label>
                                    <input value="{{$value['precio']}}" id="precio" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-row col-6">
                              <label>Imagen del material:</label>
                                <img src="{{$value['imagen_material']}}" id="imagenMaterial" style = "width:150px;heigth:150;">
                                <input type="text" hidden name="Opcion" id="Opcion" value="1" class="form-control">
                            </div>
                            
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Tipo de entrega</label>
                                    <select name="tipo_entrega" id="tipo_entrega" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($datoCatalogo as $item)
                                         @if($item['nombre'] == 'TIPO_ENTR') 
                                        <option value="{{$item['id_catalogoDet']}}">{{$item['detalle']}}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Estado</label>
                                    <select name="estado" id="estado" class="form-control">
                                        <option value="">Seleccione</option>                                        
                                         @if(session()->get('rol')=='Administrador')
                                             @foreach($datoCatalogo as $item)
                                                 @if($item['nombre'] == 'ESTADO_DONACION')
                                                <option value="{{$item['id_catalogoDet']}}">{{$item['detalle']}}
                                                </option>
                                                @endif
                                             @endforeach
                                         @else                                         
                                          <option value="19">PENDIENTE</option>
                                         @endif
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Cantidad en medida de peso</label>
                                    <input type="number" name="Cantidad" id="Cantidad" class="form-control">
                                </div>
                            </div>
                            <div class="col-3" style="display:{{session()->get('rol')=='Administrador'?'inline':'none'}}">
                                <div class="form-group">
                                    <label for="">Valor total</label>
                                    <input type="number" name="Valor" id="Valor" value= "0" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                   </form>
                </div>
                <div class="modal-footer">                 
                   <button type="button" id="btnSaveDonacion" class="btn btn-primary">Guardar <i class="fas fa-save"></i> </button>
                   <button type="button" id="btnCloseDonacion" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-close"></i> </button>
                </div>
              </div>
            </div>
          </div>                    
            </div>
              <div>                    
                <table id="tblDonacion" class="table table-responsive table-hover table-striped" width="98%">
                <thead style="background-color: #0d967d;color:white;">        
                <th>Cod. Donacion</th>
                <th>Cod. Usuario</th>  
                        <th>Nombre</th>           
                        <th>Tipo Entrega</th>   
                        <th>Estado</th>
                <th>Cod. Material</th> 
                        <th>Material</th>
                        <th>MedidaPeso</th>
                        <th>PrecioMedida</th>   
                <th>Cod. Imagen</th> 
                        <th>Imagen</th>
                <th>PathImagen</th>
                        <th>CantidadMedida</th>
                <th>FechaRegistra</th>
                <th>FechaEntrega</th>
                        <th>Valor</th>
                <th>Cedula</th>
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
   var dataTableDonacion = null;
   $(document).ready(function(){

    dataTableDonacion = $("#tblDonacion").DataTable({
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
            'url':'{{route("donacion.consultar")}}',
        },
        dom : 'Bfrtip',
        buttons: [],
        columns:[
            {name:'id_donaciones',data:'id_donaciones'},
            {name:'id_usuario',data:'id_usuario'},
            { name:'nombre',data:'nombre'},
            { name:'tipo_entrega',data:'tipo_entrega'},
            { name:'estado',data:'estado'}, 
            { name:'id_material',data:'id_material'}, 
            { name:'material',data:'material'}, 
            { name:'medida_peso',data:'medida_peso'},
            { name:'precio_medida',data:'precio_medida'}, 
            {name:'id_imagen',data:'id_imagen'},
            {
                "data":"imagen_material",
                "render": function(data,type,row,meta){
                    return '<img src="'+data+'" style = "width:150px;heigth:150;">';
                }
            },
            {name:'imagen_material',data:'imagen_material'},
            { name:'cantidad_registrada',data:'cantidad_registrada'},
            { name:'fecha_registra',data:'fecha_registra'},
            { name:'fecha_entrega',data:'fecha_entrega'},
            { name:'valor',data:'valor'},
            { name:'cedula',data:'cedula'},
            {'defaultContent':"<button class='btn btn-primary' style='color:white;' id='btnEditarDonacion' > <i class='fas fa-edit' > </i> </button> "   }                 
        ],     
        columnDefs: [
            {'targets':[0],'visible':false,'searchable':false},
            {'targets':[1],'visible':false,'searchable':false},
            {'targets':[5],'visible':false,'searchable':false},
            {'targets':[9],'visible':false,'searchable':false},
            {'targets':[11],'visible':false,'searchable':false},
            {'targets':[13],'visible':false,'searchable':false},
            {'targets':[14],'visible':false,'searchable':false},
            {'targets':[16],'visible':false,'searchable':false},
             
        ],    
        order: [[2, "asc"]],     
        iDisplayLength:5
    });

    $("#tblDonacion tbody").on("click","#btnEditarDonacion",function(){
        var data = dataTableDonacion.row($(this).parents("tr")).data();
        $("#modalDonacion").modal('show');
        $("#idDonaciones").val(data.id_donaciones);
        $("#idCliente").val(data.id_usuario);
        $("#idMaterial").val(data.id_material);
        $("#cedula").val(data.cedula);
        $("#tipo_entrega").val(data.tipo_entrega);
        $("#estado").val(data.estado);
        $("#Cantidad").val(data.cantidad_registrada);
        $("#Valor").val(data.valor);
        var opcion = "0";        
        if("{{session()->get('rol')}}" === "Administrador"){
            opcion = "5"
            
        } else{
            opcion = "1"
        }
        $("#Opcion").val(opcion);
    });

    $("#btnSaveDonacion").on("click",function(){         
        if($("#modoConsulta").val()==="S"){            
            $.ajax({
            type: 'POST', 
            url: '{{route("donacion.mantenimiento")}}',
            data: $('#frmDonacion').serialize(),
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
                        
                    dataTableDonacion.ajax.reload(); 
                    $("#btnCloseDonacion").click();
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
   });
</script>

@endsection