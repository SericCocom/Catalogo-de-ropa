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
    //return view('admin.layouts.contenedor');
    return view('front.login');
});

Route::get('index', function () {
    //return view('admin.layouts.contenedor');
    return view('front.layouts.main');
});

Route::get('/', function () {
    //return view('admin.layouts.contenedor');
    return view('admin.login');
});
Route::apiResource('mutuarios','ClentesController');
Route::apiResource('empleados','EmpleadosController');
Route::apiResource('productos','ProductosController');
Route::apiResource('categorias','CategoriasController');
Route::apiResource('albums','AlbumsController');
Route::resource('file', 'FileController');





Route::post('login','Auth\LoginController@login')->name('login');
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

Route::get('logout','Auth\LoginController@salir');







//Route::get('im', 'FileController@create');
Route::post('images-save', 'ImagenController@store')->name('images-save');
