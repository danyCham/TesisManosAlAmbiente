<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use App\Utils;
use Exception; 

class DonacionController extends Controller{

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
        
        $material = new MaterialController();
        $datosmateriales = $material->consultarMaterialGeneral();

        $catalogo = new CatalogoController();
        $datoscatalogo = $catalogo->consultarCatalogoGeneral();

        return $valida->validarAutorizacionDatos("Donaciones","modules.donaciones.donaciones",$datosmateriales,$datoscatalogo);
        }
        else{
            return view('login');
        }
   }

   public function consultarDonacion(){
    try {
        $opcion = session()->get('rol') == 'Administrador' ? '6' : '4';
        $res = $this->cliente->request('GET', $this->baseUrl.'donacion/'.session()->get('idUsuario').'/'.$opcion, [           
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

   public function mantenimiento(Request $request){
    $validatedData = $request->validate([
        'idDonaciones' => 'required',
        'idCliente' => 'required',       
        'idMaterial' => 'required',
        'cedula' => 'required',             
        'tipo_entrega' => 'required',
        'Estado' => 'required',
        'Cantidad' => 'required',
        'Valor' => 'required',         
        'Opcion'=>'required'
        ]);

    try {
        $res = $this->cliente->request('POST', $this->baseUrl.'donacion', [
            'json' =>  [
                "p_id_donaciones"=>$request->input('idDonaciones'),
                "p_usuario_crea"=>$request->input('idCliente')== "" ? session()->get('idUsuario') : session()->get('idUsuario'),
                "p_usuario_mod"=>session()->get('idUsuario'),
                "p_id_material" =>$request->input('idMaterial'),
                "p_Cedula"=>$request->input('cedula'),
                "p_id_tipo_entrega"=>$request->input('tipo_entrega') ,
                "p_id_estado"=>$request->input('Estado'),
                "p_cantidad"=>$request->input('Cantidad') ,
                "p_valor"=>$request->input('Valor'),
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