<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use App\Utils;
use Exception; 

class MaterialController extends Controller{

   //variable interna para la instancia del cliente para consumir api rest
   protected $cliente;
   //variable interna para obtener la url del api rest
   protected $baseUrl;   
   //método constructor de lca clase 
   public function __construct(){
      $this->baseUrl = env('API_ENDPOINT');
      $this->cliente = new Client();
   }

   public function index(){ 
      if(session()->get('OK')== 'true'){
      $valida = new Utils();
          return $valida->validarAutorizacion("Material","modules.donaciones.material");
      }
      else{
          return view('login');
      }      
   }

   public function consultarMaterial(){
    try {
        $opcion = session()->get('rol') == 'Administrador' ? '4' : '3';
        $res = $this->cliente->request('GET', $this->baseUrl.'material/'.$opcion, [           
            'headers' =>[
                'Authorization' => session()->get('token'),
                'Content-Type' => 'application/json; charset=utf-8'
            ]
         ]);          
         $response =  json_encode(response()->json(json_decode(($res->getBody() ))));
         $array = json_decode($response,true);
         return array('data'=>$array['original']['respuesta']);
       } 
      catch (Exception $ex) {
          $logs = new Utils();
          $logs->escribirLog($ex->getMessage());
          $resp = array('CodigoError'=>'0001','MensajeError'=> 'Ocurrio un error inesperado contactar con sistemas!!');
          return array('data'=>$resp);
      }
   }

   public function consultarMaterialGeneral(){
    try {
        $opcion = session()->get('rol') == 'Administrador' ? '4' : '3';
        $res = $this->cliente->request('GET', $this->baseUrl.'material/'.$opcion, [           
            'headers' =>[
                'Authorization' => session()->get('token'),
                'Content-Type' => 'application/json; charset=utf-8'
            ]
         ]);          
         $response =  json_encode(response()->json(json_decode(($res->getBody() ))));
         $array = json_decode($response,true);
         return $array['original']['respuesta'];
       } 
      catch (Exception $ex) {
          $logs = new Utils();
          $logs->escribirLog($ex->getMessage());
          $resp = array('CodigoError'=>'0001','MensajeError'=> 'Ocurrio un error inesperado contactar con sistemas!!');
          return array('data'=>$resp);
      }
   }

   public function mantenimiento(Request $request){
    $validatedData = $request->validate([
        'idMaterial' => 'required',
        'Nombre' => 'required',
        'medida_peso' => 'required',       
        'precio' => 'required',
        'idImagen' => 'required',             
        'estado' => 'required',      
        'Opcion'=>'required'
        ]);

    try {
        $res = $this->cliente->request('POST', $this->baseUrl.'material', [
            'json' =>  [
                "p_id_material"=>$request->input('idMaterial'),
                "p_nombre"=>$request->input('Nombre'),
                "p_medida_peso"=>$request->input('medida_peso'),
                "p_precio" =>$request->input('precio'),
                "p_id_imagen"=>$request->input('idImagen'),
                "p_id_estado"=>$request->input('estado') == "" ? 25 : 25,
                "p_Url"=>$request->input('PathImagen') == "" ? '' : $this->baseUrl.'public/images/'.$request->input('PathImagen'),
                "p_Opcion"=> $request->input('Opcion')
            ], 
            'headers' =>[
                'Authorization' => session()->get('token'),
                'Content-Type' => 'application/json; charset=utf-8'
            ]

        ]);

        $response =  json_encode(response()->json(json_decode(($res->getBody() ))));
        $array = json_decode($response,true);

        return array('data'=>$array['original']['respuesta']);

        
    } catch (Exception $ex) {
            $logs = new Utils();
        $logs->escribirLog($ex->getMessage());
            $resp = array('CodigoError'=>'0001','MensajeError'=> 'Ocurrio un error inesperado contactar con sistemas!!');
            return array('data'=>$resp);
     }
   }
}