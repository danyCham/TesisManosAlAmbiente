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
       if(session()->get('OK')== 'true'){
         $valida = new Utils();
         return $valida->validarAutorizacion("Usuarios","modules.seguridad.usuarios");
         }
         else{
             return view('login');
        }
   }

   public function indexperfil(){  
        $data = $this->consultarUsuario();
        session(['dataUsuario'=>$data]);
        return view("modules.seguridad.miperfil");       
  }
   
   //metodo para consultar los usuarios
   public function consultarUsuario(){
      try {       	
	    
         $res = $this->cliente->request('POST', $this->baseUrl.'autenticacion/registrarUsuario', [
             'json' =>  [
                    "p_Id_Usuario"=>session()->get('idUsuario'),                    
                    "p_Opcion"=> 10,
              ]
          ]);
           
          $response =  json_encode(response()->json(json_decode(($res->getBody() ))));
          $array = json_decode($response,true);
          $data = $array['original']['respuesta'];
          return $data;
        } 
       catch (Exception $ex) {
           $logs = new Utils();
           $logs->escribirLog($ex->getMessage());
          return redirect()->route('auth.index')->withErrors(['errors'=>'Ocurrio un error inesperado, favor contactar con departamento de sistemas']);
       }
   }
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
          return array('data'=>$data);
        } 
       catch (Exception $ex) {
           $logs = new Utils();
           $logs->escribirLog($ex->getMessage());
          return redirect()->route('auth.index')->withErrors(['errors'=>'Ocurrio un error inesperado, favor contactar con departamento de sistemas']);
       }
   }

   //metodo para insetar o actualizar usuario
   public function mantenimientoUsuario(Request $request){
      $validatedData = $request->validate([
            'idUsuario' => 'required',
            'IdRol' => 'required',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'Sexo' => 'required',
            'FechaNacimiento' => 'required',             
            'Direccion' => 'required',
            'Cedula' => 'required',
            'Email' => 'required|email',
            'Celular' => 'required',            
            'IdImagen' => 'required',            
            'Estado' => 'required'
		    ]);

        try {       	
	    
	       $res = $this->cliente->request('POST', $this->baseUrl.'autenticacion/registrarUsuario', [
	        	'json' =>  [
	               "p_Id_Usuario"=>$request->input('idUsuario'),
						"p_Id_Usuario_rm"=> session()->get('idUsuario'),
						"p_Nombre"=>$request->input('Nombres'),
						"p_Apellido"=>$request->input('Apellidos') ,
						"p_Email"=>$request->input('Email') ,
						"p_Cedula"=>$request->input('Cedula') ,
						"p_Sexo"=>$request->input('Sexo') ,
						"p_Direccion"=>$request->input('Direccion') ,
						"p_Telefono"=>$request->input('Celular') ,
						"p_FechaNac"=>$request->input('FechaNacimiento') ,
						"p_Password"=>$request->input('Clave') ,
						"p_Id_rol"=> $request->input('IdRol'),
						"p_Url"=> $request->input('PathImagen') == "" ? '' : $this->baseUrl.'public/images/'.$request->input('PathImagen'),
						"p_Id_imagen" => $request->input('IdImagen'),
						"p_Clave_temp"=>"",
						"p_Estado_clave"=>3,
						"p_Estado_user"=>$request->input('EstadoUsuario'),
						"p_Opcion"=> intval($request->input('idUsuario')) == 0 ? 1 : 9
	            ]
	        ]);
            
	        $response =  json_encode(response()->json(json_decode(($res->getBody() ))));
	        $array = json_decode($response,true);
	      
           return array('data'=>$array['original']['respuesta']);

        } catch (Exception $ex) {
         $logs = new Utils();
         $logs->escribirLog($ex->getMessage());
         return array('CodigoError'=>'0001','MensajeError'=> 'Ocurrio un error inesperado contactar con sistemas!!');
     }
   }
}