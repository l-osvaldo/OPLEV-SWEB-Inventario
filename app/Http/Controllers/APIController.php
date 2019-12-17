<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;

header('Access-Control-Allow-Origin: *');

class APIController extends Controller
{

    /* **********************************************************************************

    Función para los web service de la aplicación 
    Funcionalidad: Obtiene todos los artículos OPLE de la base de datos
    Parámetros: No recibe parámetros
    Retorna: regresa un json con todos los artículos OPLE de la tabla de articulos

    ********************************************************************************** */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulosOPLE = articulos::all();

        return response()->json($articulosOPLE);
    }


    // Función para los web service de la aplicación
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    // Función para los web service de la aplicación
    // Obtiene un artículo en especial de artículos OPLE de la base de datos de acuerdo al numero de inventario 
    // Recibe como parámetro un id, en este caso es el numero de inventario a buscar
    // regresa un json con todos los datos del artículo o null si no lo encuentra
    /* **********************************************************************************

    Función para los web service de la aplicación 
    Funcionalidad: Obtiene un artículo en especial de artículos OPLE de la base de datos de acuerdo al numero de inventario 
    Parámetros: Recibe como parámetro un id, en este caso es el numero de inventario a buscar
    Retorna: Regresa un json con todos los datos del artículo o null si no lo encuentra

    ********************************************************************************** */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = articulos::where('numeroinv',$id)->get();

        return response()->json($articulo);
    }

    // Función para los web service de la aplicación
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    // Función para los web service de la aplicación
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
