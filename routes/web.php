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

Route::group(['middleware' => 'disablepreventback'], function () {
    Route::get('/', 'HomeController@index')->name('index');

    Auth::routes();

    Route::get('/SweetAlert/{alertType?}', ['as' => 'SweetAlert', 'uses' => 'HomeController@sweet']);
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
    // Alta Art??culo
    Route::get('/catalogos/numeroInventario', 'ArticulosController@numeroInventarioMax');
    Route::post('/catalogos/GuardarArticulos', 'ArticulosController@store')->name('GuardarArticulos');

    // reportes
    Route::get('/catalogos/reportes', 'ArticulosController@reportes')->name('reportes');

    // Bienes por Partida
    Route::get('catalogos/BienesXPartida', 'ArticulosController@BienesXPartida');
    Route::get('catalogos/reportes/BienesPorPartida/{numPartida}/{nombrePartida}', 'ArticulosController@BienesPorPartida');

    // Importe de Bienes Por ??rea
    Route::get('catalogos/importeBienesPorArea', 'ArticulosController@importeBienesPorArea');
    Route::get('catalogos/reportes/importeBienesPorAreaPDF', 'ArticulosController@importeBienesPorAreaPDF');

    // Importe de Bienes Por Partida
    Route::get('catalogos/importeBienesPorPartida', 'ArticulosController@importeBienesPorPartida');
    Route::get('catalogos/reportes/importeBienesPorPartidaPDF', 'ArticulosController@importeBienesPorPartidaPDF');

    // Inventario Por ??rea
    Route::get('catalogos/inventarioPorArea', 'ArticulosController@inventarioPorArea');
    Route::get('catalogos/reportes/inventarioPorAreaPDF/{numArea}/{nombreArea}', 'ArticulosController@inventarioPorAreaPDF');

    // Inventario Por Orden Alfab??tico
    Route::get('catalogos/inventarioPorOrdenAlfabetico', 'ArticulosController@inventarioPorOrdenAlfabetico');
    Route::get('catalogos/reportes/inventarioPorOrdenAlfabeticoPDF', 'ArticulosController@inventarioPorOrdenAlfabeticoPDF');

    // Resguardo de bienes por empleado
    Route::get('catalogos/ResguardoPorEmpleado', 'ArticulosController@ResguardoPorEmpleado');
    Route::get('catalogos/reportes/ResguardoPorEmpleadoPDF/{numEmpleado}/{nombreEmpleado}', 'ArticulosController@ResguardoPorEmpleadoPDF');

    // Importe de bienes candalerizados por a??o de adquisici??n
    Route::get('catalogos/importeBienesAnioAdquisicion', 'ArticulosController@importeBienesAnioAdquisicion');
    Route::get('catalogos/reportes/importeBienesAnioAdquisicionPDF/{anioAdquisicion}', 'ArticulosController@importeBienesAnioAdquisicionPDF');

    // Bienes por ??rea ordenado por empleados
    Route::get('catalogos/bienesAreaOrdenadoEmpleado', 'ArticulosController@bienesAreaOrdenadoEmpleado');
    Route::get('catalogos/reportes/bienesAreaOrdenadoEmpleadoPDF/{area}', 'ArticulosController@bienesAreaOrdenadoEmpleadoPDF');

    // inventario Por Orden Alfab??tico Nuevo
    Route::get('catalogos/inventarioPorOrdenAlfabeticoNuevo', 'ArticulosController@inventarioPorOrdenAlfabeticoNuevo');
    Route::get('catalogos/reportes/inventarioPorOrdenAlfabeticoNuevoPDF', 'ArticulosController@inventarioPorOrdenAlfabeticoNuevoPDF');

    // inventario de la bodega
    Route::get('catalogos/inventarioDeLaBodega', 'ArticulosController@inventarioDeLaBodega');
    Route::get('catalogos/reportes/inventarioDeLaBodegaPDF', 'ArticulosController@inventarioDeLaBodegaPDF');

    // Inventario ordenado por a??o, partida y factura
    Route::get('catalogos/inventarioAnioPartidaFactura', 'ArticulosController@inventarioAnioPartidaFactura');
    Route::get('catalogos/reportes/inventarioAnioPartidaFacturaPDF/{anio}/{partida}/{descpartida}', 'ArticulosController@inventarioAnioPartidaFacturaPDF');

    // Editar Art??culo
    Route::get('/catalogos/InformacionArticulo', 'ArticulosController@InformacionArticulo')->name('InformacionArticulo');
    Route::post('/catalogos/EditarArticulos', 'ArticulosController@EditarArticulos')->name('EditarArticulos');

    // ************* ECO ******************
    // Alta Art??culo
    Route::get('/catalogos/numeroInventarioECO', 'ArticulosECOsController@numeroInventarioMaxECO');
    Route::post('/catalogos/GuardarArticulosECO', 'ArticulosECOsController@store')->name('GuardarArticulosECO');

    // Editar Art??culo ECO
    Route::get('/catalogos/InformacionArticuloECO', 'ArticulosECOsController@InformacionArticuloECO')->name('InformacionArticuloECO');
    Route::post('/catalogos/EditarArticulosECO', 'ArticulosECOsController@EditarArticulosECO')->name('EditarArticulosECO');

    // reportes ECO
    Route::get('/catalogos/reportesECO', 'ArticulosECOsController@reportesECO')->name('reportesECO');

    // Bienes por Partida ECO
    Route::get('catalogos/BienesXPartidaECO', 'ArticulosECOsController@BienesXPartidaECO');
    Route::get('catalogos/reportes/BienesPorPartidaECO/{bloque}/{numPartida}/{nombrePartida}/{linea}', 'ArticulosECOsController@BienesPorPartidaECO');

    // Importe de Bienes Por ??rea ECO
    Route::get('catalogos/importeBienesPorAreaECO', 'ArticulosECOsController@importeBienesPorAreaECO');
    Route::get('catalogos/reportes/importeBienesPorAreaPDFECO', 'ArticulosECOsController@importeBienesPorAreaPDFECO');

    // Importe de Bienes Por Partida ECO
    Route::get('catalogos/importeBienesPorPartidaECO', 'ArticulosECOsController@importeBienesPorPartidaECO');
    Route::get('catalogos/reportes/importeBienesPorPartidaPDFECO', 'ArticulosECOsController@importeBienesPorPartidaPDFECO');

    // Inventario Por ??rea ECO
    Route::get('catalogos/inventarioPorAreaECO', 'ArticulosECOsController@inventarioPorAreaECO');
    Route::get('catalogos/reportes/inventarioPorAreaPDFECO/{numArea}/{nombreArea}', 'ArticulosECOsController@inventarioPorAreaPDFECO');

    // Inventario Por Orden Alfab??tico ECO
    Route::get('catalogos/inventarioPorOrdenAlfabeticoECO', 'ArticulosECOsController@inventarioPorOrdenAlfabeticoECO');
    Route::get('catalogos/reportes/inventarioPorOrdenAlfabeticoPDFECO', 'ArticulosECOsController@inventarioPorOrdenAlfabeticoPDFECO');

    // Resguardo de bienes por empleado ECO
    Route::get('catalogos/ResguardoPorEmpleadoECO', 'ArticulosECOsController@ResguardoPorEmpleadoECO');
    Route::get('catalogos/reportes/ResguardoPorEmpleadoPDFECO/{numEmpleado}/{nombreEmpleado}', 'ArticulosECOsController@ResguardoPorEmpleadoPDFECO');

    // Bienes por ??rea ordenado por empleados ECO
    Route::get('catalogos/bienesAreaOrdenadoEmpleadoECO', 'ArticulosECOsController@bienesAreaOrdenadoEmpleadoECO');
    Route::get('catalogos/reportes/bienesAreaOrdenadoEmpleadoPDFECO/{area}', 'ArticulosECOsController@bienesAreaOrdenadoEmpleadoPDFECO');

    // Importe de bienes candalerizados por a??o de adquisici??n ECO
    Route::get('catalogos/importeBienesAnioAdquisicionECO', 'ArticulosECOsController@importeBienesAnioAdquisicionECO');
    Route::get('catalogos/reportes/importeBienesAnioAdquisicionPDFECO/{anioAdquisicion}', 'ArticulosECOsController@importeBienesAnioAdquisicionPDFECO');

    // inventario de la bodega ECO
    Route::get('catalogos/inventarioDeLaBodegaECO', 'ArticulosECOsController@inventarioDeLaBodegaECO');
    Route::get('catalogos/reportes/inventarioDeLaBodegaPDFECO/{bloque}/{partida}/{linea}', 'ArticulosECOsController@inventarioDeLaBodegaPDFECO');

    // Inventario ordenado por a??o, partida y factura ECO
    Route::get('catalogos/inventarioAnioPartidaFacturaECO', 'ArticulosECOsController@inventarioAnioPartidaFacturaECO');
    Route::get('catalogos/reportes/inventarioAnioPartidaFacturaPDFECO/{anio}/{partida}/{descpartida}', 'ArticulosECOsController@inventarioAnioPartidaFacturaPDFECO');


    // BAJAS [ALX]
    Route::get('/catalogos/bajaArticulo', 'ArticulosController@bajaArticulo')->name('bajaArticulo');
    Route::get('/catalogos/bodega', 'ArticulosController@bodega')->name('bodega');

    Route::post('/catalogos/buscaArt', 'ArticulosController@buscaArt')->name('buscaArt');

    Route::get('/catalogos/bajasDefinitivas', 'ArticulosController@bajasDefinitivas')->name('bajasDefinitivas');

    Route::post('/catalogos/articulosBajaDefinitiva', 'ArticulosController@articulosBajaDefinitiva')->name('articulosBajaDefinitiva');

    Route::get('/catalogos/consultaBajasDefinitivas', 'ArticulosController@consultaBajasDefinitivas')->name('consultaBajasDefinitivas');

    Route::get('/catalogos/bajasDefinitivasPDF/{mov}', 'ArticulosController@bajasDefinitivasPDF')->name('bajasDefinitivasPDF');


    //Bajas ECO
    
    Route::get('/catalogos/bajasDefinitivasEco', 'ArticulosECOsController@bajasDefinitivasEco')->name('bajasDefinitivasEco');
    Route::get('/catalogos/bodegaEco', 'ArticulosECOsController@bodegaEco')->name('bodegaEco');
    Route::post('/catalogos/buscaArtEco', 'ArticulosECOsController@buscaArtEco')->name('buscaArtEco');

    Route::post('/catalogos/articulosBajaDefinitivaEco', 'ArticulosECOsController@articulosBajaDefinitivaEco')->name('articulosBajaDefinitivaEco');

    Route::get('/catalogos/consultaBajasDefinitivasEco', 'ArticulosECOsController@consultaBajasDefinitivasEco')->name('consultaBajasDefinitivasEco');

    Route::get('/catalogos/bajasDefinitivasEcoPDF/{mov}', 'ArticulosECOsController@bajasDefinitivasEcoPDF')->name('bajasDefinitivasEcoPDF');

    /* ****************************************************************************************************************** */

    // Depreciaci??n
    Route::get('/catalogos/depreciacion', 'ArticulosController@depreciacion')->name('depreciacion');
    Route::get('/catalogos/calculoDepreciacion', 'ArticulosController@calculoDepreciacion');
    Route::get('/catalogos/reportePDFDepreciacion/{fecha}', 'ArticulosController@reportePDFDepreciacion');

    // Cancelaci??n de resguardo
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
    //Route::get('/catalogos/levantamientoInventarioDetalleGral', 'LevantamientoController@levantamientoInventarioDetalleGral');
    Route::get('/catalogos/reportes/levantamientoInventarioDetallePDF/{id_lote}/{tipo}', 'LevantamientoController@levantamientoInventarioDetallePDF');
    Route::get('/catalogos/actualizar', 'LevantamientoController@actualizar');
    Route::post('/catalogos/confirmacionAsignacionL', 'LevantamientoController@confirmacionAsignacionL')->name('confirmacionAsignacionL');
    Route::post('/catalogos/eliminarArticuloLevantamiento', 'LevantamientoController@eliminarArticuloLevantamiento');

    //agregar usuario
    Route::post('catalogos/crearUsuario', 'validarController@store')->name('crearUsuario');

    // filtro parala carga
    Route::get('catalogos/llenarTablePartidasCat', 'ArticulosECOsController@llenarTablePartidasCat');
    Route::get('catalogos/llenarTablePartidasLineasCatECO', 'ArticulosECOsController@llenarTablePartidasLineasCatECO');

    /* ************************************************************************************************************* */

    // usuarios
    Route::get('usuarios', 'UsuariosController@usuarios')->name('usuarios');

    // validar email de registro del nuevo usuario
    Route::post('validarEmail', 'UsuariosController@email')->name('validarEmail');

    // validar si el username ya existe
    Route::post('validarUsername', 'UsuariosController@username')->name('validarUsername');

    // Registro de usuarios
    Route::post('registroUsuario', 'UsuariosController@registroUsuario')->name('registroUsuario');

    // Cambio de estatus de usuario activado / desactivado
    Route::post('estatususer', 'UsuariosController@estatususer')->name('estatususer');

    // ediatar usuario registrado
    Route::post('updateUsuario', 'UsuariosController@updateUsuario')->name('updateUsuario');

    // actualizar la pass del usuario
    Route::post('updatePassword', 'UsuariosController@updatePassword')->name('updatePassword');

    // eliminar usuario
    Route::post('deleteUser', 'UsuariosController@deleteUser')->name('deleteUser');

});

Route::get('/', function () {
    return view('auth.login');
});
