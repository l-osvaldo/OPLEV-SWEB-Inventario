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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/', 'HomeController@index2')->name('index');


Auth::routes();

Route::get('/SweetAlert/{alertType?}', ['as'=>'SweetAlert','uses'=>'HomeController@sweet']);
Route::get('/sweet', 'HomeController@sweetalert')->name('sweet');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/calendar', 'HomeController@calendar')->name('calendar');
Route::get('/tables', 'HomeController@tables')->name('tables');
Route::get('/charts', 'HomeController@charts')->name('charts');
Route::get('/widgets', 'HomeController@widgets')->name('widgets');
Route::get('/general-elements', 'HomeController@generalelements')->name('general');
Route::get('/advanced-elements', 'HomeController@advanced')->name('advanced');
Route::get('/personalizado', 'HomeController@personalizado')->name('personalizado');
Route::get('/catalogos/bienes', 'CatalogosController@bienes')->name('catalogos');
Route::get('/catalogos/bieneseco', 'CatalogosController@bieneseco')->name('catalogoeco');
Route::get('/catalogos/lista', 'CatalogosController@lista')->name('lista');
//rutas del partidas
Route::get('/catalogos/TablaPartida', 'PartidasController@index')->name('Tabla-Partida');
Route::post('/catalogos/GuardarPartidas', 'PartidasController@store')->name('partidas');
//Route::get('/catalogos/NuevaPartida', 'PartidasController@create')->name('partidas-create');
//Route::get('/catalogos/TablaPartidaShow/{id}', 'PartidasController@show')->name('show-partida');
//rutas del modal de lineas
Route::get('/catalogos/AgregaLineas', 'LineasController@store')->name('agregarLinea');
Route::post('/catalogos/AgregaLineas', 'LineasController@store')->name('agregarLinea');
//Route::get('/catalogos/Lineas', 'LineasController@MostrarLineas')->name('lineas');
//Route::get('/catalogos/NuevaLinea', 'LineasController@create')->name('nuevaLinea');
Route::get('/catalogos/TablaDeLineas', 'LineasController@show')->name('show-lineas');
Route::post('/catalogos/TablaDeLineas', 'LineasController@show')->name('show-lineas');
//Route::get('/catalogos/Lineas', 'SublineasController@create')->name('lineas-create');
//Route::get('/catalogos/TablaLineasShow/', 'SublineasController@showlineas')->name('show-lineas');

//sublineas
//Route::get('/catalogos/Sublineas', 'SublineasController@MostrarSublineas')->name('sublineas');
Route::post('/catalogos/TablaSublineas', 'SublineasController@show')->name('show-sublineas');
Route::get('/catalogos/TablaSublineas', 'SublineasController@show')->name('show-sublineas');
//Route::get('/catalogos/AgregaSublineas', 'SublineasController@SubineaNueva')->name('AgregaSublineas');
//Route::post('/catalogos/AgregaSubineas', 'SublineasController@sublineastore')->name('NuevaSublinea');
//Route::get('/catalogos/Sublineas', 'SublineasController@SelectLinea')->name('partida_list');
Route::post('/catalogos/AgregaSubineasStore', 'SublineasController@Agregasublineastore')->name('AgregarSub');
//Route::get('/catalogos/AgregaSubLineas', 'SublineasController@SublineaNueva')->name('AgregaSublineas');

Route::get('ajaxRequest', 'SublineasController@ajaxRequest');
Route::get('catalogos/obtenLineas', 'SublineasController@obtenLineas');
//MAx Lineas
Route::get('catalogos/obtenMaxLineas', 'SublineasController@obtenMaxLineas');
//sublineas
Route::get('catalogos/obtenLineasAg', 'SublineasController@obtenLineasAg');
Route::get('catalogos/obtenSublineas', 'SublineasController@obtenSublineas');

//Areas
Route::get('/catalogos/TablaAreas', 'AreasController@index')->name('Tabla-Areas');
Route::post('/catalogos/updatearea', 'AreasController@updaArea')->name('updatearea');

//Empleados
Route::get('/catalogos/TablaEmpleados', 'EmpleadosController@index')->name('TablaDeEmpleados');

Route::get('/catalogos/AgregaEmpleados', 'EmpleadosController@store')->name('agregarEmpleados');
Route::post('/catalogos/AgregaEmpleados', 'EmpleadosController@store')->name('agregarEmpleados');

Route::post('/catalogos/TablaEmpleados', 'EmpleadosController@show')->name('show-Empleados');
Route::get('/catalogos/TablaEmpleados', 'EmpleadosController@show')->name('show-Empleados');

