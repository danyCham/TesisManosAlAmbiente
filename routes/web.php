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

Route::get('/noautorizado','AuthenticateController@noautIndex')->name('usuario.noautorizado');

//ruta para generar insertar actualizar usuarios
Route::post('/seguridad/usuarios/mantenimiento','UsuarioController@mantenimientoUsuario')->name('usuario.mantenimiento');

//ruta para pantalla asignación de roles de usuario
Route::get('/seguridad/asignacionmenurol','AsignacionMenuController@index')->name('menurol.index');
//ruta para consultar menu, submenu y menu rol
Route::get('/seguridad/asignacionmenurol/consultar/{opcion}','AsignacionMenuController@consultar')->name('menurol.consultar');

//ruta para mantenimiento de menu rol
Route::post('/seguridad/asignacionmenurol/mantenimiento','AsignacionMenuController@mantenimiento')->name('menurol.mantenimiento');

/*==========================================================*/

/* rutas del modulo de Catalogo */
/*==========================================================*/
Route::get('/seguridad/catalogo','CatalogoController@index')->name('catalogo.index');
Route::get('/seguridad/catalogo/consultar','CatalogoController@consultarCatalogo')->name('catalogo.consultar');
Route::get('/seguridad/catalogo/consultar/general','CatalogoController@consultarCatalogoGeneral')->name('catalogoGeneral.consultar');
Route::post('/seguridad/catalogo/mantenimiento','CatalogoController@mantenimiento')->name('catalogo.mantenimiento');
/*==========================================================*/

/* rutas del modulo de post */
/*==========================================================*/
Route::get('/galeria/post','PostController@index')->name('post.index');
Route::get('/galeria/post/consultar','PostController@consultarPostGeneral')->name('post.consultaGeneral');
Route::get('/galeria/post/consultar/administracion','PostController@consultarPost')->name('post.consultar');
Route::post('/galeria/post/mantenimiento','PostController@mantenimiento')->name('post.mantenimiento');
/*==========================================================*/

/* rutas del modulo de donaciones */
/*==========================================================*/
Route::get('/donaciones/donacion','DonacionController@index')->name('donacion.index');
Route::get('/donaciones/donacion/consultar','DonacionController@consultarDonacion')->name('donacion.consultar');
Route::post('/donaciones/donacion/mantenimiento','DonacionController@mantenimiento')->name('donacion.mantenimiento');
/*==========================================================*/

/* rutas del modulo de Materiales */
/*==========================================================*/
Route::get('/donaciones/materiales','MaterialController@index')->name('material.index');
Route::get('/donaciones/materiales/consultar','MaterialController@consultarMaterial')->name('material.consultar');
Route::get('/donaciones/materiales/consultar/general','MaterialController@consultarMaterialGeneral')->name('materialGeneral.consultar');
Route::post('/donaciones/materiales/mantenimiento','MaterialController@mantenimiento')->name('material.mantenimiento');
/*==========================================================*/
