<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use App\Utils;
use Exception; 
use App\Http\Controllers\PostController;

class HomeController extends Controller {
   
   public function index(){
      return view('welcome');
   }

   public function proyectos(){
      return view('proyectos');
   }

   public function galeria(){
      $post = new PostController();
      $datos = $post->consultarPostGeneral();  
      //dd($datos);
      return view('galeria')->with(['Post'=>$datos]);
   }

   public function contacto(){
      return view('contacto');
   }

   public function nosotros(){
      return view('nosotros');
   }

   public function donaciones(){
      return view('donaciones');
   }

}
