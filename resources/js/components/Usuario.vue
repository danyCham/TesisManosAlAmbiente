<template>     
        <main class="main"> 
			<div class="card">
				<div class="card-header">
			    <label style="float:left">Cantidad actual de usuarios:    </label> <p v-text="this.totalRecords"> </p>
			</div>  	
	   	    <div class="card-body">
	   	    	<div class="form-group text-center">                       
					<button  id="btnAgregarUser" type="button"  data-toggle="modal" data-target="#modalUsuarios"  class="btn btn-info" @click="modalShow=true">
					  Agregar <i class="fas fa-plus"></i>
					</button>					
					<!-- Modal -->
					<div class="modal fade" v-if="modalShow" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-xl">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title text-center"  id="exampleModalLabel">.:Usuarios:.</h4>
					      </div>
					      <div class="modal-body">					      	
					      	<form id="frmUsuario" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">					         
					            <div class="row">							  
					         	<div class="form-row col-lg-6 col-sm-12 ml-auto" style="display: none;">
					         		<label>IdUsuario:</label>
					         		<input type="text"  v-model="idUsuario"  name="idUsuario" id="idUsuario">
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Rol:</label>
					         		<select id="IdRol" name="IdRol" v-model="IdRol" class="form-control">
					         			 <option value="1">Administrador</option>
										 <option value="2">Artista</option>
										 <option value="3">Cliente</option>
					         		</select>
					         	</div>					         	 
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Nombres:</label>
					         		<input type="text" name="Nombres"  v-model="Nombres"   id="Nombres" class="form-control">
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Apellidos:</label>
					         		<input type="text" name="Apellidos" v-model="Apellidos"   id="Apellidos" class="form-control">
					         	</div>
								 <div class="form-row col-lg-3 col-sm-12">
					         		<label>Fecha Nacimiento:</label>
					         		<input type="date" id="FechaNacimiento" class="form-control" name="FechaNacimiento" v-model="FechaNacimiento">
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
					         		<input type="password"  v-model="Clave" name="Clave" id="Clave"   class="form-control">
					         	</div>		
								<div class="form-row col-lg-3 col-sm-12">
					         		<label>Cédula <i class="fas fa-card"></i> :  </label>
					         		<input type="number"  v-model="Cedula"  pattern="Debe ingresar los 10 diginos del numero de cedula" name="Cedula" id="Cedula" max="10" class="form-control">
					         	</div>			         	
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Celular <i class="fas fa-mobile-alt"></i> :  </label>
					         		<input type="number"  v-model="Telefono"  pattern="Debe ingresar los 10 diginos del numero de celular" name="Celular" id="Celular" max="10" class="form-control">
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Correo Electrónico <i class="far fa-envelope"></i> :</label>
					         		<input type="Email" v-model="Email" name="Email" id="Email" class="form-control">
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Dirección <i class="fas fa-directions"></i> :</label>
					         		<input type="text" v-model="Direccion"   name="Direccion" id="Direccion" class="form-control">
					         	</div>					         	 
					         	<div class="form-row col-lg-3 col-sm-12 ">
					         		<label>Estado:</label>
					         		<select class="form-control" v-model="EstadoUsuario"  name="Estado" id="Estado">
					         			<option value="1">Activo</option>
					         			<option value="2">Inactivo</option>
					         		</select>
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Imagen Perfil <i class="far fa-file-image"></i> :</label> <br>
					         		<input class="form-control"  type="file" @change="readURLRed" name="imagen" id="imagen"  accept="image/*" >					         		
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-2">
									<input type="text" hidden v-model="IdImagen">					         	             		 
					         		<img :src="imagen" id="imagenMostrar" width="100px">					        
					         	</div>
					           </div>
					         </form>
					      </div>
					      <div class="modal-footer">					       
					         <button type="button" id="btnSaveUser" @click="registrarActualizarUsuario()" class="btn btn-primary">Guardar <i class="fas fa-save"></i> </button>
					         <button type="button"  id="btnCloseUser" data-dismiss="modal" class="btn btn-danger" @click="modalShow=false">Cerrar <i class="fas fa-close"></i> </button>
					      </div>
					    </div>
					  </div>
					</div>
					 <div class="input-group text-center col-8">
						<br>
						<select class="form-control col-md-6" v-model="criterio" @change.capture="listarUsuarios(0,0,8)">
							<option value="8">Mostrar Todos</option>
							<option value="6">Cédula</option>
							<option value="7">Rol</option>								
						</select>
						<input type="text" v-model="buscar" @keyup.enter="listarUsuarios(buscar,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
				 		<button type="submit" @click="listarUsuarios(buscar,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>										   				      
				     </div>  
	   	    	</div>			                 
	   	    	 <table id="tblUsers"  class="table table-responsive table-hover table-striped" width="98%">				  
					<paginate ref="paginator" name = "arrayUsuarios" :list = "arrayUsuarios" :per = "4">
						<thead style="background-color: #0d967d;color:white;">
							<th>Cod. Usuario</th>
							<th>Email</th>
							<th>Cédula</th>
							<th>Rol</th>
							<th>Apellidos</th>
							<th>Nombres</th>					
							<th style="display:none;">Sexo</th>
							<th style="display:none;">telefono</th>
							<th style="display:none;">fecha_nacimiento</th>
							<th style="display:none;">direccion</th>
							<th style="display:none;">IdImagen</th>
							<th>Foto Perfil</th>
							<th style="display:none;">estado_clave</th>
							<th>Estado Usuario</th>	        		  
							<th>Acción</th>        		
						</thead>			  
					 
				        <tbody>
							<tr v-for="usuario in paginated('arrayUsuarios')" :key="usuario.id_usuario">
							<td v-text="usuario.id_usuario"> </td>
							<td v-text="usuario.email"></td>
							<td v-text="usuario.cedula"></td>
							<td v-text="usuario.Rol"></td>
							<td v-text="usuario.apellido"></td>
							<td v-text="usuario.nombre"></td>
							<td style="display:none;" v-text="usuario.sexo"></td>
							<td style="display:none;"  v-text="usuario.telefono"></td>						  
							<td style="display:none;"  v-text="usuario.fecha_nacimiento"></td>
							<td  style="display:none;" v-text="usuario.direccion"></td>
							<td  style="display:none;" v-text="usuario.id_imagen"></td>
							<td>								
								<img :src="usuario.PathImagen" alt="Image" width="50px" height="50px">
							</td>
							<td style="display:none;" v-text="usuario.estado_clave"></td>
							<td v-text="usuario.estado_usuario"></td>							
							<td>
								<button id="btnEditar" data-toggle="modal" data-target="#modalUsuarios"  @click.capture="llenarDatos(usuario)" class="btn btn-primary"> <i class="fas fa-edit"></i> </button>
							</td>

							</tr>
					    </tbody>
				    </paginate>					 
				      <paginate-links
							for="arrayUsuarios"
							:show-step-links="true"
							:simple="{
								prev: 'Anterior',
								next: 'Siguiente' 
							}"
					    > </paginate-links>					  
	              </table>
	   	       </div>
			</div>			
   </main>
