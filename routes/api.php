<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    
// });

// Route::group(['middleware' => ['cors']], function () {
//     Route::apiResource('articulos', 'APIController');
// 	Route::apiResource('scanner', 'ScannerController');
// 	Route::apiResource('usuario', 'UserAPIController');
// });

// Route::middleware(['cors'])->group(function () {
//     Route::apiResource('articulos', 'APIController');
// 	Route::apiResource('scanner', 'ScannerController');
// 	Route::apiResource('usuario', 'UserAPIController');
// });


Route::apiResource('articulos', 'APIController')->middleware(\Spatie\Cors\Cors::class);
Route::apiResource('scanner', 'ScannerController')->middleware(\Spatie\Cors\Cors::class);
Route::apiResource('usuario', 'UserAPIController')->middleware(\Spatie\Cors\Cors::class);
