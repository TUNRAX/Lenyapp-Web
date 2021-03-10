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
Route::get('/home', 'HomeController@home')->name('home');

Auth::routes();

Route::post('/comprar', 'CompraController@comprar')->name('comprar');

Route::get('/mejoresCalificados','CalificacionController@mejoresCalificados')->name('mejoresCalificados');

Route::get('/agregarCalificacion/{id}','CalificacionController@agregarCalificacion')->name('agregarCalificacion');

Route::get('/borrarImagen/{id}', 'ProductoController@borrarImagen')->name('borrarImagen');

Route::get('/paginaCompra/{id}', 'CompraController@paginaCompra')->name('paginaCompra');

Route::get('/reporteCliente', 'reporteController@reporteCliente')->name('reporteCliente');

Route::get('/reporteProveedor', 'reporteController@reporteProveedor')->name('reporteProveedor');

Route::post('/guardarReporteCliente', 'reporteController@guardarReporteCliente')->name('guardarReporteCliente');

Route::post('/guardarReporteProveedor', 'reporteController@guardarReporteProveedor')->name('guardarReporteProveedor');

Route::get('/cambiarEstado/{id}', 'UsuarioController@cambiarEstado')->name('cambiarEstado');

Route::get('/cambiarEstadoCompra/{id}', 'CompraController@cambiarEstadoCompra')->name('cambiarEstadoCompra');

Route::get('/datosProveedor/{id}', 'ProveedorController@datosProveedor')->name('datosProveedor');

Route::get('paginaEntregasConfirmadas','ProveedorController@paginaEntregasConfirmadas')->name('paginaEntregasConfirmadas');

Route::get('/administrarProveedor', 'HomeController@administrarProveedor')->name('administrarProveedor');

Route::get('/administrarCliente', 'HomeController@administrarCliente')->name('administrarCliente');

Route::get('/administrarReportes', 'HomeController@administrarReportes')->name('administrarReportes');

Route::get('/administrarProductos', 'HomeController@administrarProductos')->name('administrarProductos');

Route::get('/administrarPagos', 'HomeController@administrarPagos')->name('administrarPagos');

Route::get('/registroCliente', 'HomeController@registroCliente')->name('registroCliente');

Route::get('/registroProveedor', 'HomeController@registroProveedor')->name('registroProveedor');

Route::get('/paginaCliente', 'HomeController@paginaCliente')->name('paginaCliente');

Route::get('/mapaProveedor', 'clienteController@mapaProveedor')->name('mapaProveedor');

Route::get('/misCompras', 'clienteController@misCompras')->name('misCompras');

Route::get('/paginaProveedor', 'HomeController@paginaProveedor')->name('paginaProveedor');

Route::get('/paginaProductos', 'ProveedorController@paginaProductos')->name('paginaProductos');

Route::get('/paginaEntregas', 'ProveedorController@paginaEntregas')->name('paginaEntregas');

Route::post('/entregaFechas', 'ProveedorController@entregaFechas')->name('entregaFechas');

Route::post('/imprimir', 'ProveedorController@imprimir')->name('imprimir');

Route::resource('usuario', 'UsuarioController');
Route::resource('cliente', 'ClienteController');
Route::resource('proveedor', 'ProveedorController');
Route::resource('producto', 'ProductoController');
Route::resource('reportess', 'ReporteController');
Route::resource('tipo_producto','TipoProductoController');



Route::get('/', 'HomeController@index')->name('index');
