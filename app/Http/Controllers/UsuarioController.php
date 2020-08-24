<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use App\Utils;
use Exception; 

class UsuarioController extends Controller
{
   //variable interna para la instancia del cliente para consumir api rest
   protected $cliente;
   //variable interna para obtener la url del api rest
   protected $baseUrl;

   //método constructor de lca clase 
   public function __construct(){
      $this->baseUrl = env('API_ENDPOINT');
      $this->cliente = new Client();
   }
  //método para retornar pantalla de usuarios
   public function index(){
       return view('modules.seguridad.usuarios');
   }
   
   //metodo para consultar los usuarios
   public function consultarUsuarios($rol,$cedula,$opcion){
      try {       	
	    
         $res = $this->cliente->request('POST', $this->baseUrl.'autenticacion/registrarUsuario', [
             'json' =>  [
                    "p_Url"=>$rol,
                    "p_Cedula" => $opcion == "7" ? '0' : $cedula,
                    "p_Opcion"=> $opcion
              ]
          ]);
           
          $response =  json_encode(response()->json(json_decode(($res->getBody() ))));
          $array = json_decode($response,true);
          $data = $array['original']['respuesta'];
          return response()->json($data);
        } 
       catch (Exception $ex) {
           $logs = new Utils();
           $logs->escribirLog($ex->getMessage());
          return redirect()->route('auth.index')->withErrors(['errors'=>'Ocurrio un error inesperado, favor contactar con departamento de sistemas']);
       }
   }

   //metodo para insetar o actualizar usuario
   public function mantenimientoUsuario($opcion,Request $request){
      $validatedData = $request->validate([
            'IdRol' => 'required',
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
            'IdImagen' => 'required',
            'ImagenPerfil' =>'required',
            'Estado' => 'required'
		    ]);

        try {       	
	    
	       $res = $this->cliente->request('POST', $this->baseUrl.'autenticacion/registrarUsuario', [
	        	'json' =>  [
	               "p_Id_Usuario"=>$request->input('Nombres'),
						"p_Id_Usuario_rm"=> session()->get('idUsuario'),
						"p_Nombre"=>$request->input('Nombres'),
						"p_Apellido"=>$request->input('Apellidos') ,
						"p_Email"=>$request->input('Correo') ,
						"p_Cedula"=>$request->input('Cedula') ,
						"p_Sexo"=>$request->input('Sexo') ,
						"p_Direccion"=>$request->input('Direccion') ,
						"p_Telefono"=>$request->input('Telefono') ,
						"p_FechaNac"=>$request->input('FechaNacimiento') ,
						"p_Password"=>$request->input('Clave') ,
						"p_Id_rol"=> $request->input('IdRol'),
						"p_Url"=>  $this->baseUrl.'public/images/'.$request->input('ImagenPerfil') ,
						"p_Id_imagen" => $request->input('IdImagen'),
						"p_Clave_temp"=>"",
						"p_Estado_clave"=>3,
						"p_Estado_user"=>$request->input('EstadoUsuario'),
						"p_Opcion"=>$opcion
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
     		return redirect()->route('auth.index')->withErrors(['errors'=>'Ocurrio un error inesperado, favor contactar con departamento de sistemas']);
     	}
   }
}