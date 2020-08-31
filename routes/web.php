<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//rutas para el home controller , pantallas de bienvenidas
/*==========================================================*/
Route::get('/','HomeController@index')->name('home.index');
//rutas para la pantalla de inicio
Route::get('/contacto','HomeController@contacto')->name('home.contacto');
Route::get('/galeria','HomeController@galeria')->name('home.galeria');
Route::get('/nosotros','HomeController@nosotros')->name('home.nosotros');
Route::get('/proyectos','HomeController@proyectos')->name('home.proyectos');
Route::get('/donaciones','HomeController@donaciones')->name('home.donaciones');

/*==========================================================*/
 
 

/*rutas para la autenticación del usuario*/
/*==========================================================*/
Route::get('/iniciarSesion','AuthenticateController@index')->name('auth.index');
Route::get('/registrarse','AuthenticateController@registrarseIndex')->name('auth.registrarse');
Route::post('/verificarAuth','AuthenticateController@validateUser')->name('auth.verificar');
Route::post('/registro','AuthenticateController@registrarse')->name('auth.registroUsuario');
Route::get('/welcome','AuthenticateController@welcome')->name('auth.welcome');
Route::get('/destroy','AuthenticateController@destroy')->name('auth.destroy');
/*==========================================================*/

/*rutas del modulo de seguridad*/
/*==========================================================*/

//rutas para la pantalla de usuarios
Route::get('/seguridad/usuarios','UsuarioController@index')->name('usuario.index');
//para consulta los usuarios
Route::get('/seguridad/usuarios/consulta/{idRol}/{Cedula}/{Opcion}','UsuarioController@consultarUsuarios')->name('usuario.consultar');
