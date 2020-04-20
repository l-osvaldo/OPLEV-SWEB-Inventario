<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {

      Route::group([
          'middleware' => ['api', 'cors'],
          'namespace' => $this->namespace,
          'prefix' => 'api',
      ], function ($router) {
           //Add you routes here, for example:
          Route::apiResource('/usuario','UserAPIController');
          Route::apiResource('/articulos', 'APIController');
          Route::apiResource('/articulosecos', 'ArtECOsAPIController');
          Route::apiResource('/scanner', 'ScannerController');
          Route::apiResource('/empleados', 'EmpleadosAPIController'); 
          Route::apiResource('/lote', 'LoteAPIController');
          Route::post('/lote/lotesCerradosEmpleado','LoteAPIController@lotesCerradosEmpleado');
          Route::post('/lote/lotesCerradosGral','LoteAPIController@lotesCerradosGral'); 
          Route::post('/lote/lotesAbiertosEmpleado','LoteAPIController@lotesAbiertosEmpleado'); 
          Route::post('/lote/lotesAbiertosGral','LoteAPIController@lotesAbiertosGral');
          Route::post('/lote/getLote','LoteAPIController@getLote');
          Route::post('/lote/updateEstadoLote','LoteAPIController@updateEstadoLote');   
          Route::apiResource('/bitacoralotes', 'BitacoraLotesAPIController'); 
          Route::post('/bitacoralotes/allBitacorasId','BitacoraLotesAPIController@allBitacorasId');

          // articulos 
          Route::post('/articulos/getArticulo','APIController@getArticulo');
          Route::post('/articulos/getArticuloLote','APIController@getArticuloLote');

          //partidas
          Route::post('/recursosGeneralesWS/getPartidas','RecursosGeneralesWSController@getPartidas');

          //lineas
          Route::post('/recursosGeneralesWS/getLineas','RecursosGeneralesWSController@getLineas');

          //sublineas
          Route::post('/recursosGeneralesWS/getSublinea','RecursosGeneralesWSController@getSublinea');

          //empleados
          Route::post('/empleados/getInformacionEmpleado','EmpleadosAPIController@getInformacionEmpleado');

          //bitacoralote
          Route::post('/bitacoralotes/getArticuloBitacoraLote','BitacoraLotesAPIController@getArticuloBitacoraLote');
      });

    }
}