</template>
<script>
export default {
	 data: function(){
		 return{
			paginate:['arrayUsuarios'],
			totalRecords:'',
			buscar:'0',
			criterio:'8',
			arrayUsuarios:[],
			idUsuario:0,
			Nombres:'',
			Apellidos:'',
			Email:'',
			Cedula:'',
			Sexo:'F',
			Direccion:'',
			Telefono:'',
			FechaNacimiento:'',
			Clave:'',
			IdRol:1,
			IdImagen:0,
			PathImagen:'',
			imagen:null,
			file:null,
			EstadoUsuario:'A',
			modalShow:false,
		 }		 
	 },
	 methods:{
		 listarUsuarios(rol,cedula,opcion){
			 let consulta = axios.get('/seguridad/usuarios/consulta/'+rol+'/'+cedula+'/'+opcion);
			 consulta.then((data)=>{
				 this.arrayUsuarios = data.data;
				 this.totalRecords = data.data.length;
				 
			 }).catch((data)=>{
				 console.log(data);
			 });
		 },
         registrarActualizarUsuario(){
			 if(this.validarCampos()){
					var data = {
					"IdUsuario" : this.idUsuario,
					'IdRol' : this.IdRol,
					'Nombres' : this.Nombres,
					'Apellidos' : this.Apellidos,
					'Sexo' : this.Sexo,
					'FechaNacimiento' : this.FechaNacimiento,				 
					'Direccion' : this.Direccion,
					'Cedula' : this.Cedula,
					'Correo' : this.Email,
					'Telefono' : this.Telefono,
					'Clave' : this.Clave,
					'IdImagen' : this.IdImagen,
					'ImagenPerfil' : this.PathImagen,
					'Estado' : this.EstadoUsuario
				};
				
				if(this.PathImagen !== ''){
					const fd = new FormData();				 
					fd.append('image',this.file, this.PathImagen);						 
					axios.post('http://192.168.100.139:3000/api/v1.0/uploadImage',fd)			        
					.then((data)=>{
						console.log(data);
					}).catch((data)=>{
						console.log(data);
					});
				}
				
				let registroUsuario = axios.post("/seguridad/usuarios/mantenimiento/",data);
				registroUsuario.then((data)=>{
				 
					
					if(data.data[0].CodigoError ==="0000"){
                        Swal.fire({
						position: 'top-center',
						icon: 'success',
						title: 'Notificación',
						text: data.data[0].MensajeError ,
						showConfirmButton: false,
						timer: 15000
					  });	
					 
					  this.listarUsuarios('0','0',8);	
					  this.limpiarPantalla();
					 
					} 
					else{
                        Swal.fire({
							position: 'top-center',
							icon: 'warning',
							title: 'Notificación',
							text: data.data[0].MensajeError ,
							showConfirmButton: false,
							timer: 15000
					   });		
					}					
				}).catch((error)=>{
					console.log(error);
					Swal.fire({
						position: 'top-center',
						icon: 'error',
						title: 'Notificación',
						text: 'Error inesperado contactar con sistemas!!' ,
						showConfirmButton: false,
						timer: 15000
					  });		
				})
			 }
			 else{
				Swal.fire({
					position: 'top-center',
					icon: 'warning',
					title: 'Notificación',
					text: 'Asegurese de llenar todos los campos!!' ,
					showConfirmButton: false,
					timer: 15000
				});				    	 
			 }			 
		 },
		 readURLRed(e) {
			const image = e.target.files[0];
			this.file = e.target.files[0];
			this.PathImagen = e.target.files[0].name;			 
                const reader = new FileReader();
                reader.readAsDataURL(image);
                reader.onload = e =>{
                    this.imagen = e.target.result;
                     
            };
		},
		llenarDatos(usuario=[]){
			  this.modalShow=true
              this.idUsuario = usuario['id_usuario'] 
              this.IdRol = usuario['id_rol'] 
			  this.Nombres = usuario['nombre'] 
			  this.Apellidos = usuario['apellido'] 
			  this.Sexo = usuario['sexo'] 
			  this.FechaNacimiento = usuario['fecha_nacimiento'] 		 
			  this.Direccion = usuario['direccion'] 
			  this.Cedula = usuario['cedula'] 
			  this.Email = usuario['email'] 
			  this.Telefono = usuario['telefono']			  
			  this.IdImagen = usuario['id_imagen'] 
			  this.imagen = usuario['PathImagen'] 
			  this.EstadoUsuario =  usuario['estado_usuario'] === 'ACTIVO' ? '1' :'2'
		},
		limpiarPantalla(){
			  //this.modalShow=false
			  this.idUsuario = 0
              this.IdRol = 1
			  this.Nombres = ''
			  this.Apellidos = ''
			  this.Sexo = 'F'
			  this.FechaNacimiento = ''	 
			  this.Direccion = ''
			  this.Cedula = ''
			  this.Email = ''
			  this.Telefono = ''	  
			  this.IdImagen = 0
			  this.imagen = ''
			  this.EstadoUsuario =  'A' 
			  this.file = null
			  this.PathImagen = ''
			  this.imagen = null
			  
	 	},
	 	validarCampos(){
			if(  
				this.Nombres !== '' &&
				this.Apellidos !== '' &&				 
				this.FechaNacimiento !== ''	 &&
				this.Direccion !== ''	 &&
				this.Cedula !== ''	 &&
				this.Email !== ''	 &&
				this.Telefono !== '' &&
				this.FechaNacimiento !=='' ){
				  return true;
			  }
			
			return false;
		}
	 },
	 mounted(){
		 this.listarUsuarios(this.buscar,this.buscar,this.criterio);
		 this.buscar = '';
	 }
}
 
</script>
<style>
  .paginate-links{
    width:100%;
    list-style: none;
    text-align: center;
}
.paginate-links li {
    display: inline;
    background-color:#3ad9e4;
    color:black;
    padding:0.5rem;
    margin-left:0.3rem;
    margin-right: 0.3rem;
    cursor:pointer;
    border-radius: 3px;
}
.paginate-result{
    width: 100%;
    text-align:center;
    margin-bottom: 1rem;
}
</style>