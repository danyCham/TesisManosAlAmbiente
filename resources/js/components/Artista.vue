<template>     
        <main class="main"> 
			<div class="card">
				<div class="card-header">
			    <label style="float:left">Cantidad actual de post que posee el artista:    </label> <p v-text="this.totalRecords"> </p>
			</div>  	
	   	    <div class="card-body">
	   	    	<div class="form-group text-center">                       
					<button  id="btnAgregarUser" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUsuarios">
					  Agregar post <i class="fas fa-plus"></i>
					</button>					
					<!-- Modal -->
					<div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-xl">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title text-center"  id="exampleModalLabel">.:Post del artista:.</h4>
					      </div>
					      <div class="modal-body">					      	
					      	<form id="frmPost" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">					         
					            <div class="row">							  
					         	<div class="form-row col-lg-6 col-sm-12 ml-auto" style="display: none;">
					         		<label>IdPost:</label>
					         		<input type="text"  v-model="IdPost"  name="IdPost" id="IdPost">
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Titulo del post:</label>
					         		<input type="text" name="Titulo"  v-model="Titulo"   id="Titulo" class="form-control">
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Descripcion:</label>
					         		<input type="text" name="Descripcion" v-model="Descripcion"   id="Descripcion" class="form-control">
					         	</div>	
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Tipo Post:</label>
					         		<select id="TipoPost" name="TipoPost" v-model="TipoPost" class="form-control">
					         			<option value="F">Femenino</option>
					         			<option value="M">Masculino</option>
					         		</select>
					         	</div>	
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Etiqueta Arte:</label>
					         		<select id="EtiquetaPost" name="EtiquetaPost" v-model="EtiquetaPost" class="form-control">
					         			 <option value="1">Subasta</option>
										 <option value="2">Exposicion</option>
					         		</select>
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Titulo del arte:</label>
					         		<input type="text" name="NombreArte"  v-model="NombreArte"   id="NombreArte" class="form-control">
					         	</div>			         	 
					         	<div class="form-row col-lg-3 col-sm-12 ">
					         		<label>Materiales que esta hecho el arte: <i class="fas fa-lock"></i> :</label>
					         		<input type="text"  v-model="MaterialPost" name="MaterialPost" id="MaterialPost"   class="form-control">
					         	</div>					         	
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Alto arte <i class="fas fa-mobile-alt"></i> :  </label>
					         		<input type="number"  v-model="AltoPost"  pattern="Debe ingresar los 10 diginos del numero de celular" name="AltoPost" id="AltoPost" max="10" class="form-control">
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Ancho arte <i class="far fa-envelope"></i> :</label>
					         		<input type="number" v-model="AnchoPost" name="AnchoPost" id="AnchoPost" class="form-control">
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Imagen del arte <i class="far fa-file-image"></i> :</label> <br>
					         		<input class="form-control"  type="file" @change="imagen = e.target.file[0]" name="imagen" id="imagen"  accept="image/*" >	
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-2">
									 <input type="text" hidden v.v-model="IdImagen">
					         	    <br>					         		 
					         		<img src="" id="imagenMostrar" width="100px">
					         		<input type="text" v-model="Imagen" hidden name="PathImagen" id="PathImagen" class="form-control">
					         	</div>				         						         	 
					         	<div class="form-row col-lg-3 col-sm-12 ">
					         		<label>Categoria del Post:</label>
					         		<select class="form-control" v-model="CategoriaPost"  name="CategoriaPost" id="CategoriaPost">
					         			<option value="1">Activo</option>
					         			<option value="2">Inactivo</option>
					         		</select>
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Fecha inicio de la subasta: <i class="fas fa-directions"></i> :</label>
					         		<input type="date" v-model="FechaIni"   name="FechaIni" id="FechaIni" class="form-control">
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Fecha fin de la subasta: <i class="fas fa-directions"></i> :</label>
					         		<input type="date" v-model="FechaFin"   name="FechaFin" id="FechaFin" class="form-control">
					         	</div>
					         	<div class="form-row col-lg-3 col-sm-12">
					         		<label>Precio de inicio de la subasta: <i class="fas fa-directions"></i> :</label>
					         		<input type="number" v-model="PrecioPost"   name="PrecioPost" id="PrecioPost" class="form-control">
					         	</div>
					           </div>
					         </form>
					      </div>
					      <div class="modal-footer">					       
					         <button type="button" id="btnSavePost" class="btn btn-primary">Guardar <i class="fas fa-save"></i> </button>
					         <button type="button" id="btnClosePsot" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fas fa-close"></i> </button>
					      </div>
					    </div>
					  </div>
					</div>
					 <div class="input-group text-center col-8">
						<br>
						<select class="form-control col-md-6" v-model="criterio" @change.capture="listarPost(0,0,8)">
							<option value="8">Mostrar Todos</option>
							<option value="16">Subastas</option>
							<option value="17">Exposiciones</option>								
						</select>
						<button type="submit" @click="listarUsuarios(buscar,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>										   				      
				     </div>  
	   	    	</div>
			                 
	   	    	 <table id="tblPost"  class="table table-responsive table-hover table-striped" width="98%">				  
					<paginate ref="paginator" name = "arrayPost" :list = "arrayPost" :per = "4">
						<thead style="background-color: #0d967d;color:white;">
							<th>Cod. Post</th>
							<th>Titulo</th>
							<th>Descripcion</th>
							<th>TipoPost</th>
							<th>CategoriaPost</th>
							<th>ImagenPost</th>					
							<th>MaterialPost</th>
							<th style="display:none;">AltoPost</th>
							<th style="display:none;">AnchoPost</th>
							<th style="display:none;">EtiquetaPost</th>
							<th style="display:none;">FechaIni</th>
							<th style="display:none;">FechaFin</th>
							<th style="display:none;">FechaFin</th>
							<th style="display:none;">ValorPost</th>	        		  
							<th>Acción</th>		
						</thead>			  
					 
				        <tbody>
							<tr v-for="post in paginated('arrayPost')" :key="post.idPost">
							<td v-text="post.idPost"></td>
							<td v-text="post.Titulo"></td>
							<td v-text="post.Descripcion"></td>
							<td v-text="post.TipoPost"></td>
							<td v-text="post.CategoriaPost"></td>
							<td>								
								<img :src="post.PathImagen" alt="Image" width="50px" height="50px">
							</td>
							<td v-text="post.MaterialPost"></td>
							<td style="display:none;" v-text="post.AltoPost"></td>
							<td style="display:none;"  v-text="post.AnchoPost"></td>						  
							<td style="display:none;"  v-text="post.EtiquetaPost"></td>
							<td style="display:none;" v-text="post.FechaIni"></td>
							<td style="display:none;" v-text="post.ValorPost"></td>
							<td>
								<button id="btnEditar" class="btn btn-primary"> <i class="fas fa-edit"></i> </button>
							</td>

							</tr>
					    </tbody>
				    </paginate>					 
				      <paginate-links
							for="arrayPost"
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
				paginate:['arrayPost'],
				totalRecords:'',
				buscar:'0',
				criterio:'8',
				arrayPost:[],
				idArtista:0,
				idPost:0,
				Titulo:'',
				Descripcion:'',
				TipoPost:'',
				CategoriaPost:'',
				ImagenPost:'',
				NombrePost:'',
				MaterialPost:'',
				AltoPost:0,
				AnchoPost:0,
				EtiquetaPost:0,
				FechaIni:'',
				FechaFin:'',
				ValorPost:'',
				errorPost:0,
                errorMostrarMsjPost:[],
                modal:0,
                tituloModal:'',
                criterio:[]
			 }		 
		 },
		 methods:{
			 listarPost(categoria,idUsuario,opcion){
				 let consulta = axios.get('/seguridad/artista/consultaPost/'+categoria+'/'+idUsuario+'/'+opcion);
				 consulta.then((data)=>{
					 this.arrayPost = data.data;
					 this.totalRecords = data.data.length;
					 
				 }).catch((data)=>{
					 console.log(data);
				 });
			 },
	         registrarPost(){
                if (this.validarPost()){
                    return;
                }
                
                let creaPost = axios.post('/seguridad/artista/consulta/'{
                    'Titulo': this.Titulo,
                    'Descripcion': this.Descripcion,
                    'TipoPost' : this.TipoPost,
                    'CategoriaPost' : this.CategoriaPost,
                    'ImagenPost' : this.ImagenPost,
                    'NombrePost' : this.NombrePost,
                    'MaterialPost' : this.MaterialPost,
                    'AltoPost' : this.AltoPost,
                    'AnchoPost': this.AnchoPost,
                    'EtiquetaPost': this.EtiquetaPost,
                    'FechaIni': this.FechaIni,
                    'FechaFin': this.FechaFin,
                    'ValorPost': this.ValorPost
                }).then(function (response) {
                    creaPost.cerrarModal();
                    creaPost.listarPost(this.buscar,this.buscar,this.criterio);
                }).catch(function (error) {
                    console.log(error);
                });
			 },
			 actualizarPost(){
                if (this.validarPost()){
                    return;
                }
                
                let updatePost = axios.post('/actualizar/artista/post/',{
                    'Titulo': this.Titulo,
                    'Descripcion': this.Descripcion,
                    'TipoPost' : this.TipoPost,
                    'CategoriaPost' : this.CategoriaPost,
                    'ImagenPost' : this.ImagenPost,
                    'MaterialPost' : this.MaterialPost,
                    'AltoPost' : this.AltoPost,
                    'AnchoPost': this.AnchoPost,
                    'EtiquetaPost': this.EtiquetaPost,
                    'FechaIni': this.FechaIni,
                    'FechaFin': this.FechaFin,
                    'ValorPost': this.ValorPost
                }).then(function (response) {
                    updatePost.cerrarModal();
                    updatePost.listarPost(this.buscar,this.buscar,this.criterio);
                }).catch(function (error) {
                    console.log(error);
                });
			 },
			 validarPost(){
                this.errorPost=0;
                this.errorMostrarMsjPost =[];

                if (!this.Titulo) this.errorMostrarMsjPost.push("El titulo del post no puede estar vacío.");
                if (!this.Descripcion) this.errorMostrarMsjPost.push("La descripcion del post no puede estar vacío.");
                if (this.TipoPost==0) this.errorMostrarMsjPost.push("Seleccione el tipo del post.");
                if (this.CategoriaPost==0) this.errorMostrarMsjPost.push("Seleccione la categoria del post.");
                if (!this.ImagenPost) this.errorMostrarMsjPost.push("La imagen del arte no puede estar vacio.");
                if (!this.MaterialPost) this.errorMostrarMsjPost.push("Tiene que ingresar por lo menos un material que utilizo para elaborar el arte.");
                if (this.AltoPost==0) this.errorMostrarMsjPost.push("Ingrese la altura del arte.");
                if (this.AnchoPost==0) this.errorMostrarMsjPost.push("Ingrese el ancho del arte.");
                if (this.CategoriaPost==17){
                	if (!this.FechaIni) this.errorMostrarMsjPost.push("La fecha de inicio de la subasta no puede estar vacio.");
                } 
                if (this.CategoriaPost==17){
                	if (!this.FechaFin) this.errorMostrarMsjPost.push("La fecha de fin de la subasta no puede estar vacio.");
                } 
                if (this.CategoriaPost==17){
                	if (this.ValorPost==0) this.errorMostrarMsjPost.push("El valor de inicio de la subasta no puede estar vacio.");
                } 
                if (this.errorMostrarMsjPost.length) this.errorPost = 1;

                return this.errorPersona;
            },
			 cerrarModal(){
                this.Titulo = '';
                this.Descripcion = '';
                this.TipoPost = 0;
                this.CategoriaPost = 0;
                this.ImagenPost = '';
                this.MaterialPost = '';
                this.AltoPost = 0;
                this.AnchoPost = 0;
                this.EtiquetaPost = 0;
                this.FechaIni = '';
                this.FechaFin = '';
                this.ValorPost = 0;
            },
		 },
		 mounted(){
			 this.listarPost(this.criterio,this.idArtista,6);
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