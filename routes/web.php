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

Route::group(['middleware' => 'disablepreventback'],function()
{
	Route::get('/', 'HomeController@index')->name('index');


	Auth::routes();

	Route::get('/SweetAlert/{alertType?}', ['as'=>'SweetAlert','uses'=>'HomeController@sweet']);
	Route::get('/catalogos/bienes', 'CatalogosController@bienes')->name('catalogos');
	Route::get('/catalogos/bieneseco', 'CatalogosController@bieneseco')->name('catalogoeco');
	Route::get('/catalogos/lista', 'CatalogosController@lista')->name('lista');
	Route::get('/catalogos/cancelacionResguardo', 'CancelacionResguardoController@index')->name('cancelacionResguardo');
	Route::get('/catalogos/revision', 'RevisionController@index')->name('revision');
	Route::get('/catalogos/levantamientoInventario', 'LevantamientoController@index')->name('levantamientoInventario');

	//rutas del partidas
	Route::get('/catalogos/TablaPartida', 'PartidasController@index')->name('Tabla-Partida');
	Route::post('/catalogos/GuardarPartidas', 'PartidasController@store')->name('partidas');

	Route::get('/catalogos/validarPartida', 'PartidasController@validarPartida');

	//rutas del modal de lineas
	Route::get('/catalogos/AgregaLineas', 'LineasController@store')->name('agregarLinea');
	Route::post('/catalogos/AgregaLineas', 'LineasController@store')->name('agregarLinea');
	Route::get('/catalogos/TablaDeLineas', 'LineasController@show')->name('show-lineas');
	Route::post('/catalogos/TablaDeLineas', 'LineasController@show')->name('show-lineas');
	Route::get('/catalogos/datosLinea', 'LineasController@datosLinea');

	//sublineas
	Route::post('/catalogos/TablaSublineas', 'SublineasController@show')->name('show-sublineas');
	Route::get('/catalogos/TablaSublineas', 'SublineasController@show')->name('show-sublineas');
	Route::post('/catalogos/AgregaSubineasStore', 'SublineasController@Agregasublineastore')->name('AgregarSub');
	Route::get('ajaxRequest', 'SublineasController@ajaxRequest');
	Route::get('catalogos/obtenLineas', 'SublineasController@obtenLineas');
	Route::get('/catalogos/datosSublinea', 'SublineasController@datosSublinea');

	//MAx Lineas
	Route::get('catalogos/obtenMaxLineas', 'SublineasController@obtenMaxLineas');

	//sublineas
	Route::get('catalogos/obtenLineasAg', 'SublineasController@obtenLineasAg');
	Route::get('catalogos/obtenSublineas', 'SublineasController@obtenSublineas');
	Route::get('catalogos/obtenSublineas2', 'SublineasController@obtenSublineas2');

	//Areas
	Route::get('/catalogos/TablaAreas', 'AreasController@index')->name('Tabla-Areas');
	Route::post('/catalogos/updatearea', 'AreasController@updaArea')->name('updatearea');

	//Empleados
	Route::get('/catalogos/TablaEmpleados', 'EmpleadosController@index')->name('TablaDeEmpleados');
	Route::get('/catalogos/AgregaEmpleados', 'EmpleadosController@store')->name('agregarEmpleados');
	Route::post('/catalogos/AgregaEmpleados', 'EmpleadosController@store')->name('agregarEmpleados');
	Route::post('/catalogos/TablaEmpleados', 'EmpleadosController@show')->name('show-Empleados');
	Route::get('/catalogos/TablaEmpleados', 'EmpleadosController@show')->name('show-Empleados');

	Route::get('/catalogos/validarNumeroEmpleado', 'EmpleadosController@validarNumeroEmpleado');

	// ************* OPLE ******************
	// Alta Artículo
	Route::get('/catalogos/numeroInventario', 'ArticulosController@numeroInventarioMax');
	Route::post('/catalogos/GuardarArticulos', 'ArticulosController@store')->name('GuardarArticulos');

	// reportes
	Route::get('/catalogos/reportes', 'ArticulosController@reportes')->name('reportes');

	// Bienes por Partida
	Route::get('catalogos/BienesXPartida', 'ArticulosController@BienesXPartida');
	Route::get('catalogos/reportes/BienesPorPartida/{numPartida}/{nombrePartida}', 'ArticulosController@BienesPorPartida');

	// Importe de Bienes Por área
	Route::get('catalogos/importeBienesPorArea', 'ArticulosController@importeBienesPorArea');
	Route::get('catalogos/reportes/importeBienesPorAreaPDF', 'ArticulosController@importeBienesPorAreaPDF');

	// Importe de Bienes Por Partida
	Route::get('catalogos/importeBienesPorPartida', 'ArticulosController@importeBienesPorPartida');
	Route::get('catalogos/reportes/importeBienesPorPartidaPDF', 'ArticulosController@importeBienesPorPartidaPDF');

	// Inventario Por Área
	Route::get('catalogos/inventarioPorArea', 'ArticulosController@inventarioPorArea');
	Route::get('catalogos/reportes/inventarioPorAreaPDF/{numArea}/{nombreArea}', 'ArticulosController@inventarioPorAreaPDF');

	// Inventario Por Orden Alfabético
	Route::get('catalogos/inventarioPorOrdenAlfabetico', 'ArticulosController@inventarioPorOrdenAlfabetico');
	Route::get('catalogos/reportes/inventarioPorOrdenAlfabeticoPDF', 'ArticulosController@inventarioPorOrdenAlfabeticoPDF');

	// Resguardo de bienes por empleado
	Route::get('catalogos/ResguardoPorEmpleado', 'ArticulosController@ResguardoPorEmpleado');
	Route::get('catalogos/reportes/ResguardoPorEmpleadoPDF/{numEmpleado}/{nombreEmpleado}', 'ArticulosController@ResguardoPorEmpleadoPDF');

	// Importe de bienes candalerizados por año de adquisición
	Route::get('catalogos/importeBienesAnioAdquisicion', 'ArticulosController@importeBienesAnioAdquisicion');
	Route::get('catalogos/reportes/importeBienesAnioAdquisicionPDF/{anioAdquisicion}', 'ArticulosController@importeBienesAnioAdquisicionPDF');

	// Bienes por área ordenado por empleados
	Route::get('catalogos/bienesAreaOrdenadoEmpleado', 'ArticulosController@bienesAreaOrdenadoEmpleado');
	Route::get('catalogos/reportes/bienesAreaOrdenadoEmpleadoPDF/{area}', 'ArticulosController@bienesAreaOrdenadoEmpleadoPDF');

	// inventario Por Orden Alfabético Nuevo
	Route::get('catalogos/inventarioPorOrdenAlfabeticoNuevo', 'ArticulosController@inventarioPorOrdenAlfabeticoNuevo');
	Route::get('catalogos/reportes/inventarioPorOrdenAlfabeticoNuevoPDF', 'ArticulosController@inventarioPorOrdenAlfabeticoNuevoPDF');

	
	// Editar Artículo
	Route::get('/catalogos/InformacionArticulo', 'ArticulosController@InformacionArticulo')->name('InformacionArticulo');
	Route::post('/catalogos/EditarArticulos', 'ArticulosController@EditarArticulos')->name('EditarArticulos');

	// ************* ECO ******************
	// Alta Artículo
	Route::get('/catalogos/numeroInventarioECO', 'ArticulosECOsController@numeroInventarioMaxECO');
	Route::post('/catalogos/GuardarArticulosECO', 'ArticulosECOsController@store')->name('GuardarArticulosECO');

	// Editar Artículo ECO
	Route::get('/catalogos/InformacionArticuloECO', 'ArticulosECOsController@InformacionArticuloECO')->name('InformacionArticuloECO');
	Route::post('/catalogos/EditarArticulosECO', 'ArticulosECOsController@EditarArticulosECO')->name('EditarArticulosECO');

	// reportes ECO
	Route::get('/catalogos/reportesECO', 'ArticulosECOsController@reportesECO')->name('reportesECO');

	// Bienes por Partida ECO
	Route::get('catalogos/BienesXPartidaECO', 'ArticulosECOsController@BienesXPartidaECO');
	Route::get('catalogos/reportes/BienesPorPartidaECO/{numPartida}/{nombrePartida}', 'ArticulosECOsController@BienesPorPartidaECO');

	// Importe de Bienes Por área ECO
	Route::get('catalogos/importeBienesPorAreaECO', 'ArticulosECOsController@importeBienesPorAreaECO');
	Route::get('catalogos/reportes/importeBienesPorAreaPDFECO', 'ArticulosECOsController@importeBienesPorAreaPDFECO');

	// Importe de Bienes Por Partida ECO
	Route::get('catalogos/importeBienesPorPartidaECO', 'ArticulosECOsController@importeBienesPorPartidaECO');
	Route::get('catalogos/reportes/importeBienesPorPartidaPDFECO', 'ArticulosECOsController@importeBienesPorPartidaPDFECO');

	// Inventario Por Área ECO
	Route::get('catalogos/inventarioPorAreaECO', 'ArticulosECOsController@inventarioPorAreaECO');
	Route::get('catalogos/reportes/inventarioPorAreaPDFECO/{numArea}/{nombreArea}', 'ArticulosECOsController@inventarioPorAreaPDFECO');

	// Inventario Por Orden Alfabético ECO
	Route::get('catalogos/inventarioPorOrdenAlfabeticoECO', 'ArticulosECOsController@inventarioPorOrdenAlfabeticoECO');
	Route::get('catalogos/reportes/inventarioPorOrdenAlfabeticoPDFECO', 'ArticulosECOsController@inventarioPorOrdenAlfabeticoPDFECO');

	// Resguardo de bienes por empleado ECO
	Route::get('catalogos/ResguardoPorEmpleadoECO', 'ArticulosECOsController@ResguardoPorEmpleadoECO');
	Route::get('catalogos/reportes/ResguardoPorEmpleadoPDFECO/{numEmpleado}/{nombreEmpleado}', 'ArticulosECOsController@ResguardoPorEmpleadoPDFECO');

	// Depreciación 
	Route::get('/catalogos/depreciacion', 'ArticulosController@depreciacion')->name('depreciacion');
	Route::get('/catalogos/calculoDepreciacion', 'ArticulosController@calculoDepreciacion');
	Route::get('/catalogos/HistorialDepreciacionArticulo', 'ArticulosController@HistorialDepreciacionArticulo')->name('HistorialDepreciacionArticulo');


	// Cancelación de resguardo
	Route::get('/catalogos/bienesDelEmpleado', 'CancelacionResguardoController@bienesDelEmpleado');
	Route::post('/catalogos/cancelacionResguardoconfirmado', 'CancelacionResguardoController@cancelacionResguardoconfirmado');
	Route::get('catalogos/reportes/cancelacionResguardoPDF/{id_cancelacion}', 'CancelacionResguardoController@cancelacionResguardoPDF');

	// revision
	Route::get('/catalogos/detalleOPLE', 'RevisionController@detalleOPLE');
	Route::get('/catalogos/detalleECO', 'RevisionController@detalleECO');
	Route::get('/catalogos/articulosAsignables', 'RevisionController@articulosAsignables');
	Route::post('/catalogos/confirmacionAsignacion', 'RevisionController@confirmacionAsignacion')->name('confirmacionAsignacion');

	// levantamiento de inventario
	Route::get('/catalogos/levantamientoInventarioDetalleEsp', 'LevantamientoController@levantamientoInventarioDetalleEsp');
	Route::get('/catalogos/levantamientoInventarioDetalleGral', 'LevantamientoController@levantamientoInventarioDetalleGral');
	Route::get('/catalogos/levantamientoInventarioDetalleGral', 'LevantamientoController@levantamientoInventarioDetalleGral');
	Route::get('/catalogos/reportes/levantamientoInventarioDetallePDF/{id_lote}/{tipo}', 'LevantamientoController@levantamientoInventarioDetallePDF');
	Route::get('/catalogos/actualizar', 'LevantamientoController@actualizar');
	Route::post('/catalogos/confirmacionAsignacionL', 'LevantamientoController@confirmacionAsignacionL')->name('confirmacionAsignacionL');

});

Route::get('/', function () {
    return view('auth.login');
});





