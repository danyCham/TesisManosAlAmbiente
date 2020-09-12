@extends('../../../layouts.main')
@section('content_route')
     <div class="col-sm-6">
       <i> <h1 class="m-0 text-dark">Materiales de reciclaje</h1> </i>
     </div> 
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">           
          <li class="breadcrumb-item active">Donaciones->material</li>
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
          <button  id="btnAgregarMaterial" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalMaterial">
            Agregar <i class="fas fa-plus"></i>
          </button>
                    
          <!-- Modal -->
          <div class="modal fade" id="modalMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title text-center"  id="exampleModalLabel">.:Materiales:.</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="frmMaterial" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                    <div class="form-row col-lg-4 col-sm-12" style="display: none;">
                      <label>idMaterial:</label>
                      <input type="text" name="idMaterial" id="idMaterial">                       
                    </div>
                    <div class="form-row col-lg-4 col-sm-12">
                      <label>Nombre:</label>
                      <input type="text" id="Nombre" name="Nombre" class="form-control">                 
                    </div>
                    <div class="form-row col-lg-4 col-sm-12">
                      <label>Medida de peso:</label>
                      <input type="text" id="medida_peso" name="medida_peso" class="form-control">
                    </div>
                    <div class="form-row col-lg-4 col-sm-12">
                      <label>Precio por medida:</label>
                      <input type="text" id="precio" name="precio" class="form-control">
                    </div>
                    <div class="form-row col-lg-4 col-sm-12">
                      <label>Estado:</label>
                      <select name="estado" id="estado" class="form-control">
                          <option value="">Seleccione</option>
                          @foreach($datoCatalogo as $item)
                           @if($item['nombre'] == 'ESTADO_MATERIAL') 
                          <option value="{{$item['id_catalogoDet']}}">{{$item['detalle']}}
                          </option>
                          @endif
                          @endforeach
                      </select>
                    </div>
                    <div class="form-row col-lg-4 col-sm-12">
                      <label>Imagen:</label>
                        <input class="form-control" type="file" @change="imagen = e.target.file[0]" name="imagen" id="imagen"  accept="image/*" >
                        <img src="" id="imagenMostrar">    
                        <input type="text" hidden name="PathImagen" id="PathImagen" class="form-control">    
                        <input type="text" hidden name="idImagen" id="idImagen" value="0" class="form-control"><input type="text" hidden name="Opcion" id="Opcion" value="1" class="form-control">
                    </div>
                   </form>
                </div>
                <div class="modal-footer">                 
                   <button type="button" id="btnSaveMaterial" class="btn btn-primary">Guardar <i class="fas fa-save"></i> </button>
                   <button type="button" id="btnCloseMaterial" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-close"></i> </button>
                </div>
              </div>
            </div>
          </div>                    
            </div>
              <div>                    
                <table id="tblMaterial" class="table table-responsive table-hover table-striped" width="98%">
                <thead style="background-color: #0d967d;color:white;">             
                <th>Cod. Material</th>  
                        <th>Nombre</th>           
                        <th>Medida de Peso</th>   
                        <th>Precio</th>    
                <th>Cod. Imagen</th> 
                        <th>Imagen</th>
                <th>PathImagen</th>
                        <th>estado</th>
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
   var dataTableMaterial = null;
   $(document).ready(function(){

    dataTableMaterial = $("#tblMaterial").DataTable({
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
            'url':'{{route("material.consultar")}}',
        },
        dom : 'Bfrtip',
        buttons: [],
        columns:[
            {name:'id_material',data:'id_material'},
            { name:'nombre',data:'nombre'},
            { name:'medida_peso',data:'medida_peso'},
            { name:'precio',data:'precio'},                
            {name:'id_imagen',data:'id_imagen'},
            {
                "data":"imagen_material",
                "render": function(data,type,row,meta){
                    return '<img src="'+data+'" style = "width:150px;heigth:150;">';
                }
            },
            {name:'imagen_material',data:'imagen_material'},
            { name:'estado',data:'estado'},
            {'defaultContent':"<button class='btn btn-primary' style='color:white;' id='btnEditarMaterial' > <i class='fas fa-edit' > </i> </button> "   }                 
        ],     
        columnDefs: [
            {'targets':[0],'visible':false,'searchable':false},
            {'targets':[4],'visible':false,'searchable':false},
            {'targets':[6],'visible':false,'searchable':false},
             
        ],    
        order: [[2, "asc"]],     
        iDisplayLength:5
    });

    $("#tblMaterial tbody").on("click","#btnEditarMaterial",function(){
        var data = dataTableMaterial.row($(this).parents("tr")).data();
        $("#modalMaterial").modal('show');
        $("#idMaterial").val(data.id_material);
        $("#Nombre").val(data.nombre);
        $("#medida_peso").val(data.medida_peso);
        $("#precio").val(data.p_precio);
        $("#id_imagen").val(data.p_id_imagen);       
        $("#imagenMostrar").attr('src',data.imagen_material); 
        $('#imagenMostrar').prop('style', 'width:450px;heigth:450;margin:auto auto;');
        $("#estado").val(data.estado);
        $("#Opcion").val('2');
    });

    $("#btnSaveMaterial").on("click",function(){         
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
                $.ajax({
                type: 'POST', 
                url: '{{route("material.mantenimiento")}}',
                data: $('#frmMaterial').serialize(),
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
                            
                        dataTableMaterial.ajax.reload(); 
                        $("#btnCloseMaterial").click();
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
</script>

@endsection