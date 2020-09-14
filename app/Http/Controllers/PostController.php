<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use App\Utils;
use Exception; 

class PostController extends Controller{

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

          return $valida->validarAutorizacionDatos("Post","modules.galeria.post", $datosmateriales,$datoscatalogo);
        }
        else{
            return view('login');
        }
   }
   
   public function consultarPostGeneral(){
    try {    
        $res = $this->cliente->request('GET', $this->baseUrl.'post/0/8');
          
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

   public function consultarPost(){
    try {
        $rol =  session()->get('rol');
        $opcion = $rol == 'Administrador' ? '8' : ( $rol == 'Artista' ? '6' : '4') ;

        $res = $this->cliente->request('GET', $this->baseUrl.'post/'.session()->get('idUsuario').'/'.$opcion, [           
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

   public function consultarPostProyecto(){
    try {
        $rol =  1;
        $opcion =  9;

        $res = $this->cliente->request('GET', $this->baseUrl.'post/1/'.$opcion);          
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
        'idPost' => 'required',
        'idArte' => 'required',
        'Titulo' => 'required',       
        'TipoPost' => 'required',
        'IdMaterial' => 'required',
        'Alto' => 'required',             
        'Ancho' => 'required',
        'TipoArte' => 'required',
        'FechaInicio' => 'required',
        'FechaFin' => 'required',            
        'Valor' => 'required',            
        'Estado' => 'required',
        'idImagen' => 'required',         
        'Opcion'=>'required'
        ]);

    try {
        $res = $this->cliente->request('POST', $this->baseUrl.'post', [
            'json' =>  [	
                "p_id_arte"=>$request->input('idArte'),
                "p_nombre"=>$request->input('Titulo'),
                "p_id_material"=>$request->input('IdMaterial'),
                "p_alto_art"=>$request->input('Alto'),
                "p_ancho_art" =>$request->input('Ancho'),
                "p_id_etiqueta"=>$request->input('TipoArte'),
                "p_id_imagen"=>$request->input('idImagen'),
                "p_Url"=>  $request->input('PathImagen') == "" ? '' : $this->baseUrl.'public/images/'.$request->input('PathImagen'),							 
                "p_id_post"=>$request->input('idPost') ,
                "p_id_categoria_post"=>$request->input('TipoPost'),
                "p_titulo"=>$request->input('Titulo') ,
                "p_descripcion"=>$request->input('Descripcion'),
                "p_id_artista"=> session()->get('idUsuario'),
                "p_id_administrador"=> 1 ,
                "p_id_estado_post"=> $request->input('Estado'),
                "p_id_tipo_post"=>$request->input('TipoPost') ,
                "p_fecha_ini"=> $request->input('FechaInicio'),
                "p_fecha_fin" => $request->input('FechaFin'),
                "p_valor_subasta_ini"=>$request->input('Valor'),
                "p_valor_subasta_fin"=>$request->input('Valor'),
                "p_observacion"=>$request->input('Observacion'),
                "p_urlPdf" =>$request->input('PathPdf') == "" ? '' : $this->baseUrl.'public/pdfs/'.$request->input('PathPdf'),							 
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