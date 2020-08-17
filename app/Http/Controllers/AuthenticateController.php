<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use App\Utils;
use Exception; 

class AuthenticateController extends Controller {
   
   //variable interna para la instancia del cliente para consumir api rest
   protected $cliente;
   //variable interna para obtener la url del api rest
   protected $baseUrl;

   //método constructor de lca clase 
   public function __construct(){
      $this->baseUrl = env('API_ENDPOINT');
      $this->cliente = new Client();
   }

   //método para retornar la vista del login
   public function index(){
      return view('login');
   }

   public function destroy(){
   	 session()->flush();
   	 return redirect()->route('home.index');
   }

   //metoodo para redirigir al inicio de sesión del sistema
   public function welcome(){
   	  if(session()->get('OK')=="true"){
   	  	return view('modules.welcome');
   	  }
   	  else{
   	  	return redirect()->route('auth.index')->withErrors(['errors' => 'Debe iniciar sesión para acceder al sistema']);
   	  }
   }
   
   //método que irá al api rest y validará las credenciales del usuario para posteriormente darle acceso al sistema
   public function validateUser(Request $request){
       
	   $validatedData = $request->validate([
		        'Email' => 'required|email',
		        'Clave' => 'required|min:8',
		    ]);

        try {       	
	    
	       $res = $this->cliente->request('POST', $this->baseUrl.'autenticacion', [
	        	'json' =>  [
	                'p_Correo' => $request->input('Email') ,
	                'p_Clave' => $request->input('Clave'),
	                'p_Usuario' => 0,		                 
	                'p_Opcion' => 1 
	            ]
	        ]);
            
	        $response =  json_encode(response()->json(json_decode(($res->getBody() ))));
	        $array = json_decode($response,true);
	        //dd($array);
	        $codigoError = $array['original']['respuesta'][0]['CodigoError'];
	        $mensajeError = $array['original']['respuesta'][0]['MensajeError'];
	     	if($codigoError != "0000"){
	     		return redirect()->route('auth.index')->withErrors(['errors'=>$mensajeError]);
	     	}
	     	else
	     	{
	     		$nombreUsuario = $array['original']['Usuario'][0]['Nombre'];
	     		$rutaImagenPerfil = $array['original']['Usuario'][0]['PathImagen'];
	     		$idUsuario = $array['original']['Usuario'][0]['id_usuario'];
	     		$rol = $array['original']['Usuario'][0]['Rol'];
	            $token = $array['original']['Token'][0]['Token'];
	            $reset = $array['original']['Reset'][0]['Reset'];
	            $dataMenu = $array['original']['Menu'];
	            $dataSubMenu = $array['original']['SubMenu'];
	            
	            session(['Menu' => $dataMenu]);
	            session(['SubMenu' => $dataSubMenu]);
	     		session(['OK' => 'true']);
	     		session(['imagenPerfil' => $rutaImagenPerfil]);
	     		session(['nombre' => $nombreUsuario]);
	     		session(['idUsuario' => $idUsuario]);
	     		session(['rol' => $rol]);
	     		session(['token' => $token]);
	     		session(['reset' => $reset]);
	     		 
	     		return redirect()->route('auth.welcome');     		
	     	}
     	} 
     	catch (Exception $ex) {
            $logs = new Utils();
            $logs->escribirLog($ex->getMessage());
     		return redirect()->route('auth.index')->withErrors(['errors'=>'Ocurrio un error inesperado , favor contactar con departamento de sistemas']);
     	}
   
   }

   //método para redirigir a la vista de registro
   public function registrarseIndex(){
   	  return view('registrarse');
   }
   
   //método para registrarse como usuario común desde la pantalla principal
   public function registrarse(Request $request){
      $validatedData = $request->validate([
      	        'Nombres' => 'required',
      	        'Apellidos' => 'required',
      	        'Sexo' => 'required',
      	        'FechaNacimiento' => 'required',
      	        'Correo' => 'required',
      	        'Direccion' => 'required',
      	        'Cedula' => 'required',
		        'Correo' => 'required|email',
		        'Telefono' => 'required',
		        'Clave' => 'required|min:8',
		        'ImagenPerfil' =>'required'
		    ]);

        try {       	
	    
	       $res = $this->cliente->request('POST', $this->baseUrl.'autenticacion/registrarUsuario', [
	        	'json' =>  [
	                 	"p_Id_Usuario"=>0,
						"p_Id_Usuario_rm"=>1,
						"p_Nombre"=>$request->input('Nombres'),
						"p_Apellido"=>$request->input('Apellidos') ,
						"p_Email"=>$request->input('Correo') ,
						"p_Cedula"=>$request->input('Cedula') ,
						"p_Sexo"=>$request->input('Sexo') ,
						"p_Direccion"=>$request->input('Direccion') ,
						"p_Telefono"=>$request->input('Telefono') ,
						"p_FechaNac"=>$request->input('FechaNacimiento') ,
						"p_Password"=>$request->input('Clave') ,
						"p_Id_rol"=>3,
						"p_Url"=>  $this->baseUrl.'public/images/'.$request->input('ImagenPerfil') ,
						"p_Id_imagen"=>0,
						"p_Clave_temp"=>"",
						"p_Estado_clave"=>3,
						"p_Estado_user"=>1,
						"p_Opcion"=>1
	            ]
	        ]);
            
	        $response =  json_encode(response()->json(json_decode(($res->getBody() ))));
	        $array = json_decode($response,true);
	        //dd($array);
	        $codigoError = $array['original']['respuesta'][0]['CodigoError'];
	        $mensajeError = $array['original']['respuesta'][0]['MensajeError'];
	     	if($codigoError != "0000"){
	     		return redirect()->route('auth.registrarse')->withErrors(['errors'=>$mensajeError]);
	     	}
	     	else
	     	{
	     		 
	     		return redirect()->route('auth.registrarse')->withSuccess($mensajeError. ' '. 'puede acceder al sistema');     		
	     	}
     	} 
     	catch (Exception $ex) {
            $logs = new Utils();
            $logs->escribirLog($ex->getMessage());
     		return redirect()->route('auth.index')->withErrors(['errors'=>'Ocurrio un error inesperado , favor contactar con departamento de sistemas']);
     	}
   }
}
