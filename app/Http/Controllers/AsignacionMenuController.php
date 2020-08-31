<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use App\Utils;
use Exception; 

class AsignacionMenuController extends Controller
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
        return $valida->validarAutorizacion("Asignación Menu Rol","modules.seguridad.asignacionmenu");
        }
        else{
            return view('login');
       }
   }

   //metodo de consulta para los menú , sub menu y menu rol
   public function consultar($opcion){
    try {       	
	    
        $res = $this->cliente->request('POST', $this->baseUrl.'asingacionmenu', [
            'json' =>  [                    
                   "p_Opcion"=> 4
            ],
            'headers' =>[
                'Authorization' => session()->get('token'),
                'Content-Type' => 'application/json; charset=utf-8'
            ]
         ]);
          
         $response =  json_encode(response()->json(json_decode(($res->getBody() ))));
         $array = json_decode($response,true);
         if($opcion == "1"){
            $data = $array['original']['Menu'];
            return array('data'=>$data);
         }
         if($opcion == "2"){
            $data = $array['original']['SubMenu'];
            return array('data'=>$data);
         }
         if($opcion == "3"){
            $data = $array['original']['MenuRol'];
            return array('data'=>$data);
         }
         
       } 
      catch (Exception $ex) {
          $logs = new Utils();
          $logs->escribirLog($ex->getMessage());
          $resp = array('CodigoError'=>'0001','MensajeError'=> 'Ocurrio un error inesperado contactar con sistemas!!');
          return array('data'=>$resp);
      }
   }

   public function mantenimiento(Request $request){
        try {
            $res = $this->cliente->request('POST', $this->baseUrl.'asingacionmenu', [
                'json' =>  [	
                    'p_Usuario' => session()->get('idUsuario'),	                
                    'p_Id_menu_rol' => $request->input('idMenuRol'),
                    'p_Id_sub_menu' => $request->input('idSubMenu'),
                    'p_Id_rol' => $request->input('idRol'),
                    'p_Gestion' => $request->input('Gestion'),
                    'p_Estado' => $request->input('Estado'),
                    'p_Opcion' => intval($request->input('idMenuRol')) == 0 ?  1 : 2
                ],
                'headers' =>[
                    'Authorization' => session()->get('token'),
                    'Content-Type' => 'application/json; charset=utf-8'
                ]

            ]);

            $response =  json_encode(response()->json(json_decode(($res->getBody() ))));
            $array = json_decode($response,true);

            return $array['original'];            
            
        } catch (Exception $ex) {
                $logs = new Utils();
            $logs->escribirLog($ex->getMessage());
                $resp = array('CodigoError'=>'0001','MensajeError'=> 'Ocurrio un error inesperado contactar con sistemas!!');
                return array('data'=>$resp);
        }
   }
   
}