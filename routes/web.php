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


Route::get('login_cli', function () {
   //vista para logueo de clientes
    return view('front.login');
});

//abre pagina about sin logueo
Route::get('about','Auth\LoginController@About');
//abre pagina sin logueo
Route::get('invitado','Auth\LoginController@Invitado');
//abre pagina mi carrito con logueo
Route::get('micarrito','Auth\LoginController@MyCarrito');




Route::get('inicio','ListController@Vistas');
Route::get('resumen','ComentariosController@DataTable');

Route::apiResource('listas','ListController');


Route::get('/', function () {
    //return view('admin.layouts.contenedor');
    return view('admin.login');
});
Route::apiResource('mutuarios','ClentesController');
//visualiza solicitudes con vue
Route::apiResource('solicitudes','SolicitudesController');
//realiza pedido
Route::apiResource('comentarios','ComentariosController');




Route::apiResource('empleados','EmpleadosController');
Route::apiResource('productos','ProductosController');
Route::apiResource('categorias','CategoriasController');
Route::apiResource('albums','AlbumsController');
Route::post('login','Auth\LoginController@login')->name('login');
//crea una solicitud de cuenta
Route::post('solicitud','ClentesController@Solicitud')->name('solicitud');



Route::post('loginCl','Auth\LoginController@loginCli')->name('loginCl');
Route::get('mutua','Auth\LoginController@Mutuarios')->name('mutua');
Route::get('emple','Auth\LoginController@Empleados')->name('emple');
Route::get('prod','Auth\LoginController@Cotizar')->name('prod');




Route::get('emplea', function () {
    //return view('admin.layouts.contenedor');
    return view('admin.mutuarios');
});
Route::get('ima',function(){
	return view('DropZone.cargarimagen');
});
Route::get('pedidos',function(){
    return view('admin.views.encargos');
});



//salir empleado
Route::get('logout','Auth\LoginController@salir');
//salir cliente
Route::get('logoutcli','Auth\LoginController@salircli');
Route::post('images-save', 'ImagenController@store')->name('images-save');
