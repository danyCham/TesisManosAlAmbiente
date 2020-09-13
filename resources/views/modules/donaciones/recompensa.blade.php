@extends('../../../layouts.main')
@section('content_route')
     <div class="col-sm-6">
       <i> <h1 class="m-0 text-dark">Recompensa</h1> </i>
     </div> 
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">           
          <li class="breadcrumb-item active">Donaciones->recompensa</li>
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
                    <div class="form-row col-lg-12 col-sm-12 ml-auto" style="display: none;">
                      <label>idMaterial:</label>
                      <input type="text" name="idMaterial" id="idMaterial" value="0" >                       
                    </div>
                    <div class="form-row col-lg-4 col-sm-12">
                      <label>Nombre:</label>
                      <input type="text" id="Nombre" name="Nombre" class="form-control">                 
                    </div>
                    <div class="form-row col-lg-8 col-sm-12">
                      <label>Medida de peso:</label>
                      <input type="text" id="medida_peso" name="medida_peso" class="form-control">
                    </div>
                    <div class="form-row col-lg-4 col-sm-12">
                      <label>Precio por medida:</label>
                      <input type="text" id="precio" name="precio" class="form-control">
                    </div>
                    <div class="form-row col-lg-4 col-sm-12">
                      <label>Estado:</label>
                      <input type="number" id="estado" name="estado" class="form-control">
                    </div>
                    <div class="form-row col-lg-12 col-sm-12">
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
                <table id="tblRecompensa" class="table table-responsive table-hover table-striped" width="98%">
                <thead style="background-color: #0d967d;color:white;">          
                <th>Fecha</th>  
                <th>Detalle</th>           
                <th>Valor Inicial</th>   
                <th>Subtotal</th>    
                <th>Total</th>    
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

    dataTableMaterial = $("#tblRecompensa").DataTable({
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
            'url':'{{route("recompensa.consultar")}}',
        },
        dom : 'Bfrtip',
        buttons: [],
        columns:[
            {name:'fecha',data:'fecha'},
            { name:'detalle',data:'detalle'},
            { name:'valor_ini',data:'valor_ini'},
            { name:'valor_fin',data:'valor_fin'},
            { name:'cantidad_total',data:'cantidad_total'}
        ],    
        order: [[2, "asc"]],     
        iDisplayLength:5
    });
  });
</script>

@endsection