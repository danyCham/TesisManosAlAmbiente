<?php 

namespace App;
use Carbon\Carbon;
use Exception;

/**
  clase de utilitarios
 */
class Utils  
{
	
	 public function escribirLog($mensaje){
        
        try {
	        	
		 	$fecha = Carbon::now()->toDateString();		
		 	$fechaHora = Carbon::now()->toDateTimeString(); 	 
	        $path = '../Logs/'.$fecha.'_logError.txt';
	        $file = fopen($path, "a");
			fwrite($file, '<======================='.$fechaHora.'==================>'.PHP_EOL);	
			fwrite($file, $mensaje . PHP_EOL);		
			fwrite($file, '<===========================================================>'.PHP_EOL);	 
			fclose($file);
        } catch (Exception $e) {
        	throw $e;        	
        }

	 }

	  public function validarAutorizacion($pantalla,$ruta){
	 	    $array = session()->get('SubMenu');
			$valida = false;
			$modoConsulta = "S";
			foreach ($array as $value){               
               if($value['NombreSubMenu'] == $pantalla){
               	 $valida = true;
               	 $modoConsulta = $value['gestion'];
               }               
			}
			
			if($valida){
			  return view($ruta)->with(['data'=> $modoConsulta]);
			}
			else{
				return redirect()->route('usuario.noautorizado');
			}			
	  }
}