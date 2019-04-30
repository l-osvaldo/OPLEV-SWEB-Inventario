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
Route::get('/catalogos/TablaPartida', 'PartidasController@index')->name('Tabla-Partida');
Route::post('/catalogos/Partidas', 'PartidasController@store')->name('partidas');
Route::get('/catalogos/Partidas', 'PartidasController@create')->name('partidas-create');