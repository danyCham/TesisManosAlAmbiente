<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use App\Utils;
use Exception; 

class HomeController extends Controller {
   
   public function index(){
      return view('welcome');
   }


}
