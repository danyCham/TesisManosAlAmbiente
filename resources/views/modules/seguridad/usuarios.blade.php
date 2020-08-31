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
            <template>
               <usuario></usuario>
            </template>   	 	 	    
         </div>   
    	</div>
   	  </div>
   </div>
  
@endsection
@section('scripts')
<script src="{{asset('js/app.js')}}"></script>
@endsection
 
 