<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use App\Utils;
use Exception; 

class CatalogoController extends Controller{

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
          return $valida->validarAutorizacion("Catalogo","modules.seguridad.catalogo");
        }
        else{
            return view('login');
        }
        
   }

   public function consultarCatalogo(){
    try {
        $opcion = 8;
        $res = $this->cliente->request('GET', $this->baseUrl.'catalogo/'.$opcion, [           
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

   public function consultarCatalogoGeneral(){
    try {
        $opcion = 8;
        $res = $this->cliente->request('GET', $this->baseUrl.'catalogo/'.$opcion, [           
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
        'IdCatalogoCabecera' => 'required',
        'IdCatalogoDetalle' => 'required',
        'Nombre' => 'required',       
        'Descripcion' => 'required',
        'Estado' => 'required',             
        'Usuario' => 'required',      
        'Opcion'=>'required'
        ]);

    try {
        $res = $this->cliente->request('POST', $this->baseUrl.'catalogo', [
            'json' =>  [
                "p_idCatalogoCabecera"=>$request->input('IdCatalogoCabecera'),
                "p_idCatalogoDetalle"=>$request->input('IdCatalogoDetalle'),
                "p_Nombre"=>$request->input('Nombre'),
                "p_Descripcion" =>$request->input('Descripcion'),
                "p_Estado"=>$request->input('Estado'),
                "p_Usuario"=>$request->input('Usuario'),
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