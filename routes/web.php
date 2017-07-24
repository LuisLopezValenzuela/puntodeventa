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

Route::get('/home', 'indexController@index');

Route::get('/registrarEmpleados', 'empleadosController@registrar');

Route::post('/guardarEmpleado', 'empleadosController@guardar');

Route::get('/consultarEmpleados', 'empleadosController@consultar');

Route::get('/caja/{id}', 'ventasController@Iniciar');


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//rutas para productos

Route::get('/registrarProductos', 'productosController@registrar');
Route::post('/guardarProductos',"productosController@guardar");
Route::get('/consultarProductos', "productosController@consultar");
Route::get('/eliminarProductos/{id}',"productosController@eliminar");
Route::get('/editarProductos/{id}',"productosController@editar");
Route::post('/actualizarProductos/{id}',"productosController@actualizar");
Route::get('/reporteInventario', "productosController@vistaInventario");
Route::get('/pdfInventario','productosController@pdf');
Route::post('/agregaStock',"productosController@agregar");