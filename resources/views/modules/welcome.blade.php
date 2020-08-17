@extends('layouts.main')
@section('content_route')
     <div class="col-sm-6">
        <h1 class="m-0 text-dark">Principal</h1>
     </div> 
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Bienvenido</a></li>
          <li class="breadcrumb-item active">Inicio</li>

        </ol>
      </div> 
@endsection
@section('content')
   <div class="container">
       <div class="box">
           <div class="modal-body text-center">
                <h2> <img src="{{ asset('images/logo-1.png') }}"  width="40%"> </h2>                   
           </div>
       </div>
   </div>
  
@endsection