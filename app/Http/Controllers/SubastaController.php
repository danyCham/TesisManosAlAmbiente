<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use App\Utils;
use Exception; 

class SubastaController extends Controller{

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
          $catalogo = new CatalogoController();
          $datoscatalogo = $catalogo->consultarCatalogoGeneral();

          return $valida->validarAutorizacionCatalogos("Subasta","modules.galeria.subasta", $datoscatalogo);
        }
        else{
            return view('login');
        }
   }

   public function consultarSubasta(){
    try {
        $rol =  session()->get('rol');
        $opcion = $rol == 'Administrador' ? '6' :  ($rol == 'Artista' ? '5' : '4');

        $res = $this->cliente->request('GET', $this->baseUrl.'subasta/'.session()->get('idUsuario').'/'.$opcion, [           
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
        'idSubasta' => 'required',
        'Estado' => 'required',
        'IdCliente' => 'required',       
        'ValorInicio' => 'required',
        'oferta' => 'required',        
        'Opcion'=>'required'
        ]);

    try {
        $res = $this->cliente->request('POST', $this->baseUrl.'subasta', [
            'json' =>  [
                "p_id_subasta"=>$request->input('idSubasta'),
                "p_id_estado"=>$request->input('Estado'),
                "p_id_cliente"=>$request->input('IdCliente'),
                "p_cantidad_min"=>$request->input('ValorInicio'),
                "p_cantidad_max" =>$request->input('oferta'),
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